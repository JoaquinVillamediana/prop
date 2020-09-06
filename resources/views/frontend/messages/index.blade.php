@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

<link rel="stylesheet" href="/css/frontend/messages.css">



<div class="container">
<h3 class=" text-center">Mensajes</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Chat recientes</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            
            <!--  -->
            @if(!empty($aChats))
            @foreach($aChats as $chats)
            @if ($chats->user_from_id != Auth::user()->id)
            
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="/images/profile_pictures_users/{{ $chats->user_image}}" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>{{ $chats->nombre_usuario}} <span class="chat_date">{{ $chats->created_at}}</span></h5>
                  <p>{{ $chats->message}}</p>
                </div>
              </div>
            </div>
          
            @endif
            @endforeach
            @endif
            <!--  -->
          
            
    
              
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">

          @if(!empty($aChats))
          @foreach($aChats as $mensjaes)
          @if($mensjaes->user_from_id != Auth::user()->id)
         <!-- los mensjaes que me llegan -->
         <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="/images/profile_pictures_users/{{ $mensjaes->user_image}}" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{ $mensjaes->message}}</p>
                  <span class="time_date"> {{ $mensjaes->created_at}}</span></div>
              </div>
            </div>
            <!--   fin de los mensjes que me llegan-->
@else
             <!-- mensjaes que mando -->
             <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{ $mensjaes->message}}</p>
                <span class="time_date">{{ $mensjaes->created_at}}</span> </div>
            </div>
            <!-- fin de los mensjas que mando -->
@endif
          @endforeach
          @endif
            
        
      



     
          </div>
           <!-- fin de espacio para mensjaes -->
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Escribe un mensaje.." />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      
    </div></div>

@include('frontend/layouts.footer')


@endsection