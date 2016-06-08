@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<script type="text/javascript">
			setTimeout(function() {
		        $("#errmsg").fadeOut('slow');
		    }, 4000);		
		    setTimeout(function() {
		        $("#successmsg").fadeOut('slow');
		    }, 4000);	
		</script>
		<?php if(Session::has('errmsg')){ ?>
		<div class="col-md-12" id="errmsg">
			<div class="alert alert-danger">
			  <strong>Danger!</strong> 
			  
			  {{ Session::get('errmsg') }}
			  
			</div>
		</div>
		<?php } ?>
		<?php if(Session::has('success')){ ?>
		<div class="col-md-12" id="successmsg">
			<div class="alert alert-success">
			  <strong>Success!</strong> 
			  
			  {{ Session::get('success') }}
			  
			</div>
		</div>
		<?php } ?>
		<div class="col-md-12 col-md-offset-1">
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/addpost') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-md-8">
					<div class="form-group">
					<input class="w3-input" name="title" type="text" style="width:100%" placeholder="Post title here...">
					</div>
					<div class="form-group">
					<textarea class="w3-input" name="desc" rows="1" type="text" style="width:100%" placeholder="Post Description here..."></textarea>
					</div>
				</div>
				<div class="col-md-4">
				<br>
					<button class="w3-btn w3-green w3-circle" style="width:25%">+ Add<br> Post</button>
				</div>
			</form>
		</div>
		<div class="col-md-12">&nbsp;<br></div>
		@forelse($post as $p)
		<div class="col-md-6" style="margin-bottom:5%">
			<div class="w3-card-12" style="width:70%">

			<header class="w3-container w3-light-grey">
			  <div class="col-md-8" style="float:left"><h3>{{$p->title}}</h3></div>
			  <div class="col-md-4">
			  <div class="col-md-12">&nbsp;</div>
			  <div class="col-md-1" style="float:right">
			  	<a  href="{{url('delete')}}/{{$p->id}}"><span class="glyphicon glyphicon-trash"></span></a>
			  	</div>
				<div class="col-md-1" style="float:right">			  	
			  	<a href="{{url('edit')}}/{{$p->id}}"><span class="glyphicon glyphicon-edit"></span></a>
			  </div>
			  </div>
			</header>

			<div class="w3-container">
			  <p><span class="glyphicon glyphicon-flag"></span> by {{$p->name}}</p>
			  <hr>
			  <p>{{$p->desc}}</p><br>
			  <small>{{$p->time}}, {{$p->datetime}}</small>
			</div>

			</div>
		</div>
		@empty
		<center><div class="col-md-12" style="margin-bottom:5%">
		<div class="alert alert-warning">
		  <strong>Ooops!</strong> There is no post you have submitted.
		</div>
		</div></center>
		@endforelse
	</div>
</div>
@endsection
