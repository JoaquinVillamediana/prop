Hola <i>{{ $oContactDetails->receiver }}!</i>,
<p>Estas recibiendo este mensaje porque se interesaron en tu propiedad "{{$oContactDetails->PropertyName }}" a tarves de la plataforma TuProximaProp.</p>
 
<p>a continuaci&oacute;n los detalles:</p>
<p>Nombre: {{$oContactDetails->ContactName }}</p>
<p>Email: {{$oContactDetails->ContactEmail }}</p>
@if (!empty($oContactDetails->ContactNumber))
<p>Tel&eacute;fono: {{$oContactDetails->ContactNumber }}</p>
@endif
<p>Mensaje: {{$oContactDetails->ContactMessage }}</p>


Gracias por confiar en nosotros,
<br/>
<i>{{ $oContactDetails->sender }}</i>