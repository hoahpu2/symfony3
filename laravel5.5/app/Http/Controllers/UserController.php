<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserRequest;
use App\User;
use Session;
use File;

class UserController extends Controller
{
	public function index ()
	{
		$data = User::select('id','fullname','username','email','avatar','birthday','lever','decentralization')->get()->toArray();
		return view('admin.useradmin.index',compact('data'));
	}

	public function getAdd ()
	{
		return view('admin.useradmin.add');
	} 

	public function postAdd (Request $request)
	{
		$user = new User;
		$user->fullname = $request->fullname;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->birthday = $request->date;
		$user->password = bcrypt($request->password);

		if(!empty($request->file('img'))){
			$file_name = $request->file('img')->getClientOriginalName();
			$file_names = str_random(4).$file_name;
			$user->avatar = $file_names;
			$request->file('img')->move('resources/upload/useradmin/',$file_names);
		} else {
			$user->avatar = 'defaull.png';
		}
		
		$user->lever = $request->role;
		$user->decentralization = $request->status;
		$user->save();
		return redirect()->route('admin.user.index')->with(['flash_lever'=>'success','flash_message'=>'Thêm mới thành công']);
	}

	public function getDelete ($id)
	{
		if (Session::get('hoa_login') == $id) {
			echo "<script type='text/javascript'>
				alert('ban ko the xoa user nay vi ban dang dang nhap');
				window.location = '";
					echo route('admin.user.index');
				echo "'
			</script>";
		} else {
			$User = User::find($id);
			$User->Delete();
			return redirect()->route('admin.user.index')->with(['flash_lever'=>'success','flash_message'=>'Delete Success']);
		}
	}

	public function getEdit ($id)
	{
		$data = User::select('id','fullname','username','email','password','birthday','avatar','lever','decentralization')->get()->toArray();
		$cate = User::findOrFail($id)->toArray();
		
		return view('admin.useradmin.edit',compact('cate','data','id'));
	}

	public function postEdit (Request $request,$id)
	{
		
		$this->validate($request,
			["fullname" => "required"],
			["fullname.required" => "Vui long nhap ten"]
		); 

		$user = User::find($id); 
		$user->fullname = $request->fullname;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->birthday = isset($request->date) ? $request->date : $user->birthday;
		$user->password = bcrypt($request->password);

		if(!empty($request->file('image'))){
			if ($user->avatar != 'defaull.png') {
				File::delete('resources/upload/useradmin/'.$user->avatar);
			}
			
			$file_name = $request->file('image')->getClientOriginalName();
			$file_names = str_random(4).$file_name;
			$user->avatar = $file_names;
			$request->file('image')->move('resources/upload/useradmin/',$file_names);
		} 
		
		$user->lever = $request->role;
		$user->decentralization = $request->status;
		$user->save();
		
		return redirect()->route('admin.user.index')->with(['flash_lever'=>'success','flash_message'=>'Sửa thành công']);
	}

    public function getdangnhapAdmin ()
    {
    	return view('admin.login');
    } 

    public function postdangnhapAdmin (Request $request)
    {
    	if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])) {
    		return redirect()->route('admin.product.index');
    	} else {
    		return redirect()->route('admin.dangnhap');
    	}
    }

    public function getdangxuatAdmin ()
    {
    	Auth::logout();
    	Session::flush();
    	return redirect()->route('admin.dangnhap');
    }
}
