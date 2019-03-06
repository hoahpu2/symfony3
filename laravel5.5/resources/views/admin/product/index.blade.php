@extends('admin.layout')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-cd"></i> Danh sách sản phẩm</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="{{route('admin.product.getAdd')}}" role="button">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới
			</a>
			<a class="btn btn-primary btn-sm" href="<?php //echo base_url()?>admin/product/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác
			</a>
		</div>
	</section>
	<!-- Main content -->
	<?php 
		//if (Auth::check()) {
			//echo "<pre>";
            //$hoa = Auth::user();
            //print_r($hoa);
    		//Session::put('hoalogin',$hoa['fullname']);

    		//echo Session::get('hoalogin');
    	//}
	//echo Session::get('hoalogin');
        //die;
	 ?>
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
											<th class='text	-center' style='width:10px;'><input name='checkAll' id='checkAll' type='checkbox'/></th>
											<th class="text-center" style="width:20px">ID</th>
											<th>Hình</th>
											<th>Tên sản phẩm</th>
											<th>Giá SP</th>
											<th style="width:150px">Danh mục sản phẩm</th>
											<th style="width:80px">Người tạo</th>
											<th style="width:100px">Ngày đăng</th>
											<th style="width:100px">Cập nhật</th>
											<th class="text-center" style="width:90px">Trạng thái</th>
											<th class="text-center" style="width:90px">Nhập hàng</th>
											<!-- <th class="text-center" style="width:90px">Bình luận</th> -->
											<th class="text-center" style="width:50px">Sửa</th>
											<th class="text-center" style="width:50px">Xóa</th>
										</tr>
									</thead>
									<tbody>
									@foreach($data as $value)
										<tr>
											<td class="text-center" style="width:20px"><input name="checkboxid[]" type="checkbox" value="$id"></td>
											<td class="text-center">{!! $value['id'] !!}</td>
											<td style="width:50px">
												<img src="{!! url('resources/upload/product/')!!}/{!! $value['image'] !!}" alt="" class="img-responsive">
											</td>
											<td><a href="admin/product/update/">{!! $value['name'] !!}</a></td>
											<td class="text-center">{!! number_format($value['price'],3) !!}</td>
											<td><?php $data = DB::table('cates')->where('id',$value['cat_id'])->get()->toArray() ?>
												@foreach($data as $value1)
													{!! $value1->name !!}
												@endforeach
											</td>
											<td><?php $data = DB::table('users')->where('id',$value['use_id'])->get()->toArray() ?>
												@foreach($data as $value2)
													{!! $value2->fullname !!}
												@endforeach
											</td>
											<td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($value['created_at']))->diffForHumans() !!}</td>
											<td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($value['updated_at']))->diffForHumans() !!}</td>
											<td class="text-center">
												<a href="<?php //echo base_url() ?>admin/product/status/">
													@if($value['statut'] == 1)
														<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													@else
														<span class="glyphicon glyphicon-remove-circle maudo"></span>
													@endif
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="<?php //echo base_url() ?>admin/product/import/<?php //echo $val['id']?>" role = "button">
													<span class="fa fa-cloud-upload"></span> Nhập hàng
												</a>
											</td>
											
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="{!! route('admin.product.getEdit',$value['id']) !!}" role = "button">
													<span class="glyphicon glyphicon-edit"></span> Sửa
												</a>
											</td>
											<td class="text-center">
												<a onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa?');" class="btn btn-danger btn-xs" href="{!! route('admin.product.getDelete',$value['id']) !!}" role = "button">
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
@endsection()