<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\Slider;
use Session; 
use File;

class SliderController extends Controller
{
	public function index ()
	{
		$data = Slider::select('id','fullname','image','user_id','lever','statut')->get()->toArray();
		return view('admin.slider.index',compact('data'));
	}

	public function getAdd ()
	{
		return view('admin.slider.add');
	}

	public function postAdd (Request $request)
	{
		$user = new Slider;
		$user->fullname = $request->name;
		$user->user_id = Session::get('hoa_login');
		$user->lienket = $request->link;
		if(!empty($request->file('img'))){
			$file_name = $request->file('img')->getClientOriginalName();
			$file_names = str_random(4).$file_name;
			$user->image = $file_names;
			$request->file('img')->move('resources/upload/sliser/',$file_names);
		} else {
			$user->avatar = 'defaull.png';
		}
		
		$user->lever = $request->access;
		$user->statut = $request->status;
		$user->save();
		return redirect()->route('admin.slider.index')->with(['flash_lever'=>'success','flash_message'=>'Thêm mới thành công']);
	}

	public function getDelete ($id)
	{
		$User = Slider::find($id);
		$User->Delete();
		return redirect()->route('admin.slider.index')->with(['flash_lever'=>'success','flash_message'=>'Delete Success']);
	}

	public function getEdit ($id)
	{
		$data = Slider::select('id','fullname','image','user_id','lever','statut','lienket')->get()->toArray();
		$cate = Slider::findOrFail($id)->toArray();
		
		return view('admin.slider.edit',compact('cate','data','id'));
	}

	public function postEdit (Request $request,$id)
	{
		
		$this->validate($request,
			["name" => "required"],
			["name.required" => "Vui long nhap ten"]
		);

		$user = Slider::find($id); 
		$user->fullname = $request->name;
		$user->user_id = Session::get('hoa_login');
		$user->lienket = $request->link;
	
		if(!empty($request->file('img'))){
			
			File::delete('resources/upload/sliser/'.$user->image);
						
			$file_name = $request->file('img')->getClientOriginalName();
			$file_names = str_random(4).$file_name;
			$user->image = $file_names;
			$request->file('img')->move('resources/upload/sliser/',$file_names);
		} 
		
		$user->lever = $request->access;
		$user->statut = $request->status;
		$user->save();
		
		return redirect()->route('admin.slider.index')->with(['flash_lever'=>'success','flash_message'=>'Sửa thành công']);
	}

}
