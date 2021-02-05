<?php

namespace App\Modules\Category\Repositories;

use App\Category;
use App\Modules\Category\Contracts\CategoryRepositoryInterface;
use App\Repositories\MainRepository;
use Illuminate\Contracts\Container\Container as App;

class CategoryRepository extends MainRepository implements CategoryRepositoryInterface
{
    /**
     *
     * @return mixed
     */
    protected $categoryModel;

    /**
     * CategoryRepository constructor.
     * @param App $app
     * @param Category $category
     */
    public function __construct(App $app, Category $category)
    {
        parent::__construct($app);

        $this->categoryModel = $category;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Category';
    }

    public function saveCategory($data, $categoryId = null)
    {
        return $this->create($data);
    }

    public function getCategories($params = [], $paginate = false)
    {
        $category = $this->categoryModel;

        if(isset($params['c_name'])){
            $category = $category->where('c_name','like','%'.$params['c_name'].'%');
        }
        if(isset($params['fee'])){
                    $category = $category->where('fee','like','%'.$params['fee'].'%');
        }

        if($paginate) {
            $category = $category->paginate(ADMIN_PAGINATE_COUNT);
        }else {
            $category = $category->get();
        }

        return $category;
    }

    public function getCategoryById($id)
    {
      return $this->categoryModel>find($id);
    }
}
