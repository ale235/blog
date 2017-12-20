@extends('frontend.layouts.master')

@section('content')
<div id="page-content" class="container" style="border: 0px solid red;">
    <div class="row">

        <div class="container">

            <!-- Introduction Row -->
            <h1 class="my-4">Sobre nosotros
                {{--<small>It's Nice to Meet You!</small>--}}
            </h1>
            <p>Una breve presentación de los redactores de este Blog.</p>

            <!-- Team Members Row -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="my-4">El Staff</h2>
                </div>
                <div class="col-lg-4 col-sm-6 text-center mb-4">
                    <img class="rounded-circle img-fluid d-block mx-auto" width="200px" height="200px" src="/images/Ale.jpg" alt="">
                    <h3>Alejandro Colautti
                        <small>ale235</small>
                    </h3>
                    <p>Santafesino muy orgulloso. Mis estudios primarios y secundarios fueron en la Dante Alighieri, donde conocí gente que afortunadamente sigo viendo al día de hoy.
                        También muy orgulloso de haber estudiado en la UTN y muy contento donde trabajo hoy. Amante de la cultura Japonesa más que nada. Me encanta leer y ver series.
                        Me gusta escribir pero me cuesta ponerme a hacerlo frecuentemente. Tuve varios blogs y espero que este sea el cimiento de uno muy bueno.
                    </p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center mb-4">
                    <img class="rounded-circle img-fluid d-block mx-auto" width="200px" height="200px" src="/images/Santi.jpg"  alt="">
                    <h3>Santiago Toller Achával
                        {{--<small>Santiago Toller Achával</small>--}}
                    </h3>
                    <p>Oriundo de Federación pero estudiando Bioquímica en Santa Fe. Como me crie en el campo, siento que soy un intermedio entre sus costumbres y el ritmo de vida y pensar de la ciudad.  Me identifico fácilmente por portar un mate adonde quiera que vaya a estar más de una hora. Me gusta la música en casi todos sus géneros, los juegos de pc, el cine, las series, los viajes en el tiempo y la astrofísica . Soy de informarme de básicamente todo a través de Internet y de analizar en detalle las cosas antes de tomar una decisión o emitir opinión firme.</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center mb-4">
                    <img class="rounded-circle img-fluid d-block mx-auto" width="200px" height="200px" src="/images/Chancho.jpg"  alt="">
                    <h3>Esteban Luengo
                        {{--<small>Job Title</small>--}}
                    </h3>
                    <p>            Fanático de los Broncos de Denver y Colón de Santa Fe. Técnico Superior Organizador de Eventos( próximamente).
                        Me gustan los Juegos de Mesa, jugar Football Americano y juntarme con gente interesante.
                        Odio las charlas triviales y la venta de humo.
                        Me identifico con las ideologías de izquierda, pero trato de mantenerme objetivo en todos los asuntos.</p>
                </div>
            </div>

        </div>
        
        
    </div>
</div>
@endsection
<style>
    body {
        padding-top: 54px;
    }

    @media (min-width: 992px) {
        body {
            padding-top: 56px;
        }
    }

</style>