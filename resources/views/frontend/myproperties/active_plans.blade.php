@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')



<div class="content-wrapper" style="margin-left:80px;margin-top:20px;">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Contrataciones</a>
            </li>
            <li class="breadcrumb-item active">Lista de mis contrataciones</li>       
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Contrataciones
                <a class="btn btn-outline-primary ml-4" href="{{ route('mis_propiedades.index') }}" role="button">Volver a mi panel de control</a>
            </div>         
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">                        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th> 
                                <th>F. de compra</th>                                
                                <th>Monto</th>
                                <th>Cantidad de Anuncios</th>
                                <th>Estado</th>
                                <th>F. de vencimiento</th>
                                <th>RENOVAR PAGO</th>
                            </tr>
                        </thead>
                        <?php
              $xd= now();
          ?>
                        <tbody>
                            @if(!empty($aPlans))
                            @foreach($aPlans as $user)
                            <tr>
                                <td>{{ $user->pay_id_mp }}</td>
                                <td>{{ $user->plans_name }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->plans_price }}</td>
                                <td>{{ $user->add_quantity }}</td>
                                <td>{{ $user->pay_id_mp }}</td>
                                <td>{{ $user->expiration_at }}</td>
                                @if(!empty($aExpirated))
        @foreach($aExpirated as $exp)
        @if($user->id == $exp->id)
        <td> <a class="btn btn-outline-prop" href="{{ route('pago',$exp->plan_id) }}" role="button">Renovar </a></td>

        @endif
        @endforeach
        @endif
        @if(($user->expiration_at < $xd) && $aExpirated == NULL)
        <td> <a class="btn btn-outline-prop" href="{{ route('pago',$exp->plan_id) }}" role="button">Renovar </a></td>
        
        @endif
                               
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






@endsection