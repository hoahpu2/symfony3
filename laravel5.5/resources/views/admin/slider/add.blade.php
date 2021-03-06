@extends('admin.layout')
@section('content')
<div class="content-wrapper" style="min-height: 454px;">
    <form action="{!! route('admin.slider.getAdd') !!}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
          <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box" style="max-width: 550px; margin: auto;">
                    
                        <div class="box-body">
                            <!--ND-->
                            <div class="form-group">
                                <label>Tên sliders<span class = "maudo">(*)</span></label>
                                <input type="text" name="name" placeholder="Tên sliders" class="form-control">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Liên kết <span class = "maudo">(*)</span></label>
                                <input type="text" name="link" class="form-control" placeholder="http://link.com">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh <span class = "maudo">(*)</span></label>
                                <input type="file" name="img" class="form-control" required="">
                                <div class="error" id="password_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Quyền truy cập</label>
                                <select name="access" class="form-control" style="max-width:30%">
                                    <option value="1">Công khai</option>
                                    <option value="0">Hạn chế</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái </label>
                                <select name="status" class="form-control" style="max-width:30%">
                                    <option value="1">Xuất bản</option>
                                    <option value="0">Chưa xuất bản</option>
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