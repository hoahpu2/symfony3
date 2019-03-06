<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Cates;
use App\Product;
use App\Product_image;
use App\Http\Requests\ProductRequest;
use Input;
use File;
use Storage;
use Session;

class ProductController extends Controller
{
    public function index ()
    {
       
    	$data = Product::select('id','name','price','image','cat_id','use_id','statut','created_at','updated_at')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.product.index',compact('data'));
    }

    public function getAdd () {
    	$data = Cates::select('id','name','parent_id')->get()->toArray();
		return view('admin.product.add',compact('data'));
    }

    public function postAdd (ProductRequest $pro_request) {
    	$file_name = $pro_request->file('img')->getClientOriginalName();
        $file_names = str_random(4).$file_name;
    	$product = new Product;
    	$product->name = $pro_request->name;
    	$product->alias = changeTitle($pro_request->name);
    	$product->price = $pro_request->price_buy;
    	$product->intro = $pro_request->sortDesc;
    	$product->content = $pro_request->detail;
    	$product->image = $file_names;
    	$product->keywords = changeTitle($pro_request->name);
    	$product->description = $pro_request->sortDesc;
    	$product->cat_id = $pro_request->catid;
    	$product->use_id = Session::get('hoa_login');
    	$product->statut = $pro_request->status;
    	$pro_request->file('img')->move('resources/upload/product/',$file_names);
    	$product->save();
    	$product_id = $product->id;
    	if(!empty($pro_request->file('image_list'))){
    		foreach ($pro_request->file('image_list') as $value) {
    			$product_img = new Product_image;
    			if(isset($value)){
                    $detail_name = str_random(4).$value->getClientOriginalName();
    				$product_img->image = $detail_name;
    				$product_img->product_id = $product_id;
    				$value->move('resources/upload/product/detail/',$detail_name);
    				$product_img->save();
    			}
    		}
    	}
    	return redirect()->route('admin.product.index')->with(['flash_lever'=>'success','flash_message'=>'Thêm mới thành công']);
    }

    public function getDelete ($id) {
    	$product_detail = Product::find($id)->product_image->toArray();
    	foreach ($product_detail as $value) {
    		File::delete('resources/upload/product/detail/'.$value['image']);
    	}
		$product = Product::find($id);
		File::delete('resources/upload/product/'.$product->image);
		$product->Delete();
		return redirect()->route('admin.product.index')->with(['flash_lever'=>'success','flash_message'=>'Delete Success']);
	}

	public function getEdit ($id)
	{
		$data = Cates::select('id','name','parent_id')->get()->toArray();
		$cate = Product::findOrFail($id)->toArray();
		$dola = Product::find($id)->product_image;
		$datas = Cates::select('parent_id')->where('id',$cate['cat_id'])->get()->toArray();
		//echo "<pre>";
		//print_r($datas);
		//die;
		return view('admin.product.edit',compact('cate','data','id','dola','datas'));
	}

	public function postEdit(ProductRequest $pro_request, $id)
	{
		// die('a');
		// $this->validate($pro_request,
		// 	["name" => "required"]
		// );
		
    	$product = Product::find($id);
    	$product->name = $pro_request->name;
    	$product->alias = changeTitle($pro_request->name);
    	$product->price = $pro_request->price_buy;
    	$product->intro = $pro_request->sortDesc;
    	$product->content = $pro_request->detail;
    	if(!empty($pro_request->file('img'))){
    		$file_name = $pro_request->file('img')->getClientOriginalName();
            $update = str_random(4).$file_name;
    		$product->image = $update;
    		$pro_request->file('img')->move('resources/upload/product/',$update);
    	}
    	$product->keywords = changeTitle($pro_request->name);
    	$product->description = $pro_request->sortDesc;
    	$product->cat_id = $pro_request->catid;
    	$product->use_id = Session::get('hoa_login');
    	$product->statut = $pro_request->status;
    	if(!empty($pro_request->file('image_list'))){
	    	$product_detail = Product::find($id)->product_image->toArray();
	    	foreach ($product_detail as $value) {
	    		File::delete('resources/upload/product/detail/'.$value['image']);
	    	}
    	}
    	if(!empty($pro_request->file('img'))){
    		$product1 = Product::find($id);
			File::delete('resources/upload/product/'.$product1->image);
    	}
    	
    	$product->save();
    	$product_id = $product->id;
    	if(!empty($pro_request->file('image_list'))){
    		foreach ($pro_request->file('image_list') as $value) {
    			$product_img = new Product_image;
    			if(isset($value)){
                    $uproduct = str_random(4).$value->getClientOriginalName();
    				$product_img->image = $uproduct;
    				$product_img->product_id = $product_id;
    				$value->move('resources/upload/product/detail/',$uproduct);
    				$product_img->save();
    			}
    		}
    	}
    
    	return redirect()->route('admin.product.index')->with(['flash_lever'=>'success','flash_message'=>'Sửa dữ liệu thành công']);
	}
}
