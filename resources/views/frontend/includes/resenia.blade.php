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
                @if($post->image_path !== "")
                <div class="col-md-4 mb-5">
                    <div class="card h-100" style="background: rgba(255, 255, 255, 0.5);">
                        <div class="card-body">
                            <h2 class="card-title" style="text-align: center">{{$post->title}}</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="card-text">{{$post->descripcion}}</p>
                                    <img src="{{asset($post->image_path)}}" alt="..." class="img-thumbnail" style="float: left;">
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{url('/post/'.$post->slug)}}" class="btn btn-primary btn-sm">Leer más...</a>
                                </div>
                                    <small class="text-muted">Escrito por : {{$post->username}}</small>
                            </div>
                            {{--<a href="#" class="btn btn-primary btn-sm">Leer más...</a> |--}}
                            {{--<a><p>Escrito por: Ema</p></a> |--}}
                            {{--<a href="#" class="btn btn-primary btn-sm">Leer más...</a>--}}
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <!-- /.row -->
    </div>
</section>
