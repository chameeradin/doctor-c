<?php

namespace App\Modules\Inquiry\Http\Controllers;

use App\Modules\Inquiry\Contracts\InquiryRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    private $inquiryRepo;
  public function __construct(InquiryRepositoryInterface $inquiryRepo)
  {
      parent::__construct();

      $this->inquiryRepo = $inquiryRepo;

  }

    public function store()
    {
        $validatedData = request()->validate([
            'name'=>'required',
            'email'=>'required|string|email|max:255',
            'message'=>'required'
        ]);

        try {
            $created = $this->inquiryRepo->create($validatedData);
            if ($created) {
                return redirect()->route('contactUs')
                    ->with('success_message', "You have successfully submitted your enquiry. We will get back to you shortly.");
            } else {
                abort(404);
            }
        } catch (Exception $e) {
            abort(500);
            error_log("Error Thrown" . $e->getMessage());
        }
    }
}
