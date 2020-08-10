@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Propiedades</a>
            </li>
            <li class="breadcrumb-item active">Lista de Propiedades</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Propiedades
            
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th> 
                                <th>Usuario</th>                                
                                <th>Operación</th>
                                <th>Tipo de propiedad</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Ambientes</th>
                                <th>Dormitorios</th>
                                <th>Baños</th>
                                <th>Tamaño</th>
                                <th>Localidad</th>
                                <th>Visible</th>
                                <th>Visible_at</th>
                                <th>Creado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(!empty($aProp))
                            @foreach($aProp as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $user->operation_type_name }}</td>
                                <td>{{ $user->propietie_type_name }}</td>
                                <td>{{ $user->description }}</td>
                                <td>{{ $user->price }}</td>
                                <td>{{ $user->rooms }}</td>
                                <td>{{ $user->bedrooms }}</td>
                                <td>{{ $user->bathrooms }}</td>
                                <td>{{ $user->size }}</td>
                                <td>{{ $user->localidad }}</td>
                                @if( $user->visible == 1)
                                <td>{{ "Visible" }}</td>
                                @else
                                <td>{{ "No Visible" }}</td>
                                @endif
                                <td>{{ $user->visible_at }}</td>
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



@endsection