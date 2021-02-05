<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        App::bind('App\Modules\Page\Contracts\PageRepositoryInterface', 'App\Modules\Page\Repositories\PageRepository');
        App::bind('App\Modules\Patient\Contracts\PatientRepositoryInterface', 'App\Modules\Patient\Repositories\PatientRepository');
        App::bind('App\Modules\Doctor\Contracts\DoctorRepositoryInterface', 'App\Modules\Doctor\Repositories\DoctorRepository');
        App::bind('App\Modules\Appointment\Contracts\AppointmentRepositoryInterface', 'App\Modules\Appointment\Repositories\AppointmentRepository');
        App::bind('App\Modules\Record\Contracts\RecordRepositoryInterface', 'App\Modules\Record\Repositories\RecordRepository');
        App::bind('App\Modules\Category\Contracts\CategoryRepositoryInterface', 'App\Modules\Category\Repositories\CategoryRepository');
        App::bind('App\Modules\Inquiry\Contracts\InquiryRepositoryInterface', 'App\Modules\Inquiry\Repositories\InquiryRepository');
        App::bind('App\Modules\User\Contracts\UserRepositoryInterface', 'App\Modules\User\Repositories\UserRepository');
        App::bind('App\Modules\Prescription\Contracts\PrescriptionRepositoryInterface', 'App\Modules\Prescription\Repositories\PrescriptionRepository');

    }
}
