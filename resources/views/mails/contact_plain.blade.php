Hola {{ $oContactDetails->receiver }}!,
Estas recibiendo este mensaje porque se interesaron en tu propiedad "{{$oContactDetails->PropertyName }}" a tarves de la plataforma TuProximaProp.
 
a continuaci&oacute;n los detalles:
Nombre: {{$oContactDetails->ContactName }}
Email: {{$oContactDetails->ContactEmail }}
@if (!empty($oContactDetails->ContactNumber))
Tel&eacute;fono: {{$oContactDetails->ContactNumber }}
@endif
Mensaje: {{$oContactDetails->ContactMessage }}


Gracias por confiar en nosotros,

{{ $oContactDetails->sender }}