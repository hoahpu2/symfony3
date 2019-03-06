<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="{{ url('public/admin/login/css/style.css') }}">


</head>

<body>

	<div class="wrapper">
		<div class="container">
			<h1>Welcome</h1>

			<form class="form" action="{!! route('admin.dangnhap') !!}" method="post">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" placeholder="Password" required>
				<button type="submit" name="submit">Login</button>
			</form>
		</div>

		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<script src="{{ url('public/admin/js/jquery-2.2.3.min.js') }}"></script>



	<script  src="{{ url('public/admin/login/js/index.js') }}"></script>




</body>

</html>
