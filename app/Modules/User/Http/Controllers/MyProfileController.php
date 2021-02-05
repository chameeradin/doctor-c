<?php

namespace App\Modules\User\Http\Controllers;

use App\Modules\Doctor\Contracts\DoctorRepositoryInterface;
use App\Modules\Patient\Contracts\PatientRepositoryInterface;
use App\Modules\User\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{
    protected  $userRepo;
    protected  $doctorRepo;
    protected  $patientRepo;

    public function __construct(UserRepositoryInterface $userRepo, DoctorRepositoryInterface $doctorRepo, PatientRepositoryInterface $patientRepo)
    {
        $this->userRepo = $userRepo;
        $this->doctorRepo = $doctorRepo;
        $this->patientRepo = $patientRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myProfile()
    {
        $loggedUser = Auth::user();
        $loggedUserRole = Auth::user()->role->id;

        switch ($loggedUserRole){
            case DOCTOR_ROLE_ID;
                $loggedUserDetails = $this->doctorRepo->getDoctorByUserId($loggedUser->id);
                break;
            case PATIENT_ROLE_ID;
                $loggedUserDetails = $this->patientRepo->getPatientByUserId($loggedUser->id);
                break;
            default;
                $loggedUserDetails = $loggedUser;
        }

        $data = [
            'user' => $loggedUser,
            'userDetails' => $loggedUserDetails,
            'metaTitle' => 'My account'
        ];

        return view('user::profile.my_profile', $data);
    }
    public function passwordChange()
    {
        $loggedUser = Auth::user();
        $data = [
            'user' => $loggedUser,
            'metaTitle' => 'Change password'
        ];

        return view('user::profile.change_password', $data);
    }
    public function emailChange()
    {
        $loggedUser = Auth::user();
        $data = [
            'user' => $loggedUser,
            'metaTitle' => 'Change email'
        ];

        return view('user::profile.change_email', $data);
    }

    public function profileUpdate(Request $request)
    {
        $userId = Auth::user()->id;
        $loggedUserRoleID = Auth::user()->role->id;

        $validatedData = $this->_validateProfile($request, $loggedUserRoleID);

        $updateProfile = $this->userRepo->saveProfile($validatedData, $userId, $loggedUserRoleID, false);

        if($updateProfile){
            return redirect()->route('profile')->with('message', "The '{$request->first_name}' user has been updated.");
        }else{
            abort(500);
        }

    }

    public function passwordUpdate(Request $request)
    {
        $currentPassword =  Auth::User()->password;

        $validatedData = request()->validate([
            'current_password' => ['bail','required','min:6','max:20'],
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        if(Hash::check($validatedData['current_password'], $currentPassword)){

            $userId = Auth::user()->id;
            $data['password'] = Hash::make($validatedData['password']);
            $userUpdated = $this->userRepo->update($data, $userId);

            if($userUpdated) {
                return redirect()->route('profile')->with('message', "Successfully updated your password.");
            }else{
                abort(500);
            }

        }else{
            return redirect()->route('change.password')->with('error_message', "Please enter the correct password.");
        }
    }

    public function emailUpdate(Request $request)
    {
        $validatedData = request()->validate(
            [
                'email' => 'required|string|email|max:255|unique:users',
            ],
            [
                'email.required' => 'New email field is required.',
                'email.unique' => 'This email already used.'
            ]
        );
        $userId = Auth::user()->id;
        $userUpdated = $this->userRepo->update($validatedData, $userId);

        if($userUpdated) {
            return redirect()->route('profile')->with('message', "Successfully updated your email.");
        }else{
            abort(500);
        }
    }

    private function _validateProfile($request, $role)
    {
        $validateArray = [
            'title' =>'',
            'first_name' => 'required',
            'last_name' => '',
        ];
        if($role == DOCTOR_ROLE_ID || $role == PATIENT_ROLE_ID){
            $validateArray['phone'] = 'required';
            $validateArray['gender'] = 'required';
        }
        if($role == PATIENT_ROLE_ID){
            $validateArray['age'] = 'required';
        }

        return $request->validate($validateArray);
    }


}
