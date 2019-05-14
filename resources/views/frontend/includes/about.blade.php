<section class="page-section  bg-primary" id="resenias" style="
                background: url('../../img/fondojaja.png');
                background-position: center;
                /*background-size: cover;*/
                background-repeat: repeat;
                background-attachment: scroll;">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: -50px;">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Blog y Reseñas</h2>
                <hr class="divider my-4">
                </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title" style="text-align: center">{{$post->title}}</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text">{{$post->descripcion}}</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{asset($post->avatar)}}" alt="..." class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-sm">Leer más...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.row -->
    </div>
</section>
