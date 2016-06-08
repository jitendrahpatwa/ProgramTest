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
			<?php
			$title = $idd = $desc = "";
				foreach ($post as $key) {
					$title = $key->title;
					$idd = md5($key->id);
					$desc = $key->desc;
				}
			?>
			<h2>Post is: {{$title}} <small>post id is: {{$idd}} </small></h2>
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/edit') }}/{{$id}}/update">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="col-md-8 form-group">
						Title
						<input class="w3-input" name="title" type="text" value="{{$title}}" placeholder="Post title here...">
					</div>
					<div class="col-md-8 form-group">
						Description 
						<textarea class="w3-input" name="desc" rows="8" type="text" placeholder="Post Description here...">{{$desc}}</textarea>
					</div>
				
					<div class="col-md-12 form-group">
						<button class="w3-btn btn btn-primary w3-blue"> Update Post</button>
					</div>
				
			</form>
		</div>
		
	</div>
</div>
@endsection
