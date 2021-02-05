<?php

namespace App\Modules\Doctor\Repositories;

use App\Doctor;
use App\Modules\Doctor\Contracts\DoctorRepositoryInterface;
use App\Repositories\MainRepository;
use App\User;
use Illuminate\Contracts\Container\Container as App;

class DoctorRepository extends MainRepository implements DoctorRepositoryInterface
{
    /**
     *
     * @return mixed
     */
    protected $doctorModel;
    protected $userModel;

    /**
     * DoctorRepository constructor.
     * @param App $app
     * @param Doctor $doctor
     *@param User $user
     */
    public function __construct(App $app, Doctor $doctor, User $user)
    {
        parent::__construct($app);

        $this->doctorModel = $doctor;
        $this->userModel = $user;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Doctor';
    }

    public function saveDoctor($data, $doctorId = null)
    {
        return $this->create($data);
    }

    public function getDoctors($filters = [], $pagination = false)
    {
        $doctor = $this->doctorModel;

        if(isset($filters['first_name']) && !empty($filters['first_name'])){
            $doctor = $doctor->where('first_name','like','%'.$filters['first_name'].'%');
        }
        if(isset($filters['last_name']) && !empty($filters['last_name'])){
            $doctor = $doctor->where('last_name','like','%'.$filters['last_name'].'%');
        }
        if(isset($filters['ref_no']) && !empty($filters['ref_no'])){
            $doctor = $doctor->where('ref_no','like','%'.$filters['ref_no'].'%');
        }
        if(isset($filters['phone']) && !empty($filters['phone'])){
            $doctor = $doctor->where('phone','like','%'.$filters['phone'].'%');
        }
        if(isset($filters['gender']) && !empty($filters['gender'])){
            $doctor = $doctor->where('gender',$filters['gender']);
        }
        if(isset($filters['category']) && !empty($filters['category'])){
            $doctor = $doctor->where('category_id',$filters['category']);
        }
        if($pagination) {
            $doctor = $doctor->paginate(ADMIN_PAGINATE_COUNT);
        }else {
            $doctor = $doctor->get();
        }

        return $doctor;
    }

    public function getDoctorById($id = false)
    {
        return $this->doctorModel
            ->where('id', $id)
            ->first();
    }

    public function getDoctorByUserId($userId =  false)
    {
        return $this->doctorModel->where('user_id', $userId)->first();
    }



}
