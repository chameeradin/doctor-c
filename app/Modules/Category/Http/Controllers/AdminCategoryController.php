<?php

namespace App\Modules\Category\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Modules\Category\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

class AdminCategoryController extends AdminController
{
    private $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)

    {
        parent::__construct();

        $this->categoryRepo = $categoryRepo;
    }

    public function index(Request $request)
    {
        try {
            $data['metaTitle'] = 'Category List';
            $params = $this->_getSearchParams($request);
            $data['categories'] = $this->categoryRepo->getCategories($params,  true);
            return view('category::category_list', $data);
        }catch (Exception $e){
            abort(500);
            error_log("Error Thrown".$e->getMessage());
        }

    }

    public function getCategoryCreate()
    {
        $data = [
          'metaTitle' => 'New Category'
        ];

        return view('category::create', $data);
    }

    public function store()
    {
        $validatedData = request()->validate([
            'c_name' => 'required',
            'fee' => 'required',

        ], [
            'c_name.required' => 'The Category Name field is required.',
            'fee.required' => 'The Category Fee field is required.'
        ]);

        $formatValidateDate = $this->_formatValidateData($validatedData, true);
        try {
            $created = $this->categoryRepo->create($formatValidateDate);
            if($created) {
                return redirect()->route('admin.category.list')
                    ->with('message', "The '".$created->c_name."' category has been created.");
            }else {
                return false;
            }
        }catch (Exception $e){
            abort(500);
            error_log("Error Thrown".$e->getMessage());
        }
    }

    /**
     * Search params for category list
     *
     * @param $request
     * @return array
     */
    private function _getSearchParams($request)
    {
        $params = [];

        if(isset($request->category_name) && !empty($request->category_name)){
            $params['c_name'] = $request->category_name;
        }
        if(isset($request->fee) && !empty($request->fee)){
            $params['fee'] = $request->fee;
        }

        return $params;
    }

    private function _formatValidateData($data, $isCreate = true)
    {
        if($isCreate){
            $categoryData = [
                'name' => $data['c_name'],
                'fee' => $data['fee'],
            ];

            return $categoryData;
        }
    }

    public function edit($id){

        $category = $this->categoryRepo->find($id);

        if(!empty($category)){
            $data = [
                'category' => $category,
                'metaTitle' => 'Edit Category'
            ];
            return view('category::edit', $data);
        }else{
            abort('404');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = request()->validate([
            'c_name' => 'required',
            'fee' => 'required'
        ], [
            'c_name.required' => 'The Name field is required.',
            'fee.required' => 'The Fee field is required.'
        ]);

        $formatValidateDate = $this->_formatValidateData($validatedData, true);

        $this->categoryRepo->update($formatValidateDate, $id);

        return redirect(route('admin.category.list'))->with('success_message', "The Category '{$request->c_name}' has been updated.");
    }

    public function destroy($id)
    {
        $deleted = $this->categoryRepo->delete($id);
        if ($deleted) {
            return redirect()->route('admin.category.list')
                ->with('message', "The category has been deleted.");
        } else {
            return false;
        }
    }
}
