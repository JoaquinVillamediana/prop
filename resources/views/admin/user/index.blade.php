@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Usuarios</a>
            </li>
            <li class="breadcrumb-item active">Lista de Usuarios</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Usuarios
            
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>                                
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Tipo</th>
                                <th>Creado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(!empty($aUsers))
                            @foreach($aUsers as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>Nombre</td>
                                <td>Email</td>
                                <td>Telefono</td>
                                       
                                    <td>Usuario</td>
                                
                                <td>{{ $user->created_at }}</td>
                                <td><a class="btn btn-primary btn-circle" href=""><i class="fa fa-list"></i></a></td>
                                <td>
                                    <form id="deleteForm_{{$user->id}}" action="" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" id="submiBtn" class="btn btn-warning btn-circle my-custom-confirmation" data-toggle="modal" onclick="openDelModal({{$user->id}});"><i class="fa fa-times"></i></button>
                                    </form>                
                                </td>
                            </tr>   
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
 
 

</div>

<script type="text/javascript">

    function openDelModal(id) {
        formId = id;
        $('#deleteModal').modal('show');
    }

</script>

<script src="/assets/js/admin/user/datatables.js" crossorigin="anonymous"></script>
@include('frontend/layouts.footer')


@endsection