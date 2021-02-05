<?php

namespace App\Modules\Record\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Modules\Record\Contracts\RecordRepositoryInterface;
use App\Modules\Doctor\Contracts\DoctorRepositoryInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class AdminRecordController extends AdminController
{
  private $recordRepo;
  private $doctorRepo;


      public function __construct(RecordRepositoryInterface $recordRepo, DoctorRepositoryInterface $doctorRepo)
      {
          parent::__construct();


          $this->recordRepo = $recordRepo;
          $this->doctorRepo = $doctorRepo;
      }
      public function index(Request $request)
      {
        try {

            $data  ['metaTitle'] = 'Record List';
            $params = $this->_getSearchParams($request);
            $data['records'] = $this->recordRepo->getRecords($params, true);
            return view('record::record_list', $data);
        } catch (Exception $e) {
            abort(500);
            error_log("Error Thrown" . $e->getMessage());
        }
      }

  public function getRecordCreate()
  {
      $data = [
        'metaTitle' => 'Create Record',
        'doctorList' => $this->doctorRepo->getDoctors()
      ];
      return view('record::new_record', $data);

  }

  public function store()
  {
      $validatedData = request()->validate([
          'name' =>'required',
          'doctor_id' => 'required',
          'date' => 'required',
          'time' => 'required',
          'limit' => 'required'
      ],
      [
          'doctor_id.required' => 'The Doctor field is required.',
          'date.required' => 'The Record Date field is required.',
          'time.required' => 'The Record Time field is required.',
          'limit.required' => 'The Limit field is required.'
      ]);

      try {
          $created = $this->recordRepo->create($validatedData);
          if ($created) {
              $refNo['ref_no'] = 'AROGYA_REC_'.$created->id;
              $this->recordRepo->update($refNo, $created->id);
              return redirect()->route('admin.record.list')
                  ->with('message', "The ".$validatedData['name']. "record has been created.");
          } else {
              abort(404);
          }
      } catch (Exception $e) {
          abort(500);
          error_log("Error Thrown" . $e->getMessage());
      }
  }

  private function _getSearchParams($request)
  {
      $filters = [];

      $filters['ref_no'] = request('ref_no');
      $filters['name'] = request('record_name');
      $filters['date'] = request('date');
      $filters['time'] = request('time');
      $filters['limit'] = request('limit');

      return $filters;
  }

  /**
   * Edit page load.
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function edit($id){

      $record = $this->recordRepo->getRecordById($id);

      if(!empty($record)){
          $data = [
              'record' => $record,
              'doctorList' => $this->doctorRepo->getDoctors(),
              'metaTitle' => 'Edit Record'
          ];
          return view('record::edit_record', $data);
      }else{
          abort('404');
      }
  }

  public function update(Request $request, $id)
  {
      $validatedData = request()->validate([
          'name' => '',
          'doctor_id' => 'required',
          'date' => 'required',
          'time' => 'required',
          'limit' => 'required'
      ], [
          'doctor_id.required' => 'The Doctor field is required.',
          'date.required' => 'The Record Date field is required.',
          'time.required' => 'The Record Time field is required.',
          'limit.required' => 'The Limit field is required.'
      ]);

      $this->recordRepo->update($validatedData, $id);

      return redirect(route('admin.record.list'))->with('success_message', "The Record '{$request->id}' has been updated.");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $deleted = $this->recordRepo->delete($id);
      if ($deleted) {
          return redirect()->route('admin.record.list')
              ->with('message', "The Record has been deleted.");
      } else {
          return false;
      }
  }
}
