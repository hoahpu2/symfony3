@extends('admin.layout')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-cd"></i> Danh mục loại sản phẩm</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="{{route('admin.cate.getAdd')}}" role="button">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới
			</a>
			<a class="btn btn-primary btn-sm" href="admin/category/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác 
			</a>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="box-header with-border">
						<!-- Search Limit -->
						<section class="content-search">
							<div class="form-inline">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Tìm kiếm</span>
									<input type="text" name="search" onkeypress="" id="search" class="form-control">
									<span class="input-group-addon"><i onclick="" class="glyphicon glyphicon-search"></i></span>
								</div>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Hiển thị</span>
									<select name="limit" id="limit" class="form-control">
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
										<option value="40">40</option>
										<option value="50">50</option>
										<option value="100">100</option>
										<option value="all">Tất cả</option>
									</select>
								</div>
							</div>
						</section>
						
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						@include('admin.massage')
						<!-- <div class="row">
							<div class="alert alert-error">

								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
						</div> -->

						<div class="row" style='padding:0px; margin:0px;'>
							<!--ND-->
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class='text-center' style='width:10px;'><input name='checkAll' id='checkAll' type='checkbox'/></th>
											<th class="text-center" style="width:50px">STT</th>
											<th class="text-center" style="width:50px">ID</th>
											<th class="text-center">Tên loại sản phẩm</th>
											<th class="text-center">Chủ đề cha</th>
											<th class="text-center">Chú Thích</th>
											<th class="text-center" style="width:90px">Trạng thái</th>
											<th class="text-center" style="width:50px">Sửa</th>
											<th class="text-center" style="width:50px">Xóa</th>
										</tr>
									</thead>
									<tbody>
									<?php $stt=1 ?>
									@foreach($data as $value)
										<tr>
											<td class="text-center" style="width:20px"><input name="checkboxid[]" type="checkbox" value=""></td>
											<td class="text-center">{!! $stt++ !!}</td>
											<td class="text-center">{!! $value['id'] !!}</td>
											<td>
												<a href="">
													{!! $value['name'] !!}
												</a>	
											</td>
											<td class="text-center">
												@if($value['parent_id'] == 0)
													{!! "No Parent" !!}
												@else
													<?php 
														$parent = DB::table('cates')->where('id',$value['parent_id'])->get()->toArray();
														foreach ($parent as $value1) {
															echo $value1->name;
														}
													?>	
												@endif
											</td>
											<td class="text-center">
												{!! $value['description'] !!}
											</td>
											<td class="text-center">
												<a href="">
													@if($value['statut'] == 1)
														<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													@else
														<span class="glyphicon glyphicon-remove-circle maudo"></span>
													@endif
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="{!! route('admin.cate.getEdit',$value['id']) !!}" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Sửa
												</a>
											</td>
											<td class="text-center">
												<a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?');" class="btn btn-danger btn-xs" href="{!! route('admin.cate.getDelete',$value['id']) !!}" role = "button">
													<span class="glyphicon glyphicon-trash"></span>Xóa
												</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<ul class="pagination">
										
									</ul>
								</div>
							</div>
							<!-- /.ND -->
						</div>
					</div><!-- ./box-body -->
				</div><!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection()