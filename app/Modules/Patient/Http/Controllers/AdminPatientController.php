<?php

namespace App\Modules\Patient\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Modules\Patient\Contracts\PatientRepositoryInterface;
use App\Modules\User\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

class AdminPatientController extends AdminController
{
    private $patientRepo;
    private $userRepo;

    public function __construct(PatientRepositoryInterface $patientRepo, UserRepositoryInterface $userRepo)

    {
        parent::__construct();

        $this->patientRepo = $patientRepo;
        $this->userRepo = $userRepo;
    }

    public function index(Request $request)
    {
      try {
        $data ['metaTitle'] = 'Patient List';
        $searchParams = $this->_getSearchParams($request);

        $data['patients'] = $this->patientRepo->getPatients($searchParams, true);
        return view('patient::patient_list', $data);
      } catch (Exception $e) {
        abort(500);
        error_log("Error Thrown" .$e->getMessage());
      }
    }

    public function getPatientCreate()
    {
        $data = [
          'metaTitle' => 'New Patient',
          'userList' =>$this->patientRepo->getUserList(GUEST_ROLE_ID)
        ];

        return view('patient::new_patient', $data);
    }

    public function store()
    {
        $validatedData = request()->validate([
            'user_id'=>'required',
            'first_name'=>'required',
            'p_gender'=>'required',
            'p_phone'=>'',
            'age'=>'required',
            'title' => '',
            'last_name' => ''
        ], [
            'user_id.required'=>'The Patient User Id list is required.',
            'first_name.required'=>'The Patient First Name field is required.',
            'p_gender.required'=>'The Patient Gender field is required.',
            'age.required'=>'The Patient Age field is required.'
        ]);

        $formatValidateDate = $this->_formatValidateData($validatedData, true);

        try {
            $created = $this->patientRepo->create($formatValidateDate);
            if ($created) {
                $refNo['ref_no'] = 'AROGYA_PAT_'.$created->id;
                $this->patientRepo->update($refNo, $created->id);
                $this->_updateUserToPatient($created);
                return redirect()->route('admin.patient.list')
                    ->with('message', "The '" . $created->p_name . "' patient has been created.");
            } else {
                return false;
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
        $filters['first_name'] = request('first_name');
        $filters['last_name'] = request('last_name');
        $filters['phone'] = request('phone');
        $filters['gender'] = request('gender');
        $filters['age'] = request('age');

        return $filters;
    }

    private function _formatValidateData($data, $isCreate = true)
    {
        $patientData = [
            'first_name' => $data['first_name'],
            'last_name' => isset($data['last_name']) ? $data['last_name'] : null,
            'title' => isset($data['title']) ? $data['title'] : null,
            'phone' => isset($data['p_phone']) ? trim($data['p_phone']) : null,
            'gender' => $data['p_gender'],
            'age' => $data['age']
        ];
        if($isCreate){
            $patientData['user_id'] =$data['user_id'];
        }
        return $patientData;
    }

    public function edit($id){

        $patient = $this->patientRepo->getPatientById($id);

        if(!empty($patient)){
            $data = [
                'patient' => $patient,
                'metaTitle' => 'Edit Patient'
            ];
            return view('patient::edit_patient', $data);
        }else{
            abort('404');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'first_name'=>'required',
            'p_gender'=>'required',
            'p_phone'=>'',
            'age'=>'required',
            'title' => '',
            'last_name' => '',
            'user_id' => ''
        ], [
            'first_name.required' => 'The Name field is required.',
            'p_gender.required' => 'The Gender field is required.',
            'age.required' => 'The Age field is required.'
        ]);

        $formatValidateDate = $this->_formatValidateData($validatedData, false);
        $this->patientRepo->update($formatValidateDate, $id);
        $this->_updateUserToPatient($validatedData, false);

        return redirect(route('admin.patient.list'))->with('success_message', "The Patient '{$request->p_name}' has been updated.");
    }

    public function destroy($id)
    {
        $deleted = $this->patientRepo->delete($id);
        if ($deleted) {
            return redirect()->route('admin.patient.list')
                ->with('message', "The patient has been deleted.");
        } else {
            return false;
        }
    }

    private function _updateUserToPatient($patientDetails, $isCreate = true)
    {
        $userData = [
            'first_name' => $patientDetails['first_name'],
            'last_name' => isset($patientDetails['last_name']) ? $patientDetails['last_name'] : null,
            'title' => isset($patientDetails['title']) ? $patientDetails['title'] : null,
        ];

        if($isCreate){
            $userData['role_id'] = PATIENT_ROLE_ID;
        }

        $this->userRepo->update($userData, $patientDetails['user_id']);
    }
}
