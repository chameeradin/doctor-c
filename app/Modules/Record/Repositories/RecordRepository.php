<?php

namespace App\Modules\Record\Repositories;

use App\Record;
use App\Modules\Record\Contracts\RecordRepositoryInterface;
use App\Repositories\MainRepository;
use Illuminate\Contracts\Container\Container as App;
use App\Doctor;
use Illuminate\Support\Facades\Auth;

class RecordRepository extends MainRepository implements RecordRepositoryInterface
{
    /**
     *
     * @return mixed
     */
    protected $recordModel;
    protected $doctorModel;

    /**
     * RecordRepository constructor.
     * @param App $app
     * @param Record $record
     *@param Doctor $doctor

     */
    public function __construct(App $app, Record $record, Doctor $doctor)
    {
        parent::__construct($app);

        $this->recordModel = $record;
        $this->doctorModel = $doctor;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Record';
    }

    public function saveRecord($data, $recordId = null)
    {

        return $this->create($data);
    }

    public function getRecords($filters = [], $pagination = false)
    {
        $record = $this->recordModel;

        if(isset($filters['ref_no']) && !empty($filters['ref_no'])){
            $record = $record->where('ref_no','like','%'.$filters['ref_no'].'%');
        }
        if(isset($filters['name']) && !empty($filters['name'])){
            $record = $record->where('name','like','%'.$filters['name'].'%');
        }
        if(isset($filters['date']) && !empty($filters['date'])){
            $record = $record->where('date','like','%'.$filters['date'].'%');
        }
        if(isset($filters['time']) && !empty($filters['time'])){
            $record = $record->where('time',$filters['time']);
        }
        if(isset($filters['limit']) && !empty($filters['limit'])){
            $record = $record->where('limit',$filters['limit']);
        }

        if(DOCTOR_ROLE_ID == Auth::user()->role->id){
            $record = $record->where('doctor_id', Auth::user()->doctor->id);
        }
        if($pagination) {
            $record = $record->paginate(ADMIN_PAGINATE_COUNT);
        }else {
            $record = $record->get();
        }

        return $record;
    }

    public function getRecordById($id = false)
    {
        return $this->recordModel
            ->where('id', $id)
            ->first();
    }

    public function getRecordByDoctorId($doctorId, $date)
    {
        return $this->recordModel
            ->where('date', $date)
            ->where('doctor_id', '=', $doctorId)
            ->get();
    }

    public function getDoctorByDate($date)
    {
        return $this->recordModel->where('date', $date)->first();
                       
    }
}
