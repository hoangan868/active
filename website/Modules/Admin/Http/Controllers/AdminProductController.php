<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        if($request->name) $products->where('pro_name','like','%'.$request->name.'%');
        $categories =$this->getCategories();
        if($request->cate) $products->where('pro_category_id',$request->cate);
        $products = $products->orderByDesc('id')->paginate(10);
        $viewData = [
            'categories' =>$categories,
            'products' =>$products
        ];
        return view('admin::product.index',$viewData);
    }
    public function create()
    {
        $categories = $this->getCategories();
        return view('admin::product.create',compact('categories'));
    }
    public function store(RequestProduct $requestProduct)
    {
        //dd($requestProduct->all());
        $this->insertOrUpdate($requestProduct);
        return redirect()->back();
    }
    public function getCategories()
    {
        return Category::all();
    }
    public function insertOrUpdate($requestProduct,$id='')
    {
        $code=1;
        try{
            $product = new Product();
            if($id){
                $product = Product::find($id);
            }
            $product->pro_name = $requestProduct->pro_name;
            $product->pro_slug = str::slug($requestProduct->pro_name);
            $product->pro_category_id = $requestProduct->pro_category_id;
            $product->pro_price = $requestProduct->pro_price;
            $product->pro_description = $requestProduct->pro_description;
            $product->pro_content = $requestProduct->pro_content;
            $product->pro_sale = $requestProduct->pro_sale;
            $product->pro_title_seo = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
            $product->pro_description_seo = $requestProduct->pro_description_seo;
            $product->save();
        }catch(\Exception $exception)
        {
            $code=0;
            Log::error("[Error insertOrUpdate Product ]".$exception->getMessage());
        }
        return $code;
    }
    public function edit($id)
    {
        $product =Product::find($id);
        $categories = $this->getCategories();
        return view('admin::product.update',compact('product','categories'));
    }
    public function update(RequestProduct $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct,$id);
        return redirect()->back();
    }
    public function action($action,$id)
    {
        if($action)
        {
            $product = Product::find($id);
            switch($action)
            {
                case 'delete':
                    $product->delete();
                    break;
                case 'active':
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    $product->save();
                    break;
                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $product->save();
                    break;
            }
            
        }
        return redirect()->back();
    }
}
