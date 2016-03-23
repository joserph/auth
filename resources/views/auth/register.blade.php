@extends('template.layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
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
							{!! Form::label('password', 'Password') !!}
							{!! Form::password('password', ['class' => 'form-control']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('password_confirmation', 'Confirm Password') !!}
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