@extends('layouts.app')

@section('content')

<div class="content-wrapper" style="margin-left:80px;">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Tipos de Ambientes</a>
            </li>
            <li class="breadcrumb-item active">Lista de tipos de Ambientes</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Tipos de Ambientes
                <a class="btn btn-outline-primary ml-4" href="{{ route('ambientes_create') }}" role="button">Crear</a>
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>                                
                                
                                <th>Creado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(!empty($aAmbientes))
                            @foreach($aAmbientes as $op_type)
                            <tr>
                                <td>{{ $op_type->id }}</td>
                                <td>{{ $op_type->name }}</td>
                             
                                       
                               
                                <td>{{ $op_type->created_at }}</td>
                                <td><a class="btn btn-primary btn-circle" href="{{ route('ambientes_edit',$op_type->id) }}"><i class="fa fa-list"></i></a></td>
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