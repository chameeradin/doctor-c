<?php

namespace App\Modules\Record\Contracts;

use App\Contracts\MainRepositoryInterface;

interface RecordRepositoryInterface extends MainRepositoryInterface {

  /**
   * create record
   * @param $data
   * @param $recordId
   * @return mixed
   */
  public function saveRecord($data, $recordId = null);

  /**
   * @param $args
   * @return mixed
   */
  //public function checkRecordAlreadyRegistered($args);

  /**
   * @param array $filters
   * @param boolean $pagination
   * @return mixed
   */
  public function getRecords($filters = [], $pagination = false);

  public function getRecordById($id = false);

  public function getRecordByDoctorId($doctorId, $date);
}
