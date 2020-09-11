<link rel="stylesheet" href="/css/frontend/footer.css">
<!-- footer -->

<footer id="footer" class="pb-4 pt-4">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-2 col-12 col-option">
                <img class="logo" src="/images/Logo_reducido_png.png" alt="TuProximaProp">
            </div>
            <div class="col-md-2 col-12 col-option">
                <h5>Opciones</h5>
                <a class="d-block link" href="{{ route('publish') }}"> Vender </a>
                <a class="d-block link" href="{{ route('publish') }}"> Alquilar </a>
            </div>
            <div class="col-md-3 col-12 col-option">
                <h5>Ayuda</h5>
                
                <a class="d-block link" href="{{ route('terminos_y_condiciones_de_uso') }}">Términos y Condiciones de Uso</a>
                <a class="d-block link" href="{{ route('terminos_y_condiciones_de_contrato') }}">Términos y Condiciones de Contratación</a>
                <a class="d-block link" href="{{ route('politica_de_privacidad') }}">Política de privacidad</a>
                <a class="d-block link" href="{{ route('politica_de_gestion_de_calidad') }}">Política de Gestión de Calidad</a>
            </div>
            <div class="col-md-2 col-12 col-option">
                <h5>Contacto</h5>
                <a class="link" href="{{ route('contact') }}"> Contactanos </a>
                <a class="d-block link" href="{{ route('frecuent_questions') }}"> Preguntas frecuentes </a>
                <a href="https://wbosoftware.com/" class="link">W.B.O. Software </a>
            </div>
            <div class="col-md-3 col-12 col-option">
                <h5>Redes Sociales</h5>
                <div class="row">
                    <div class="col-4  col-media-links">
                        <div class="media-circle">
                        <a class="media-link" href="https://www.facebook.com/Tupr%C3%B3ximaprop-100986391747322"><i
                            class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-4 col-media-links">
                        <div class="media-circle">
                        <a class="media-link" href="https://www.instagram.com/tuproximaprop/"><i
                            class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-4 col-media-links">
                        <div class="media-circle">
                        <a class="media-link" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-lg">
                <div class="row">
                    <a href="{{ route('publish') }}"> Vender </a>
                </div>
                <div class="row">
                    <a href="{{ route('publish') }}"> Alquilar </a>
                </div>

                <div class="row">
                    <a href="{{ route('help') }}"> Ayuda </a>
                </div>
                <div class="row">
                    <a href="{{ route('publish_questions') }}"> Publicidad </a>
                </div>
                <div class="row">
                    <a href="https://wbosoftware.com/"> Noticias </a>
                </div>
            </div>
            <div class="col-12 col-lg">
                <a href="{{ route('contact') }}"> Contactanos </a>
            </div>
            <div class="col-12 col-lg">
                <a href="{{ route('frecuent_questions') }}"> Preguntas frecuentes </a>


            </div>
            <div class="col-12 col-lg">

                <a href="https://wbosoftware.com/" style="text-decoration: none;"> Conocé más sobre W.B.O. Software </a>
            </div>
            <div class="col-12 col-lg">
                <a class="media-link" href="https://www.facebook.com/Tupr%C3%B3ximaprop-100986391747322"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="media-link" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                <a class="media-link" href="https://www.instagram.com/tuproximaprop/"><i
                        class="fab fa-instagram"></i></a>
                <a class="media-link" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>


            </div> --}}
        </div>
        </br>
        {{-- <a href="{{ route('terminos_y_condiciones_de_uso') }}">Términos y Condiciones de Uso - </a><a
            href="{{ route('terminos_y_condiciones_de_contrato') }}">Términos y Condiciones de Contratación - </a><a
            href="{{ route('politica_de_privacidad') }}">Política de privacidad - </a><a
            href="{{ route('politica_de_gestion_de_calidad') }}">Política de Gestión de Calidad</a> --}}
        <p class="logo-text">W.B.O. Software - © 2020. Todos los derechos reservados</p>
    </div>
</footer>

<!-- endfooter -->