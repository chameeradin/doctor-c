<?php

namespace App\Modules\Inquiry\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Modules\Inquiry\Contracts\InquiryRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

class AdminInquiryController extends AdminController
{
    private $inquiryRepo;

    public function __construct(InquiryRepositoryInterface $inquiryRepo)

    {
        parent::__construct();

        $this->inquiryRepo = $inquiryRepo;
    }

    public function index(Request $request)
    {
        try {
            $data ['metaTitle'] = 'Inquiry List';
            $filters = [
                'name' => (!empty($request->name)) ? $request->name : null,
                'email' => (!empty($request->email)) ? $request->email : null,
                'created_date' => (!empty($request->date)) ? $request->date : null,
                'duplicate' => (!empty($request->duplicate_contact)) ? $request->duplicate_contact : null,
            ];
            $data['inquiries'] = $this->inquiryRepo->getInquiries($filters, true);
            return view('inquiry::inquiry_list', $data);
      } catch (Exception $e) {
        abort(500);
        error_log("Error Thrown" .$e->getMessage());
      }
    }

    public function getInquiryCreate()
    {
        $data = [
          'metaTitle' => 'New Inquiry',
        ];

        return view('inquiry::new_inquiry', $data);
    }

    public function store()
    {

        $validatedData = request()->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'telephone_number'=>'',
            'email_addresss'=>'required',
            'message'=>'required'
        ], [
            'first_name.required'=>'The first name is required.',
            'last_name.required'=>'The last name field is required.',
            'email_addresss.required'=>'The email addresss field is required.',
            'message.required'=>'The message field is required.'
        ]);

        /*$formatValidateDate = $this->_formatValidateData($validatedData, true);*/

        try {
            $created = $this->inquiryRepo->create($validatedData);
            if ($created) {
                return redirect()->route('admin.inquiry.list')
                    ->with('message', "The '" . $created->id . "' Inquiry has been created.");
            } else {
                return false;
            }
        } catch (Exception $e) {
            abort(500);
            error_log("Error Thrown" . $e->getMessage());
        }
      }

    public function destroy($id)
    {
        $deleted = $this->inquiryRepo->delete($id);
        if ($deleted) {
            return redirect()->route('admin.inquiry.list')
                ->with('message', "The inquiry has been deleted.");
        } else {
            return false;
        }
    }
}
