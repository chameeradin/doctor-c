<?php

namespace App\Modules\User\Repositories;

use App\User;
use App\Modules\User\Contracts\UserRepositoryInterface;
use App\Repositories\MainRepository;
use Illuminate\Contracts\Container\Container as App;
use App\Role;
use Illuminate\Auth;

class UserRepository extends MainRepository implements UserRepositoryInterface
{

    protected $userModel;
    protected $roleModel;

    public function __construct(App $app, User $user, Role $role)
    {
        parent::__construct($app);

        $this->userModel = $user;
        $this->roleModel = $role;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\User';
    }
    public function getRoles()
    {
        return $this->roleModel->get();
    }

    public function saveUser($data, $userId = null)
    {

        return $this->create($data);
    }

    public function getUsers($filters = [], $pagination = false)
    {
        $user = $this->userModel;

        if(isset($filters['first_name']) && !empty($filters['first_name'])){
            $user = $user->where('first_name','like','%'.$filters['first_name'].'%');
        }
        if(isset($filters['last_name']) && !empty($filters['last_name'])){
            $user = $user->where('last_name','like','%'.$filters['last_name'].'%');
        }
        if(isset($filters['email']) && !empty($filters['email'])){
            $user = $user->where('email','like','%'.$filters['email'].'%');
        }
        if(isset($filters['role']) && !empty($filters['role'])){
            $user = $user->where('role_id',$filters['role']);
        }

        if($pagination) {
            $user = $user->paginate(ADMIN_PAGINATE_COUNT);
        }else {
            $user = $user->get();
        }

        return $user;
    }

    public function getUserById($id = false)
    {
        return $this->userModel
            ->where('id', $id)
            ->first();
    }

    public function saveProfile($data, $userId = false, $roleId = false, $isAdmin = false)
    {
        if($userId){
            $user = $this->userModel->find($userId);
        }else{
            $user =  new User();
            $user->password = bcrypt($data['password']);
        }


        $user->title = isset($data['title']) ? $data['title'] : null;
        $user->first_name = $data['first_name'];
        $user->last_name = isset($data['last_name']) ? $data['last_name'] : null;

        if($roleId == GUEST_ROLE_ID) {
            $user->role_id = GUEST_ROLE_ID;
            $user->email = $data['email'];
        }

        $user->save();

        if($roleId == DOCTOR_ROLE_ID) {
            $doctorDetails = $user->doctor;

            $doctorDetails->title = isset($data['title']) ? $data['title'] : null;
            $doctorDetails->first_name = $data['first_name'];
            $doctorDetails->last_name = isset($data['last_name']) ? $data['last_name'] : null;
            if(!$isAdmin) {
                $doctorDetails->ref_no = isset($data['ref_no']) ? $data['ref_no'] : null;
                $doctorDetails->phone = isset($data['phone']) ? $data['phone'] : null;
                $doctorDetails->gender = isset($data['gender']) ? $data['gender'] : null;
            }
            $user->doctor()->save($doctorDetails);
        }

        if($roleId == PATIENT_ROLE_ID) {
            $patientDetails = $user->patient;

            $patientDetails->title = isset($data['title']) ? $data['title'] : null;
            $patientDetails->first_name = $data['first_name'];
            $patientDetails->last_name = isset($data['last_name']) ? $data['last_name'] : null;
            if(!$isAdmin) {
                $patientDetails->ref_no = isset($data['ref_no']) ? $data['ref_no'] : null;
                $patientDetails->phone = isset($data['phone']) ? $data['phone'] : null;
                $patientDetails->gender = isset($data['gender']) ? $data['gender'] : null;
                $patientDetails->age = isset($data['age']) ? $data['age'] : null;
            }
            $user->patient()->save($patientDetails);
        }


        return $user;
    }
}
