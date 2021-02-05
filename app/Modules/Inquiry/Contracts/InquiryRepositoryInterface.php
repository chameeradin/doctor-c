<?php
namespace App\Modules\Inquiry\Contracts;

use App\Contracts\MainRepositoryInterface;

interface InquiryRepositoryInterface extends MainRepositoryInterface
{

    /**
     * create patient
     * @param $data
     * @param $patientId
     * @return mixed
     */
    public function saveInquiry($data, $inquiryId = null);

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
    public function getInquiries($filters = [], $pagination = false);
}
