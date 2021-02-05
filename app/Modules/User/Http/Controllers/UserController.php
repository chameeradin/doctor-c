<?php

namespace App\Modules\User\Http\Controllers;

use App\Mail\UserRegister;
use Illuminate\Http\Request;
use App\Modules\User\Contracts\UserRepositoryInterface;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class UserController extends AdminController
{

    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        parent::__construct();


        $this->userRepo = $userRepo;
    }
    public function index(Request $request)
    {
        try {

            $data  ['metaTitle'] = 'User List';
            $params = $this->_getSearchParams($request);
            $data['users'] = $this->userRepo->getUsers($params, true);
            $data['roles'] = $this->userRepo->getRoles();
            return view('user::user_list', $data);
        } catch (Exception $e) {
            abort(500);
            error_log("Error Thrown" . $e->getMessage());
        }
    }

    public function getUserCreate(Request $request)
    {
        $redirectUrl = isset($request->redirect) ? $request->redirect : null;
        if($redirectUrl == 'patient'){
            $redirectUrl = '/dashboard/patient/new';
        }elseif($redirectUrl == 'doctor'){
            $redirectUrl = '/dashboard/doctor/new';
        }else{
            $redirectUrl = null;
        }
        $data = [
            'metaTitle' => 'Create User',
            'roleList' => $this->userRepo->getRoles(),
            'redirectUrl' => $redirectUrl
        ];
        return view('user::new_user', $data);
    }

    public function store(Request $request)
    {

        $validatedData = request()->validate([
            'title' =>'',
            'first_name' => 'required',
            'last_name' => '',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'role_id' => ''
        ],
            [
                'first_name.required' => 'The User Name field is required.',
                'email.required' => 'The Email field is required.',
                'password.required' => 'The Password field is required.',
                'role_id.required' => 'The Role field is required.',
                'email.unique' => 'This email already used.'
            ]);

        try {
            $created = $this->userRepo->saveProfile($validatedData, null, GUEST_ROLE_ID, true);
            if ($created) {

                // Mail::to($validatedData['email'])->queue(new UserRegister($validatedData));
                return redirect($request->redirect)
                    ->with('message', "The ".$validatedData['first_name']. "user has been created.");
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

        $filters['first_name'] = request('first_name');
        $filters['last_name'] = request('last_name');
        $filters['email'] = request('email');
        $filters['role'] = request('role');

        return $filters;
    }

    public function edit($id)
    {
        $user = $this->userRepo->getUserById($id);

        if(!empty($user)){
            $data = [
                'user' => $user,
                'roleList' => $this->userRepo->getRoles(),
                'metaTitle' => 'Edit User'
            ];
            return view('user::edit_user', $data);
        }else{
            abort('404');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'title' =>'',
            'first_name' => 'required',
            'last_name' => '',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'sometimes',
            'role_id' => ''
        ], [
            'first_name.required' => 'The User Name field is required.',
            'email.required' => 'The Email field is required.',
            'password.required' => 'The Password field is required.',
            'email.unique' => 'This email already used.'
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $this->userRepo->saveProfile($validatedData, $id, $validatedData['role_id'], true);

        return redirect(route('admin.user.list'))
            ->with('success_message', "The User '{$request->id}' has been updated.");
    }

    public function destroy($id)
    {
        $deleted = $this->userRepo->delete($id);
        if ($deleted) {
            return redirect()->route('admin.user.list')
                ->with('message', "The User has been deleted.");
        } else {
            return false;
        }
    }


    public function userDetails($id)
    {
        $data = $this->userRepo->getUserById($id);

        $return = [
            'status' => true,
            'data' => $data
        ];

        return json_encode($return);
    }
}
