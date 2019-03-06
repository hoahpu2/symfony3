@extends('admin.layout')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-cd"></i> Danh sách tài khoản</h1>
		<div class="breadcrumb">
			<a class='btn btn-primary btn-sm' href='{!! route("admin.user.getAdd") !!}' role='button'>
				<span class='fa fa-user-plus'></span> Thêm mới
			</a>
			<a class="btn btn-primary btn-sm" href="admin/useradmin/recyclebin" role="button">
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
									<input type="text" name="search" onkeypress="FEnter(event);" id="search" class="form-control">
									<span class="input-group-addon"><i onclick="FChange();" class="glyphicon glyphicon-search"></i></span>
								</div>
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Hiển thị</span>
									<select name="limit" id="limit" onchange="FChange();" class="form-control">
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
						
						<!--./Search Limit -->
						<!-- <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div> -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						@include('admin.massage')
						<!-- <div class="row">
							<div class="alert alert-success">

								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
						</div>

						<div class="row">
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
											<th class="text-center" style="width:20px">ID</th>
											<th>Avatar</th>
											<th>Họ và tên</th>
											<th>Email</th>
											<th>UserName</th>
											<th>Quyền</th>
											<th class="text-center" style="width:90px">Trạng thái</th>
											<th class="text-center" style="width:50px">Sửa</th>
											<th class="text-center" style="width:50px">Xóa</th>
										</tr>
									</thead>
									<tbody>
									@foreach($data as $value)
										<tr>
											<td class="text-center" style="width:20px"><input name="checkboxid[]" type="checkbox" value="$id"></td>
											<td class="text-center">{!! $value['id'] !!}</td>
											<td>
												<img style="height: 70px;width: 70px" src="{!! url('resources/upload/useradmin/')!!}/{!! $value['avatar'] !!}" alt="" class="img-responsive">
											</td>
											<td>{!! $value['fullname'] !!}</td>
											<td>{!! $value['email'] !!}</td>
											<td>{!! $value['username'] !!}</td>
											<td>{!! $role = ($value['lever'] == 1) ? 'Admin' : 'Member' !!}</td>
											<td class="text-center">
												<a href="">
													@if($value['decentralization'] == 1)
													<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													@else
													<span class="glyphicon glyphicon-remove-circle maudo"></span>
													@endif
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="{!! route('admin.user.getEdit',$value['id']) !!}" role = "button">
													<span class="glyphicon glyphicon-edit"></span> Sửa
												</a>
											</td>
											<td class="text-center">
												<a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?');" class="btn btn-danger btn-xs" href="{!! route('admin.user.getDelete',$value['id']) !!}" role = "button">
													<span class="glyphicon glyphicon-trash"></span> Xóa
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
@endsection