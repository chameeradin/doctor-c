<?php
namespace App\Modules\Doctor\Contracts;

use App\Contracts\MainRepositoryInterface;

interface DoctorRepositoryInterface extends MainRepositoryInterface
{

    /**
     * create doctor
     * @param $data
     * @param $doctorId
     * @return mixed
     */
    public function saveDoctor($data, $doctorId = null);

    /**
     * @param $args
     * @return mixed
     */
    //public function checkDoctorAlreadyRegistered($args);

    /**
     * @param array $filters
     * @param boolean $pagination
     * @return mixed
     */
    public function getDoctors($filters = [], $pagination = false);

    public function getDoctorById($id = false);

    public function getDoctorByUserId($userId =  false);

}
