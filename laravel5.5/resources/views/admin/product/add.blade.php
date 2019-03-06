@extends('admin.layout')
@section('content')
<div class="content-wrapper">
	<form action="{!! route('admin.product.getAdd') !!}" enctype="multipart/form-data" method="POST" accept-charset="utf-8"> 
		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-cd"></i> Thêm sản phẩm mới</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Thêm]
				</button>
				<a class="btn btn-primary btn-sm" href="{{route('admin.product.index')}}" role="button">
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
							<div class="col-md-9">
							<?php //echo validation_errors(); ?>
								<div class="form-group">
									<label>Tên sản phẩm <span class = "maudo">(*)</span></label>
									<input type="text" class="form-control" name="name" style="width:100%" placeholder="Tên sản phẩm" value="{!! old('name') !!}">
									<div class="error" id="password_error"></div>
								</div>
								<div class="form-group">
									<label>Loại sản phẩm<span class = "maudo">(*)</span></label>
									<select name="catid" class="form-control" style="width:300px">
										<option value = "">[--Chọn loại sản phẩm--]</option>
										<?php cate_parent($data,0,"--",old('catid')); ?>
									</select>
									<div class="error" id="password_error"></div>
								</div>
								<div class="form-group">
									<label>Nhà cung cấp <span class = "maudo">(*)</span></label>
									<select name="producer" class="form-control" style="width:300px">
										<option value = "">[--Chọn nhà cung cấp--]</option>
											
									</select>
									<div class="error" id="password_error"></div>
								</div>
								<div class="form-group">
									<label>Mô tả ngắn</label>
									<textarea name="sortDesc" class="form-control" value="">{!! old('sortDesc') !!}</textarea>
								</div>
								<div class="form-group">
									<label>Chi tiết sản phẩm</label>
									<textarea name="detail" id="detail" class="form-control" >{!! old('detail') !!}</textarea>
      								<script>CKEDITOR.replace('detail');</script>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Giá gốc</label>
									<input name="price_root" class="form-control" type="number" value="{!! old('price_root') !!}" min="0" step="1" max="1000000000" >
								</div>
								<div class="form-group">
									<label>Khuyến mãi (%)</label>
									<input name="sale_of" class="form-control" type="number" value="{!! old('sale_of') !!}">
								</div>
								<div class="form-group">
									<label>Giá bán</label>
									<input name="price_buy" class="form-control" type="number" value="{!! old('price_buy') !!}" min="0" step="1" max="1000000000">
									<div class="error" id="password_error"></div>
								</div>
								<div class="form-group">
									<label>Số lượng</label>
									<input name="number" class="form-control" type="number" value="{!! old('number') !!}" min="1" step="1" max="1000">
								</div>
								<div class="form-group">
                                    <label>Hình đại diện</label>
                                    <input type="file"  id="image_list" name="img" value="{!! old('img') !!}"  style="width: 100%">
                                </div>
								<div class="form-group">
									<label>Hình ảnh sản phẩm</label>
									<input type="file"  id="image_list" name="image_list[]" multiple >
								</div>
								<div class="form-group">
									<label>Quyền truy cập</label>
									<select name="access" value="{!! old('access') !!}" class="form-control">
										<option value="1">Công khai</option>
										<option value="0">Hạn chế</option>
									</select>
								</div>
								<div class="form-group">
									<label>Trạng thái</label>
									<select name="status" class="form-control">
										<option value="1">Xuất bản</option>
										<option value="0">Chưa xuất bản</option>
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
@endsection()