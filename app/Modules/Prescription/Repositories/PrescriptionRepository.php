<?php

namespace App\Modules\Prescription\Repositories;

use App\Appointment;
use App\Modules\Prescription\Contracts\PrescriptionRepositoryInterface;
use App\Repositories\MainRepository;
use App\Prescription;
use Illuminate\Contracts\Container\Container as App;
use App\User;

use Illuminate\Support\Facades\Auth;
class PrescriptionRepository extends  MainRepository implements PrescriptionRepositoryInterface {

    protected $prescriptionModel;
    protected $appointmentModel;

    /**
     * PrescriptionRepository constructor.
     * @param App $app
     * @param Prescription $prescription
     * @param Appointment $appointment
     */
    public function __construct(App $app, Prescription $prescription, Appointment $appointment)
    {
        parent::__construct($app);


        $this->prescriptionModel =  $prescription;
        $this->appointmentModel = $appointment;
    }

    function model()
    {
        return 'App\Prescription';
    }

    public function getPrescriptions($filters = [], $pagination = false)
    {
        $prescription = $this->prescriptionModel;

        if(isset($filters['id']) && !empty($filters['id'])){
            $prescription = $prescription->where('id','like','%'.$filters['id'].'%');
        }
        if(isset($filters['appointment_id']) && !empty($filters['appointment_id'])){
            $prescription = $prescription->where('appointment_id','like','%'.$filters['appointment_id'].'%');
        }

        if(isset($filters['doctor_id']) && !empty($filters['doctor_id'])){
            $prescription = $prescription->where('doctor_id',$filters['doctor_id']);
        }
        if(isset($filters['patient_id']) && !empty($filters['patient_id'])){
            $prescription = $prescription->where('patient_id',$filters['patient_id']);
        }



        if(PATIENT_ROLE_ID == Auth::user()->role->id){
            $prescription = $prescription->where('patient_id', Auth::user()->patient->id);
        }
        if(DOCTOR_ROLE_ID == Auth::user()->role->id){
            $prescription = $prescription->where('doctor_id', Auth::user()->doctor->id);
        }
        if($pagination) {
            $prescription = $prescription->paginate(ADMIN_PAGINATE_COUNT);
        }else{
            $prescription = $prescription->get();
        }

        return $prescription;
    }
    public function getPrescriptionById($id = false)
    {
        return $this->prescriptionModel
            ->where('id', $id)
            ->first();
    }

    /**
     * @param bool $id
     * @return mixed
     */
    public function getAppointmentById($id = false)
    {
        return $this->appointmentModel
            ->where('id', $id)
            ->first();
    }
}
