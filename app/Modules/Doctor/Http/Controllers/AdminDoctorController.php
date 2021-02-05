<?php

namespace App\Modules\Doctor\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Modules\Category\Contracts\CategoryRepositoryInterface;
use App\Modules\Doctor\Contracts\DoctorRepositoryInterface;
use App\Modules\User\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

class AdminDoctorController extends AdminController
{
    private $doctorRepo;
    private $categoryRepo;
    private $userRepo;

    public function __construct(DoctorRepositoryInterface $doctorRepo, CategoryRepositoryInterface $categoryRepo, UserRepositoryInterface $userRepo)
    {
        parent::__construct();

        $this->doctorRepo = $doctorRepo;
        $this->categoryRepo = $categoryRepo;
        $this->userRepo = $userRepo;
    }

    public function index(Request $request)
    {
        try {
            $data  ['metaTitle'] = 'Doctor List';
            $params = $this->_getSearchParams();
            $data['categories'] = $this->categoryRepo->getCategories([], false);
            $data['doctors'] = $this->doctorRepo->getDoctors($params, true);
            return view('doctor::doctor_list', $data);
        } catch (Exception $e) {
            abort(500);
            error_log("Error Thrown" . $e->getMessage());
        }
    }

    public function getDoctorCreate()
    {

        $data = [
            'metaTitle' => 'New Doctor',
            'categoryList' => $this->categoryRepo->getCategories(),
            'userList' => $this->doctorRepo->getUserList(GUEST_ROLE_ID)
        ];

        return view('doctor::new_doctor', $data);
    }

    public function store()
    {
        $validatedData = request()->validate([
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => '',
            'gender' => 'required',
            'category' => 'required',
            'phone' => '',
            'title' => ''
        ], [
            'user_id.required' => 'The Doctor Users List field is required.',
            'first_name.required' => 'The First Name field is required.',
            'last_name.required' => 'The Last Name field is required.',
            'gender.required' => 'The Gender field is required.',
            'category.required' => 'The Category field is required.'
        ]);

        $formatValidateDate = $this->_formatValidateData($validatedData, true);

        try {
            $created = $this->doctorRepo->create($formatValidateDate);
            if ($created) {
                $refNo['ref_no'] = 'AROGYA_DOC_'.$created->id;
                $this->doctorRepo->update($refNo, $created->id);
                $this->_updateUserToDoctor($created);

                return redirect()->route('admin.doctor.list')
                    ->with('message', "The '" . $created->first_name . "' doctor has been created.");
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
        $filters['category'] = request('category');

        return $filters;
    }

    private function _formatValidateData($data, $isCreate = true)
    {
        $doctorData = [
            'first_name' => $data['first_name'],
            'last_name' =>isset($data['last_name']) ? $data['last_name'] : null,
            'phone' => isset($data['phone']) ? trim($data['phone']) : null,
            'gender' => $data['gender'],
            'category_id' => $data['category'],
            'title' => isset($data['title']) ? $data['title'] : null,
        ];
        if($isCreate){
            $doctorData['user_id'] = $data['user_id'];
        }
        return $doctorData;

    }

    /**
     * Edit page load.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){

        $doctor = $this->doctorRepo->getDoctorById($id);

        if(!empty($doctor)){
            $data = [
                'doctor' => $doctor,
                'categoryList' => $this->categoryRepo->getCategories(),
                'metaTitle' => 'Edit Doctor'
            ];
            return view('doctor::edit_doctor', $data);
        }else{
            abort('404');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'first_name' => 'required',
            'last_name' => '',
            'gender' => 'required',
            'category' => 'required',
            'phone' => '',
            'title' => '',
            'user_id' => ''
        ], [
            'first_name.required' => 'The First Name field is required.',
            'last_name.required' => 'The Last Name field is required.',
            'gender.required' => 'The Gender field is required.',
            'category.required' => 'The Category field is required.'
        ]);

        $formatValidateDate = $this->_formatValidateData($validatedData, false);

        $this->doctorRepo->update($formatValidateDate, $id);
        $this->_updateUserToDoctor($validatedData, false);
        return redirect(route('admin.doctor.list'))->with('message', "The Doctor '{$request->first_name}' has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->doctorRepo->delete($id);
        if ($deleted) {
            return redirect()->route('admin.doctor.list')
                ->with('error_message', "The doctor has been deleted.");
        } else {

            return false;
        }
    }

    private function _updateUserToDoctor($doctorDetails, $isCreate = true)
    {
        $userData = [
            'first_name' => $doctorDetails['first_name'],
            'last_name' =>isset($doctorDetails['last_name']) ? $doctorDetails['last_name'] : null,
            'title' => isset($doctorDetails['title']) ? $doctorDetails['title'] : null
        ];

        if($isCreate){
            $userData['role_id'] = DOCTOR_ROLE_ID;
        }

        $this->userRepo->update($userData, $doctorDetails['user_id']);
    }

}
