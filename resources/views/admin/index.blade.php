@extends('admin.template.layout')

@section('title') Panel de Administración | Auth System @stop

@section('content')

	<!-- .table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <tr>
                <th>#</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Email</th>  
                <th class="text-center">Role</th>  
                <th class="text-center">Acción</th>
            </tr>            
            @foreach ($users as $item)
            <tr>
                <td>{{ $contador += 1 }}</td>
                <td class="text-center">{{ $item->name }}</td>
                <td class="text-center">{{ $item->email }}</td>
                <td class="text-center">
                    @if($item->role == 'user')
                        <span class="label label-primary">{{ $item->role }}</span>
                    @elseif($item->role == 'editor')
                        <span class="label label-warning">{{ $item->role }}</span>
                    @else
                        <span class="label label-success">{{ $item->role }}</span>
                    @endif
                </td>
                <td class="text-center">                                                               
                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit fa-fw"></i> Editar</a>                     
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.table -->

@endsection