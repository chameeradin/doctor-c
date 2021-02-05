<?php

namespace App\Modules\Patient\Repositories;

use App\Patient;
use App\Modules\Patient\Contracts\PatientRepositoryInterface;
use App\Repositories\MainRepository;
use App\User;
use Illuminate\Contracts\Container\Container as App;

class PatientRepository extends MainRepository implements PatientRepositoryInterface
{
    /**
     *
     * @return mixed
     */
    protected $patientModel;
    protected $userModel;

    /**
     * PatientRepository constructor.
     * @param App $app
     * @param Patient $patient
     * @param User $user
     */
    public function __construct(App $app, Patient $patient, User $user)
    {
        parent::__construct($app);

        $this->patientModel = $patient;
        $this->userModel = $user;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Patient';
    }

    public function savePatient($data, $patientId = null)
    {
        return $this->create($data);
    }

    public function getPatients($filters = [], $pagination = false)
    {
        $patient = $this->patientModel;

        if(isset($filters['first_name']) && !empty($filters['first_name'])){
            $patient = $patient->where('first_name','like','%'.$filters['first_name'].'%');
        }
        if(isset($filters['last_name']) && !empty($filters['last_name'])){
            $patient = $patient->where('last_name','like','%'.$filters['last_name'].'%');
        }
        if(isset($filters['ref_no']) && !empty($filters['ref_no'])){
            $patient = $patient->where('ref_no','like','%'.$filters['ref_no'].'%');
        }
        if(isset($filters['phone']) && !empty($filters['phone'])){
            $patient = $patient->where('phone','like','%'.$filters['phone'].'%');
        }
        if(isset($filters['gender']) && !empty($filters['gender'])){
            $patient = $patient->where('gender',$filters['gender']);
        }
        if(isset($filters['age']) && !empty($filters['age'])){
            $patient = $patient->where('age',$filters['age']);
        }


        if($pagination) {
            $patient = $patient->paginate(ADMIN_PAGINATE_COUNT);
        }else{
            $patient = $patient->get();
        }

      return $patient;
    }

    public function getPatientById($id = false)
    {
        return $this->patientModel
            ->where('id', $id)
            ->first();
    }

    public function getPatientByUserId($userId =  false)
    {
        return $this->patientModel->where('user_id', $userId)->first();
    }
}
