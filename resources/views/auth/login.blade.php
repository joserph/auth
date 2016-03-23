@extends('template.layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="text-info">
						@if(Session::has('message'))
							{{ Session::get('message') }}
						@endif
					</div>
					{!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
						<div class="form-group">							
							{!! Form::label('email', 'Email') !!}
							{!! Form::text('email', Input::old('email'), ['class' => 'form-control', 'autofocus']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('password', 'Password') !!}
							{!! Form::password('password', ['class' => 'form-control']) !!}							
						</div>
						<div class="checkbox">
							<label for="remember">
								<input type="checkbox" name="remember" id="remember"> Recuérdame 
							</label>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
								<a href="/password/email">Forgot Your Password?</a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection