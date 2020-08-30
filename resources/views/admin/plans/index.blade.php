@extends('layouts.app')

@section('content')

<div class="content-wrapper" style="margin-left:80px;">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Planes</a>
            </li>
            <li class="breadcrumb-item active">Lista de Planes Disponibles</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Planes
                <a class="btn btn-outline-primary ml-4" href="{{ route('propieties_type') }}" role="button">Crear</a>
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>                                
                                <th>Descripcion 1</th>
                                <th>Descripcion 2</th>
                                <th>Descripcion 3</th>
                                <th>Precio</th>
                                <th>Tipo de usuario</th>
                                <th>Cantidad de anuncios</th>
                                <th>Tiempo</th>
                                <th>Visible</th>
                                <th>Visible_at</th>
                                <th>Creado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(!empty($aPlans))
                            @foreach($aPlans as $planes)
                            <tr>
                                <td>{{ $planes->id }}</td>
                                <td>{{ $planes->name }}</td>
                                <td>{{ $planes->description1 }}</td>
                                <td>{{ $planes->description2 }}</td>
                                <td>{{ $planes->description3 }}</td>
                                <td>{{ $planes->price }}</td>
                                    @if($planes->user_type == 2)   
                                    <td>Propietario</td>
                                @else
                                <td>Profesional</td>
                                @endif
                                <td>{{ $planes->num_add }}</td>
                                <td>{{ $planes->time }}</td>
                                <td>{{ $planes->visible }}</td>
                                <td>{{ $planes->visible_at }}</td>

                                <td>{{ $planes->created_at }}</td>
                                <td><a class="btn btn-primary btn-circle" href=""><i class="fa fa-list"></i></a></td>
                                <td>
                                    <form id="deleteForm_{{$planes->id}}" action="" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" id="submiBtn" class="btn btn-warning btn-circle my-custom-confirmation" data-toggle="modal" onclick="openDelModal({{$planes->id}});"><i class="fa fa-times"></i></button>
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