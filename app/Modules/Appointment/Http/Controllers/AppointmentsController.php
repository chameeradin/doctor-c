<?php

namespace App\Modules\Appointment\Http\Controllers;
use App\Modules\Appointment\Contracts\AppointmentRepositoryInterface;
use App\Modules\Doctor\Contracts\DoctorRepositoryInterface;
use App\Modules\Patient\Contracts\PatientRepositoryInterface;
use App\Modules\Record\Contracts\RecordRepositoryInterface;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\Controller;

class AppointmentsController extends Controller
{
    private $appointmentRepo;
    private $doctorRepo;
    private $patientRepo;
    private $recordRepo;

    public function __construct(AppointmentRepositoryInterface $appointmentRepo, DoctorRepositoryInterface $doctorRepo, PatientRepositoryInterface $patientRepo, RecordRepositoryInterface $recordRepo)
    {
        parent::__construct();
        $this->appointmentRepo = $appointmentRepo;
        $this->doctorRepo = $doctorRepo;
        $this->patientRepo = $patientRepo;
        $this->recordRepo = $recordRepo;
    }

    public function index(Request $request)
    {
        try {
            $data ['metaTitle'] = 'Appointment List';
            $params = $this->_getSearchParams();

            $data['appointments'] = $this->appointmentRepo->getAppointments($params, true);
            $data['doctors'] = $this->doctorRepo->getDoctors([], false);
            $data['patients'] = $this->patientRepo->getPatients([], false);
            return view('appointment::appointments_list', $data);
        } catch (Exception $e) {
            abort(500);
            error_log("Error Thrown" . $e->getMessage());
        }
    }

    public function getAppointmentCreate()
    {
        $data = [
            'metaTitle' => 'Appointments List',
            'patientList' => $this->patientRepo->getPatients(),
            'doctorList' => $this->doctorRepo->getDoctors()
        ];

        return view('appointment::create_appointments', $data);
    }

    public function store()
    {
        $validatedData = request()->validate([
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'record_id' => 'required'
        ], [
            'doctor_id.required' => 'The Doctor Name list is required.',
            'patient_id.required' => 'The Patient Name list is required.',
            'record_id.required' => 'The Record is required.',
            'date.required' => 'The Appointment Date field is required.',
            'time.required' => 'The Appointment Time field is required.'
        ]);
        try {
            $created = $this->appointmentRepo->create($validatedData);
            if ($created) {
                $refNo['ref_no'] = 'AROGYA_APPO_'.$created->id;
                $this->appointmentRepo->update($refNo, $created->id);
                return redirect()->route('appointments.list')
                    ->with('message', "The Appointment has been created.");
            } else {
                abort(404);
            }
        } catch (Exception $e) {
            abort(500);
            error_log("Error Thrown" . $e->getMessage());
        }

    }

    private function _getSearchParams()
    {
        $filters = [];

        $filters['ref_no'] = request('ref_no');
        $filters['date'] = request('date');
        $filters['time'] = request('time');
        $filters['doctor_id'] = request('doctor_id');
        $filters['patient_id'] = request('patient_id');

        return $filters;
    }

    public function destroy($id)
    {
        $deleted = $this->appointmentRepo->delete($id);
        if ($deleted) {
            return redirect()->route('appointments.list')
                ->with('message', "The Appointment has been deleted.");
        } else {

            return false;
        }
    }

    public function getRecordsByDoctorId($doctorId, $date)
    {
        $data = $this->recordRepo->getRecordByDoctorId($doctorId, $date);

        if ($data) {
            $return = [
                'status' => true,
                'data' => $data
            ];
        } else {
            $return = [
                'status' => false,
                'data' => null
            ];
        }
        return json_encode($return);
    }

    public function downloadAppointmentPDF($id)
    {

        $appointment = $this->appointmentRepo->find($id);
        $data = [
            'type' => 'Appointment',
            'title' => 'APPOINTMENT - '.$appointment->ref_no,
            'details' => $appointment
        ];
        $pdf = PDF::loadView('pdf.appointment', $data);
        return $pdf->download('APPOINTMENT_'.$appointment->ref_no.'.pdf');
    }

    public function getDoctorByDate($date)
    {
        $data = $this->recordRepo->getDoctorByDate($date);

        if ($data) {
            $return = [
                'status' => true,
                'data' => $data
            ];
        } else {
            $return = [
                'status' => false,
                'data' => null
            ];
        }
        return json_encode($return);
    }

}
