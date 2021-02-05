<?php
namespace App\Modules\Patient\Contracts;

use App\Contracts\MainRepositoryInterface;

interface PatientRepositoryInterface extends MainRepositoryInterface
{

    /**
     * create patient
     * @param $data
     * @param $patientId
     * @return mixed
     */
    public function savePatient($data, $patientId = null);

    /**
     * @param $args
     * @return mixed
     */
    //public function checkPatientAlreadyRegistered($args);

    /**
     * @param array $filters
     * @param boolean $pagination
     * @return mixed
     */
    public function getPatients($filters = [], $pagination = false);

    public function getPatientById($id = false);

    public function getPatientByUserId($userId =  false);
}
