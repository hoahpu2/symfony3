@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <form action="{!! route('admin.user.getEdit',$cate['id']) !!}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <section class="content-header">
            <h1><i class="fa fa-user-plus"></i> Sửa thành viên</h1>
            <div class="breadcrumb">
                <button type = "submit" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-floppy-save"></span>
                    Lưu[Sửa]
                </button>
                <a class="btn btn-primary btn-sm" href="{!! route('admin.user.index') !!}" role="button">
                    <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            @if(count($errors) > 0)
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                            <div class="col-md-9" style="padding-left: 0px">
                                
                                <div class="form-group">
                                    <label>Họ và tên <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="fullname" style="width:100%" value="{!! $cate['fullname'] !!}">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Sinh Nhật<span class = "maudo">(*)</span></label>
                                    <input type="date" class="form-control" name="date" style="width:100%" value="" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class = "maudo">(*)</span></label>
                                    <input type="email" class="form-control" name="email" style="width:100%" value="{!! $cate['email'] !!}" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Tên đăng nhập <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="username" style="width:100%" value="{!! $cate['username'] !!}" >
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu <span class = "maudo">(*)</span></label>
                                    <input type="password" class="form-control" name="password" style="width:100%" >
                                    <div class="error" id="password_error"></div>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding: 0px">
                                <div class="form-group">
                                    <label>Quyền<span class = "maudo">(*)</span></label>
                                    <select name="role" class="form-control">
                                        <option value = "">[--Chọn danh mục--]</option>
                                        @if($cate['lever'] == 1)
                                        <option selected="selected" value="1">Admin</option>
                                        <option value="2">Member</option>
                                        @else
                                        <option value="1">Admin</option>
                                        <option selected="selected" value="2">Member</option>
                                        @endif
                                    </select>
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <img style="height: 70px;width: 70px" src="{!! url('resources/upload/useradmin/')!!}/{!! $cate['avatar'] !!}" alt="" class="img-responsive">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input type="file"  id="image_list" name="image" style="width: 100%">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value = "">[--Chọn danh mục--]</option>
                                        @if($cate['decentralization'] == 1)
                                        <option selected="selected" value="1">Kích hoạt</option>
                                        <option value="0">Chưa kích hoạt</option>
                                        @else
                                        <option value="1">Kích hoạt</option>
                                        <option selected="selected" value="0">Chưa kích hoạt</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </form>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection