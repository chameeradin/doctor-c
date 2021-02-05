<?php

namespace App\Modules\Appointment\Contracts;

use App\Contracts\MainRepositoryInterface;

interface AppointmentRepositoryInterface extends MainRepositoryInterface {

  public function getAppointments($filters = [], $pagination = false);

  public function getAppointmentById($id = false);


}
