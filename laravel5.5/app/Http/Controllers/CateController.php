<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateRequest;
use App\Cates;


class CateController extends Controller
{
	public function index ()
	{
		$data = Cates::select('id','name','parent_id','description','statut')->get()->toArray();
		return view('admin.cate.index',compact('data'));
	}

	public function getAdd ()
	{
		$data = Cates::select('id','name','parent_id')->get()->toArray();
		return view('admin.cate.add',compact('data'));
	}

	public function postAdd (CateRequest $request)
	{
		$cate = new Cates;
		$cate->name = $request->name;
		$cate->alias = changeTitle($request->name);
		$cate->order = isset($request->order) ? $request->order : 0;
		$cate->parent_id = isset($request->parentid) ? $request->parentid : 0;
		$cate->keywords = isset($request->Keyworld) ? $request->Keyworld : '';
		$cate->description = isset($request->descript) ? $request->descript : '';
		$cate->statut = isset($request->status) ? $request->status : 0;
		$cate->save();
		return redirect()->route('admin.cate.index')->with(['flash_lever'=>'success','flash_message'=>'Thêm mới thành công']);
	}

	public function getDelete ($id)
	{
		$parent = Cates::where('parent_id',$id)->count();
		if ($parent == 0) {
			$cate = Cates::find($id);
			$cate->Delete();
			return redirect()->route('admin.cate.index')->with(['flash_lever'=>'success','flash_message'=>'Delete Success']);
		} else {
			echo "<script type='text/javascript'>
				alert('ban ko the xoa danh muc nay');
				window.location = '";
					echo route('admin.cate.index');
				echo "'
			</script>";
		}
	}

	public function getEdit ($id)
	{
		$data = Cates::select('id','name','parent_id')->get()->toArray();
		$cate = Cates::findOrFail($id)->toArray();
		// echo "<pre>";
		// print_r($cate);
		// die;
		return view('admin.cate.edit',compact('cate','data','id'));
	}

	public function postEdit (Request $request,$id)
	{
		
		$this->validate($request,
			["name" => "required"],
			["name.required" => "Vui long nhap ten"]
		);

		$cate = Cates::find($id); 
		$cate->name = $request->name;
		$cate->alias = changeTitle($request->name);
		$cate->order = isset($request->order) ? $request->order : 0;
		$cate->parent_id = isset($request->parentid) ? $request->parentid : 0;
		$cate->keywords = isset($request->Keyworld) ? $request->Keyworld : '';
		$cate->description = isset($request->descript) ? $request->descript : '';
		$cate->statut = isset($request->status) ? $request->status : 0;
		$cate->save();
		return redirect()->route('admin.cate.index')->with(['flash_lever'=>'success','flash_message'=>'Sửa dữ liệu thành công']);
	}
}
