@extends('layouts.app')

@section('content')

<div class="content-wrapper" style="margin-left:80px;">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Tipos de características generales</a>
            </li>
            <li class="breadcrumb-item active">Lista de tipos de características generales</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Crear tipo de características generales
            
            </div>         
            <div class="card-body">
                
            <div class="input-group mb-3">
            
             
                <form action="{{ route('caracteristicas_gen_store') }}">
                <div class="row">
                <h3>Nombre</h3>
                <input id="name" name="name" type="text" class="form-control ml-4" aria-label="Text input with dropdown button"> 
                </div>
              
                <button type="submit" class="btn btn-outline-primary">Crear</button>
                </form>
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