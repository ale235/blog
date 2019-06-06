<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            @foreach($headers as $header)
            <div class="col-lg-10">
                <img src="{{url($header->image_path)}}" class="img-fluid">
            </div>
            @endforeach
        </div>
    </div>
</header>