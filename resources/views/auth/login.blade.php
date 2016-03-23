@extends('template.layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Iniciar sesión</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  								<span aria-hidden="true">&times;</span>
							</button>
							<strong><i class="fa fa-exclamation-triangle fa-fw"></i></strong> Por favor corrige los siguentes errores:<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					@include('flash::message')
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
								{!! Form::submit('Iniciar sesión', ['class' => 'btn btn-primary']) !!}
								<a href="/password/email">¿Olvidaste tu contraseña?</a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection