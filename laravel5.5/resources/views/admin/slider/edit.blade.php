@extends('admin.layout')
@section('content')
<div class="content-wrapper" style="min-height: 454px;">
    <form action="{!! route('admin.slider.getEdit',$cate['id']) !!}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <section class="content-header">
            <h1><i class="glyphicon glyphicon-picture"></i> Thêm Sliders</h1>
            <div class="breadcrumb">
                <button name="THEM_NEW" type="submit" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-floppy-save"></span> Lưu[Thêm]
                </button>
                <a class="btn btn-primary btn-sm" href="{{route('admin.slider.index')}}" role="button">
                    <span class="glyphicon glyphicon-remove"></span> Thoát
                </a>
            </div>
        </section>
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
          <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box" style="max-width: 550px; margin: auto;">
                    
                        <div class="box-body">
                            <!--ND-->
                            <div class="form-group">
                                <label>Tên sliders<span class = "maudo">(*)</span></label>
                                <input type="text" name="name" placeholder="Tên sliders" class="form-control" value="{!! $cate['fullname'] !!}">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Liên kết <span class = "maudo">(*)</span></label>
                                <input type="text" name="link" class="form-control" placeholder="http://link.com" value="{!! $cate['lienket'] !!}">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <img style="height: 70px;width: 70px" src="{!! url('resources/upload/sliser/')!!}/{!! $cate['image'] !!}" alt="" class="img-responsive">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh <span class = "maudo">(*)</span></label>
                                <input type="file" name="img" class="form-control" >
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Quyền truy cập</label>
                                <select name="access" class="form-control" style="width:300px">
                                    <option value = "">[--Chọn danh mục--]</option>
                                        @if($cate['lever'] == 1)
                                        <option selected="selected" value="1">Công khai</option>
                                        <option value="0">Hạn chế</option>
                                        @else
                                        <option value="1">Công khai</option>
                                        <option selected="selected" value="0">Hạn chế</option>
                                        @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control" style="width:300px">
                                    <option value = "">[--Chọn danh mục--]</option>
                                        @if($cate['statut'] == 1)
                                        <option selected="selected" value="1">Xuất bản</option>
                                        <option value="0">Chưa xuất bản</option>
                                        @else
                                        <option value="1">Xuất bản</option>
                                        <option selected="selected" value="0">Chưa xuất bản</option>
                                        @endif
                                </select>
                            </div>
                            <!--/.ND-->
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </form>         
</div>
@endsection