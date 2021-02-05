<?php

namespace App\Modules\Inquiry\Repositories;

use App\Inquiry;
use App\Modules\Inquiry\Contracts\InquiryRepositoryInterface;
use App\Repositories\MainRepository;
use Illuminate\Contracts\Container\Container as App;

class InquiryRepository extends MainRepository implements InquiryRepositoryInterface
{
    /**
     *
     * @return mixed
     */
    protected $inquiryModel;

    /**
     * PatientRepository constructor.
     * @param App $app
     * @param Inquiry $inquiry
     */
    public function __construct(App $app, Inquiry $inquiry)
    {
        parent::__construct($app);

        $this->inquiryModel = $inquiry;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Inquiry';
    }

    public function saveInquiry($data, $inquiryId = null)
    {
        return $this->create($data);
    }

    public function getInquiries($filters = [], $pagination = false)
    {
        $inquiry = $this->inquiryModel;

        if(!empty($filters)){
            if(!empty($filters['name'])){
                $inquiry = $inquiry->where('name','like','%'.$filters['name'].'%');
            }
            if(!empty($filters['email'])){
                $inquiry = $inquiry->where('email','like','%'.$filters['email'].'%');
            }
            if(!empty($filters['created_date'])){
                $inquiry = $inquiry->where('created_at','like','%'.$filters['created_date'].'%');
            }
            if(!empty($filters['duplicate'])){
                $inquiry = $inquiry->groupBy('email');
            }

        }
        if($pagination) {
            $inquiry = $inquiry->paginate(ADMIN_PAGINATE_COUNT);
        }else{
            $inquiry = $inquiry->get();
        }

      return $inquiry;
    }
}
