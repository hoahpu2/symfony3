@extends('admin.layout')
@section('content')
<div class="content-wrapper">
	<form action="{!! route('admin.cate.getAdd') !!}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-cd"></i> Thêm danh mục mới</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Thêm]
				</button>
				<a class="btn btn-primary btn-sm" href="{!! route('admin.cate.index') !!}" role="button">
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
							<div class="form-group">
								<label>Tên danh mục <span class = "maudo">(*)</span></label>
								<input type="text" class="form-control" name="name" style="width:50%" placeholder="Tên danh mục">
								<div class="error" id="password_error"></div>
							</div>
							<div class="form-group">
								<label>Danh mục cha</label>
								<select name="parentid" id="parentid" onchange="renderDistrict()" class="form-control" style="width:50%">
									<option value = "0">[--Chọn danh mục--]</option>
									<?php cate_parent($data); ?>
								</select>
							</div>
							<div class="form-group">
								<label>Category Order<span class = "maudo">(*)</span></label>
								<input type="text" class="form-control" name="order" style="width:50%" placeholder="Tên danh mục">
								<div class="error" id="password_error"></div>
							</div>
							<div class="form-group">
								<label>Keyworld <span class = "maudo">(*)</span></label>
								<input type="text" class="form-control" name="Keyworld" style="width:50%" placeholder="Tên danh mục">
								<div class="error" id="password_error"></div>
							</div>
							<div class="form-group">
								<label>Mo ta chi tiet <span class = "maudo"></span></label><br>
								<textarea style="width:50%;height:100px" name="descript"></textarea>
								
								<div class="error" id="password_error"></div>
							</div>
							<div class="form-group">
								<label>Trạng thái</label>
								<select name="status" class="form-control" style="width:50%">
									<option value = "">[--Chọn trạng thái--]</option>
									<option value="1">Xuất bản</option>
									<option value="0">Chưa xuất bản</option>
								</select>
							</div>
						</div>
					</div><!-- /.box -->
				</div>
			<!-- /.col -->
		  <!-- /.row -->
		</section>
	</form>
<!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection()