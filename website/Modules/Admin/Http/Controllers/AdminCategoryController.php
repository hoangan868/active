<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::select('id','c_name','c_title_seo','c_active')->get();
        $viewData = [
            'categories' => $categories
        ];
        return view('admin::category.index',$viewData);
    }
    public function create()
    {
        return view('admin::category.create');
    }
    public function store(RequestCategory $requestCategory)
    {
        //dd($requestCategory->all());
        $this->insertOrUpdate($requestCategory);
        return redirect()->back();
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::category.update',compact('category'));
    }
    public function update(RequestCategory $requestCategory,$id)
    {
        
        $this->insertOrUpdate($requestCategory,$id);
        return redirect()->back();
    }
    public function insertOrUpdate($requestCategory,$id='')
    {
        $code=1;
        try{
            $category = new Category();
            if($id){
                $category = Category::find($id);
            }
            $category->c_name = $requestCategory->name;
            $category->c_slug = str::slug($requestCategory->name);
            $category->c_icon = str::slug($requestCategory->icon);
            $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->name;
            $category->c_description_seo = $requestCategory->c_description_seo;
            $category->save();
        }catch(\Exception $exception)
        {
            $code=0;
            Log::error("[Error insertOrUpdate Categories ]".$exception->getMessage());
        }
        return $code;
    }
    public function action(Request $request,$action,$id)
    {
        if($action)
        {
            $category = Category::find($id);
            switch($action)
            {
                case 'delete':
                    $category->delete();
                    break;
            }
        }
        return redirect()->back();
    }
    
}
