@extends('layouts.app')

@section('content')

<div class="content-wrapper" style="margin-left:80px;">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Editar de Ambientes</a>
            </li>
            <li class="breadcrumb-item active">Editor de ambientes</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Editar ambiente
            
            </div>         
            <div class="card-body">
                
            <div class="input-group mb-3">
            
            @if(!empty($oAmbientes))
                @foreach($oAmbientes as $ambientes)
                <form action="{{ route('ambientes_store') }}">
                <div class="row">
                <h3>Nombre</h3>
              
                <input id="name" name="name" type="text" class="form-control ml-4" aria-label="Text input with dropdown button" placeholder=" {{ $ambientes->name }} "> 
               
                </div>
             
                <button type="submit" class="btn btn-outline-primary">Crear</button>
                </form>
                @endforeach
                @endif
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