@extends('admin.template.layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Usuario</div>
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
					
					{!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}
						<div class="form-group">							
							{!! Form::label('name', 'Nombre') !!}
							{!! Form::text('name', $user->name, ['class' => 'form-control']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('email', 'Email') !!}
							{!! Form::text('email', $user->email, ['class' => 'form-control']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('role', 'Rol') !!}
							{!! Form::select('role', [
								'' => 'Seleccionar',
								'user' => 'User',
								'editor' => 'Editor',
								'admin' => 'Admin'], $user->role,['class' => 'form-control']) !!}							
						</div>
						
						{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection