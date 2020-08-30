@extends('layouts.app')

@section('content')

<div class="content-wrapper" style="margin-left:80px;">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Localidades</a>
            </li>
            <li class="breadcrumb-item active">Lista de Localidades</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Localidades argentinas
                <a class="btn btn-outline-primary ml-4" href="{{ route('operation_type_create') }}" role="button">Crear</a>
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>provincia_nombre</th>
                                <th>Categoria</th>
                                <th>centroide_lat</th>                                
                                <th>centroide_lon</th>
                                <th>departamento_id</th>
                                <th>departamento_nombre</th>
                                <th>fuente</th>
                              
                                <th>localidad_censal_id</th>
                                <th>localidad_censal_nombre</th>
                                <th>municipio_id</th>
                                <th>municipio_nombre</th>
                               
                                <th>provincia_id</th>
                               
                                <th>Creado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(!empty($aLocalidades))
                            @foreach($aLocalidades as $op_type)
                            <tr>
                            <td>{{ $op_type->id }}</td>

                            <td>{{ $op_type->nombre }}</td>
                            <td>{{ $op_type->provincia_nombre }}</td>
                                <td>{{ $op_type->categoria }}</td>
                                <td>{{ $op_type->centroide_lat }}</td>
                                <td>{{ $op_type->centroide_lon }}</td>
                                <td>{{ $op_type->departamento_id }}</td>
                                <td>{{ $op_type->departamento_nombre }}</td>
                                <td>{{ $op_type->fuente }}</td>
                                
                                <td>{{ $op_type->localidad_censal_id }}</td>
                                <td>{{ $op_type->localidad_censal_nombre }}</td>
                                <td>{{ $op_type->municipio_id }}</td>
                                <td>{{ $op_type->municipio_nombre }}</td>
                                
                                <td>{{ $op_type->provincia_id }}</td>
                                

                                
                                <td>{{ $op_type->created_at }}</td>
                                <td><a class="btn btn-primary btn-circle" href=""><i class="fa fa-list"></i></a></td>
                                <td>
                                    <form id="deleteForm_{{$op_type->id}}" action="" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" id="submiBtn" class="btn btn-warning btn-circle my-custom-confirmation" data-toggle="modal" onclick="openDelModal({{$op_type->id}});"><i class="fa fa-times"></i></button>
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



@endsection