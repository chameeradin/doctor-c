<?php
namespace App\Modules\Category\Contracts;

use App\Contracts\MainRepositoryInterface;

interface CategoryRepositoryInterface extends MainRepositoryInterface
{

    /**
     * create category
     * @param $data
     * @param $categoryId
     * @return mixed
     */
    public function saveCategory($data, $categoryId = null);

    /**
     * @param $args
     * @return mixed
     */
    //public function checkCategoryAlreadyRegistered($args);

    /**
     * @param array $filters
     * @param boolean $pagination
     * @return mixed
     */
    public function getCategories($filters = [], $pagination = false);

    public function getCategoryById($id);
}
