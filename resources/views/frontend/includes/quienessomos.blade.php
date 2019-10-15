<section class="page-section" id="quienessomos">
    <div class="row justify-content-center" style="margin-top: -50px;">
        <div class="col-lg-8 text-center">
            <h2 class="mt-0">¿Quienes somos?</h2>
            <hr class="divider my-4">
        </div>
        <div class="container text-center">
            <div class="row justify-content-center">
                @foreach($quienessomos as $quienessomo)
                    <div class="col-xl-12 col-md-12 mb-12">
                        <img src="{{asset($quienessomo->image_path)}}" style="float: left;"/>
                        <p class="text-muted mb-5" style="text-align: justify; font-size: large">
                            {{$quienessomo->texto_uno}}
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center" style="">
                    <h2 class="mt-0">¡Seguinos en nuestras redes!</h2>
                    <hr class="divider my-4">
                    <div class="col-md-12">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-twitter"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    /* Style all font awesome icons */
    .fa {
        padding: 20px;
        font-size: 50px;
        width: 100px;
        text-align: center;
        text-decoration: none;
        border-radius: 50%;
    }

    /* Add a hover effect if you want */
    .fa:hover {
        opacity: 0.7;
    }

    /* Set a specific color for each brand */

    /* Facebook */
    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    /* Twitter */
    .fa-twitter {
        background: #55ACEE;
        color: white;
    }

    /* Twitter */
    .fa-instagram {
        background: #125688;
        color: white;
    }

</style>