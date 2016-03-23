@extends('admin.template.layout')

@section('content')
 	<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Panel de Administración <small>Usuarios registrados</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> Editar usuario
                </li>
            </ol>
        </div>
    </div>

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
					
					@include('flash::message')
					{!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}
						<div class="form-group">							
							{!! Form::label('name', 'Nombre') !!}
							{!! Form::text('name', $user->name, ['class' => 'form-control', 'readonly']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('email', 'Email') !!}
							{!! Form::text('email', $user->email, ['class' => 'form-control', 'readonly']) !!}							
						</div>
						<div class="form-group">							
							{!! Form::label('role', 'Rol') !!}
							{!! Form::select('role', [
								'' => 'Seleccionar',
								'user' => 'User',
								'editor' => 'Editor',
								'admin' => 'Admin'], $user->role,['class' => 'form-control', 'autofocus']) !!}							
						</div>
						
						{!! Form::submit('Editar', ['class' => 'btn btn-warning']) !!}
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection