<?php

namespace App\Modules\Prescription\Contracts;

use App\Contracts\MainRepositoryInterface;

interface PrescriptionRepositoryInterface extends MainRepositoryInterface {

    public function getPrescriptions($filters = [], $pagination = false);

    public function getPrescriptionById($id = false);

    public function getAppointmentById($id = false);

}
