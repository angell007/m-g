@extends('layouts.galery')
@section('content')
<!DOCTYPE html>

<style>
    body {
        /* height: 100%; */
        /* max-height: 600px; */
        /* width: 1000px; */
        background-color: #9fc145;
        /* background-image:		 */
        /* url('https://cdn.pixabay.com/photo/2016/06/27/17/54/leaf-1482948_960_720.jpg'),  */
        /* url('https://cdn.pixabay.com/photo/2016/06/27/17/54/leaf-1482948_960_720.jpg'),  */
        /* url('https://cdn.pixabay.com/photo/2016/06/27/17/54/leaf-1482948_960_720.jpg'),  */
        /* url('https://78.media.tumblr.com/66445d34fe560351d474af69ef3f2fb0/tumblr_p7n908E1Jb1uy4lhuo1_1280.png'), */
        /* url('https://78.media.tumblr.com/8cd0a12b7d9d5ba2c7d26f42c25de99f/tumblr_p7n8kqHMuD1uy4lhuo2_1280.png'), */
        /* url('https://78.media.tumblr.com/5ecb41b654f4e8878f59445b948ede50/tumblr_p7n8on19cV1uy4lhuo1_1280.png'), */
        /* url('https://cdn.pixabay.com/photo/2016/06/27/17/54/leaf-1482948_960_720.jpg'); */
        background-repeat: repeat-x;
        background-position:
            0 20%,
            0 100%,
            0 50%,
            0 100%,
            0 0;
        background-size:
            2500px,
            800px,
            500px 200px,
            1000px,
            400px 260px;
        animation: 50s para infinite linear;
    }

    @keyframes para {
        100% {
            background-position:
                -5000px 20%,
                -800px 95%,
                500px 50%,
                1000px 100%,
                400px 0;
        }
    }

    .container-fluid {
        padding: 60px 50px;
    }

    .bg-grey {
        background-color: #f6f6f6;
    }

    .item h4 {
        font-size: 19px;
        line-height: 1.375em;
        font-weight: 400;
        font-style: italic;
        margin: 70px 0;
    }

    .item span {
        font-style: normal;
    }


    .slideanim {
        visibility: hidden;
    }

    .slide {
        animation-name: slide;
        -webkit-animation-name: slide;
        animation-duration: 1s;
        -webkit-animation-duration: 1s;
        visibility: visible;
    }

    @keyframes slide {
        0% {
            opacity: 0;
            -webkit-transform: translateY(70%);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateY(0%);
        }
    }

    @-webkit-keyframes slide {
        0% {
            opacity: 0;
            -webkit-transform: translateY(70%);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateY(0%);
        }
    }

    @media screen and (max-width: 768px) {
        .col-sm-4 {
            text-align: center;
            margin: 25px 0;
        }

        .btn-lg {
            width: 100%;
            margin-bottom: 35px;
        }
    }

    @media screen and (max-width: 480px) {
        .logo {
            font-size: 150px;
        }
    }
</style>


<div id="about" class="container-fluid">

    <div class="row">
        <div class="col-sm-8 text-jutify">
            <h2>Inmobiliaria M&G propiedad raiz S.A.S</h2>

            <h4>Inmobiliaria M&G Propiedad Raiz SAS es una empresa que se constituyó en el año 2017,
                M&G son las iniciales de las hijas de la señora Nohora Isabel Paternina Meza gerente y dueña de esta
                empresa,
                sus actividades se enfocan en vender y arrendar propiedades tales como Apartamentos, casas, locales
                comerciales,
                proyectos, edificio, oficinas, lotes, bodegas, fincas en el mercado competitivo,
                cuenta con agentes capacitados en el sector inmobiliario para ayudar a encontrar
                la propiedad que llene los requisitos del cliente y brindar una mejor asesoría,
                también cuenta con los servicios de avalúos, sucesiones y tramites notariales.
            </h4><br>



            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> --}}
            <br><a class="btn btn-primary btn-lg  text-dark" href="#contact">Contactanos</a>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-signal logo"></span>
        </div>
    </div>
</div>

<div class="container-fluid bg-grey">
    <div class="row">
        <div class="col-sm-4">
            {{-- <span class="glyphicon glyphicon-globe logo slideanim"></span> --}}
            <img src="{{asset('images/Inmobiliariamyg.png')}}" alt="">
        </div>
        <div class="col-sm-8">
            <h2>Nuestros valores</h2><br>
            <h4><strong>MISSION:</strong> Prestar los servicios de nuestro amplio portafolio a toda aquella persona que
                lo requiera en forma oportuna y eficiente, bajo principios de total transparencia, honestidad, seriedad
                y compromiso, sabiendo corresponder a la confianza depositada por nuestros clientes, con un
                asesoramiento altamente profesional en la prestación de los diferentes servicios relacionados con las
                necesidades empresariales e inmobiliarias, utilizando toda nuestra experiencia mediante un adecuado
                desempeño que asegure calidad, seguridad y cumplimiento de los objetivos de nuestros socios, clientes y
                consumidor final. </h4><br>
            <p><strong>VISION:</strong> Antes del 2021 debemos convertirnos en una de las empresas inmobiliarias en el
                ámbito local y nacional, como consecuencia de un trabajo hecho con total responsabilidad, seriedad,
                eficiencia y compromiso con nuestros clientes, buscando en todo momento mejorar su calidad de vida en la
                cual todos los que nos contacten y requieran de nuestros servicios se sientan muy bien asesorados y
                atendidos por el equipo profesional que labora en la inmobiliaria M&G propiedad raíz S.A.S., buscando en
                todo momento mejorar la calidad de vida de nuestros clientes y colaboradores.</p>
        </div>
    </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
    <h2>SERVICIOS</h2>
    <h4></h4>
    <br>
    <div class="row slideanim">
        <div class="col-sm-6">
            <span class="glyphicon glyphicon-off logo-small"></span>
            <h4>ARRIENDOS</h4>
            <p>Ofrecemos la gestios de alquiler de tus propiedades</p>
        </div>
        <div class="col-sm-6">
            <span class="glyphicon glyphicon-heart logo-small"></span>
            <h4>VENTAS</h4>
            <p>Nos encargamos de realizar todo el proceso de venta de tus inmuebles</p>
        </div>
    </div>
    <br><br>
    <div class="row slideanim">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-lock logo-small"></span>
            <h4>TRAMITES NOTARIALES</h4>
            <p>Te agilizamos los procesos notariales</p>
        </div>

        <div class="col-sm-4">
            <span class="glyphicon glyphicon-off logo-small"></span>
            <h4>AVALUOS</h4>
            <p>Estamos en la capacidad de avaluar cualquier tipo de propiedad</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-heart logo-small"></span>
            <h4>SUCESIONES</h4>
            <p>Nos encargamos de gestionar de manera eficiente los tramites de sucesiones</p>
        </div>
    </div>
    <br><br>
</div>

<!-- Container (Portfolio Section) -->
{{-- <div id="portfolio" class="container-fluid text-center bg-grey">
        <h2>Portfolio</h2><br>
        <h4>What we have created</h4>
        <div class="row text-center slideanim">
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="paris.jpg" alt="Paris" width="400" height="300">
                    <p><strong>Paris</strong></p>
                    <p>Yes, we built Paris</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="newyork.jpg" alt="New York" width="400" height="300">
                    <p><strong>New York</strong></p>
                    <p>We built New York</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="sanfran.jpg" alt="San Francisco" width="400" height="300">
                    <p><strong>San Francisco</strong></p>
                    <p>Yes, San Fran is ours</p>
                </div>
            </div>
        </div><br>

        <h2>What our customers say</h2>
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <h4>"This company is the best. I am so happy with the result!"<br><span
                            style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
                </div>
                <div class="item">
                    <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
                </div>
                <div class="item">
                    <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler
                            Bing, Actor, FriendsAlot</span></h4>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div> --}}

<!-- Container (Pricing Section) -->
{{-- <div id="pricing" class="container-fluid">
        <div class="text-center">
            <h2>Pricing</h2>
            <h4>Choose a payment plan that works for you</h4>
        </div>
        <div class="row slideanim">
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1>Basic</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>20</strong> Lorem</p>
                        <p><strong>15</strong> Ipsum</p>
                        <p><strong>5</strong> Dolor</p>
                        <p><strong>2</strong> Sit</p>
                        <p><strong>Endless</strong> Amet</p>
                    </div>
                    <div class="panel-footer">
                        <h3>$19</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1>Pro</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>50</strong> Lorem</p>
                        <p><strong>25</strong> Ipsum</p>
                        <p><strong>10</strong> Dolor</p>
                        <p><strong>5</strong> Sit</p>
                        <p><strong>Endless</strong> Amet</p>
                    </div>
                    <div class="panel-footer">
                        <h3>$29</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1>Premium</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>100</strong> Lorem</p>
                        <p><strong>50</strong> Ipsum</p>
                        <p><strong>25</strong> Dolor</p>
                        <p><strong>10</strong> Sit</p>
                        <p><strong>Endless</strong> Amet</p>
                    </div>
                    <div class="panel-footer">
                        <h3>$49</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

<!-- Container (Contact Section) -->
<a name="contact"></a>
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">CONTACTO</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Nos contactaremos contigo en menos de 24 horas.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Calle 50#24-08 Barrio Colombia </p>
            <p><span class="glyphicon glyphicon-phone"></span> 313-8815461</p>
            <p><span class="glyphicon glyphicon-envelope"></span> inmobiliariamygpropiedadraiz@gmail.com </p>
        </div>
        <div class="col-sm-7 slideanim">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comentario" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-primary pull-right" type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div id="googleMap" style="height:400px;width:100%;"></div>
    <script src="/lib/google-map-api.js"></script> --}}
{{-- <script>
        var myCenter = new google.maps.LatLng(41.878114, -87.629798);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:12,
  scrollwheel:false,
  draggable:false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
    </script> --}}

{{-- <footer class="container-fluid text-center">
        <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Bootstrap Theme Made By <a href="../index.html" title="Visit w3schools">www.w3ii.com</a></p>
    </footer> --}}

<script>
    $(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
//   $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // event.preventDefault();

    // Store hash
    // var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    // $('html, body').animate({
    //   scrollTop: $(hash).offset().top
    // }, 900, function(){
    //      window.location.hash = hash;
    // });
//   });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>



@endsection