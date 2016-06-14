<html>
	<head>
		<title>My Test</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
		<!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> -->

	<!-- Fonts -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('css/w3.css')}}">
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				/*color: #B0BEC5;*/
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				/*text-align: center;*/
				/*display: table-cell;
				vertical-align: middle;*/
			}

			.content {
				/*text-align: center;
				display: inline-block;*/
			}

			.title {
				font-size: 106px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
	   	<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12" style="text-align:center;">
					<div class="animated pulse col-md-12 col-xs-12"><h1><b>Programmer Test</b></h1></div>
					<div style="float:right" class="col-md-12 col-sx-12">
						<a onclick="location.assign('/auth/login');" style="cursor:pointer"><img src="http://www.tnafp.org/images/MemberLoginButton.png" style="width:50%;height:40%"></a><br><br><a onclick="location.assign('/auth/register');" style="cursor:pointer"><img src="http://atdc.org/wp-content/themes/atdc-fourteen/images/become_member.png"></a><br><h2>&</h2><br>
						<h1>Post Blog</h1>
					</div>
				</div>
				<div class="col-md-8 col-xs-12">
					<div  style="overflow: auto; overflow-x:hidden; position: relative;height: 650px;width:100%;border: 0;">
						<?php 
							$post = DB::table('post')->select('*')->orderby('created_at','desc')->get();
						?>
						@forelse($post as $p)
						<div class="col-md-4 col-xs-12" style="margin-top:5%">
						<div class="w3-container w3-leftbar w3-sand">
						  <p class="w3-xlarge w3-serif" style="width:100%">
						  <i>"{{$p->desc}}"</i></p>
						  <p><big>{{$p->title}} </big><br>{{$p->name}}</p>
						  <p><small>{{$p->time}}, {{$p->datetime}} </small></p>
						</div>
						</div>
						@empty
						<div class="col-md-4 col-xs-12">
						<div class="col-md-12" style="margin-bottom:5%">
						<div class="alert alert-warning">
						  <strong>Ooops!</strong> There is no post to see.
						</div>
						</div>
						</div>
						@endforelse
					</div>
				</div>
			</div>
	   	</div>
		<!-- <div class="container">
			<div class="content">
				
				<div class="quote"><a onclick="location.assign('/auth/login');" style="cursor:pointer"><img src="http://www.tnafp.org/images/MemberLoginButton.png" style="width:50%;height:40%"></a><br><br><a onclick="location.assign('/auth/register');" style="cursor:pointer"><img src="http://atdc.org/wp-content/themes/atdc-fourteen/images/become_member.png"></a></div>
			</div>
		</div> -->
		<script src="{{asset('jquery.min.js')}}"></script>
	<script src="{{asset('bootstrap.min.js')}}"></script>
	</body>
</html>
