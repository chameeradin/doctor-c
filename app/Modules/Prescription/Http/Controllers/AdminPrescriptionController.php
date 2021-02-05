<?php

namespace App\Modules\Prescription\Http\Controllers;
use App\Appointment;
use App\Http\Controllers\AdminController;
use App\Modules\Prescription\Contracts\PrescriptionRepositoryInterface;
use App\Modules\Appointment\Contracts\AppointmentRepositoryInterface;
use App\Modules\Doctor\Contracts\DoctorRepositoryInterface;
use App\Modules\Patient\Contracts\PatientRepositoryInterface;
use App\Prescription;
use Illuminate\Http\Request;
use DB;


use Exception;

class AdminPrescriptionController extends AdminController
{

    private $prescriptionRepo;
    private $appointmentRepo;
    private $doctorRepo;
    private $patientRepo;

    public function __construct(PrescriptionRepositoryInterface $prescriptionRepo,AppointmentRepositoryInterface $appointmentRepo, DoctorRepositoryInterface $doctorRepo, PatientRepositoryInterface $patientRepo)
    {
        parent::__construct();
        $this->prescriptionRepo = $prescriptionRepo;
        $this->appointmentRepo = $appointmentRepo;
        $this->doctorRepo = $doctorRepo;
        $this->patientRepo = $patientRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        try {
            $data ['metaTitle'] = 'Prescription List';

            $params = $this->_getSearchParams();

            $data['prescriptions'] = $this->prescriptionRepo->getPrescriptions($params, true);
            $data['appointments'] = $this->appointmentRepo->getAppointments([], false);
            $data['doctors'] = $this->doctorRepo->getDoctors([], false);
            $data['patients'] = $this->patientRepo->getPatients([], false);
            return view('prescription::prescription_list', $data);
        } catch (Exception $e) {
            abort(500);
            error_log("Error Thrown" . $e->getMessage());
        }
    }

    public function getPrescriptionCreate()
    {
        $data = array(
            'metaTitle' => 'Prescription List',
            'appointmentList' => $this->appointmentRepo->getAppointments(),
            'patientList' => $this->patientRepo->getPatients(),
            'doctorList' => $this->doctorRepo->getDoctors(),
        );

        return view('prescription::new_prescription', $data);
    }

    public function store()
    {
        $validatedData = request()->validate([
            'appointment_id' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'medicine' => 'required'
        ], [
            'appointment_id.required' => 'The Appointment No is required.',
            'doctor_id.required' => 'The Doctor Name list is required.',
            'patient_id.required' => 'The Patient Name list is required.',
            'medicine.required' => 'The Medicines required.'
        ]);
        try {
            $created = $this->prescriptionRepo->create($validatedData);
            if ($created) {
                $refNo['ref_no'] = 'AROGYA_PRESCRIPTION_' .$created->id;
                $this->prescriptionRepo->update($refNo, $created->id);
                return redirect()->route('appointments.list')
                    ->with('message', "The Prescription has been created.");
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

        $filters['id'] = request('id');
        $filters['appointment_id'] = request('appointment_id');
        $filters['doctor_id'] = request('doctor_id');
        $filters['patient_id'] = request('patient_id');

        return $filters;
    }

    public function appointmentDetails($id)
    {
        $data = $this->appointmentRepo->getAppointmentById($id);

        $return = [
            'status' => true,
            'data' => $data
        ];

        return json_encode($return);
    }
}
