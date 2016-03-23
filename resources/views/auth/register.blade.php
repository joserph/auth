@extends('template.layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registrar</div>
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
					{!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
						<div class="form-group">							
							{!! Form::label('name', 'Nombre') !!}
							{!! Form::text('name', Input::old('name'), ['class' => 'form-control', 'autofocus']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('email', 'Email') !!}
							{!! Form::text('email', Input::old('email'), ['class' => 'form-control']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('password', 'Contraseña') !!}
							{!! Form::password('password', ['class' => 'form-control']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('password_confirmation', 'Confirmar Contraseña') !!}
							{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}							
						</div>
						
						{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection