<?php

namespace App\Modules\Appointment\Repositories;

use App\Category;
use App\Modules\Appointment\Contracts\AppointmentRepositoryInterface;
use App\Repositories\MainRepository;
use App\Appointment;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Contracts\Container\Container as App;
use Illuminate\Support\Facades\Auth;

class AppointmentRepository extends  MainRepository implements AppointmentRepositoryInterface {

      protected $appointmentModel;

      public function __construct(App $app, Appointment $appointment)
      {
          parent::__construct($app);


          $this->appointmentModel =  $appointment;

      }

        function model()
        {
          return 'App\Appointment';
        }

        public function getAppointments($filters = [], $pagination = false)
        {
            $appointment = $this->appointmentModel;

            if(isset($filters['ref_no']) && !empty($filters['ref_no'])){
                $appointment = $appointment->where('ref_no','like','%'.$filters['ref_no'].'%');
            }
            if(isset($filters['date']) && !empty($filters['date'])){
                $appointment = $appointment->where('date','like','%'.$filters['date'].'%');
            }
            if(isset($filters['time']) && !empty($filters['time'])){
                $appointment = $appointment->where('time',$filters['time']);
            }

            if(isset($filters['doctor_id']) && !empty($filters['doctor_id'])){
                $appointment = $appointment->where('doctor_id',$filters['doctor_id']);
            }
            if(isset($filters['patient_id']) && !empty($filters['patient_id'])){
                $appointment = $appointment->where('patient_id',$filters['patient_id']);
            }


            if(PATIENT_ROLE_ID == Auth::user()->role->id){
                $appointment = $appointment->where('patient_id', Auth::user()->patient->id);
            }
            if(DOCTOR_ROLE_ID == Auth::user()->role->id){
                $appointment = $appointment->where('doctor_id', Auth::user()->doctor->id);
            }
            if($pagination) {
                  $appointment = $appointment->paginate(ADMIN_PAGINATE_COUNT);
            }else{
                $appointment = $appointment->get();
            }

          return $appointment;
        }
        public function getAppointmentById($id = false)
        {
            return $this->appointmentModel
                ->where('id', $id)
                ->first();
        }


}
