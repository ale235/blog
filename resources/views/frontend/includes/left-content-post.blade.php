<div class="col-lg-8 left-content" style="padding-bottom: 60px;">

    <div class="col-md-12- blogLong">
        <h2><a href="{{ url('/post')}}/{{$post->post_id }}"> {!! $post->title !!}</a></h2>
        <div class="row row-article">
            <div class="col-md-12">
                {!! $post->content !!}
            </div>
        </div>
        <div class="row row-info">
            <div class="col-md-12">
                <p>
                    <i class="fa fa-user-o" aria-hidden="true"></i> por <a href="#">{!! $post->username !!}</a>
                    | <i class="fa fa-calendar" aria-hidden="true"></i> {!! $post->updated_at !!}
                    {{--| <i class="fa fa-comment" aria-hidden="true"></i> <a href="#">3 Comments</a>--}}
                    {{--| <i class="fa fa-file-text-o" aria-hidden="true"></i> 53 Views--}}
                    {{--| <i class="fa fa-share-alt-square" aria-hidden="true"></i> <a href="#">21 Shares</a>--}}
                </p>
            </div>
        </div>
    </div>


    <hr>
    <!-- Blog Comments -->
    <!-- Comments Form -->
    {{--<div class="well">--}}
        {{--<h4>Comentá:</h4>--}}
        {{--<form role="form" method="POST" action="{{ url('/admin/comments') }}" id="form-comment" enctype="multipart/form-data">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="form-group">--}}
                {{--<textarea class="form-control" name="content" rows="3"></textarea>--}}
                {{--<input type="hidden" name="post_id" value="{{$post->post_id}}" />--}}
            {{--</div>--}}
            {{--<div class="g-recaptcha" data-sitekey="6LemcjUUAAAAACI89PcMcN1V17n0cWN6wMOkI1yJ"></div>--}}
            {{--<button type="submit" class="btn btn-primary">Enviar</button>--}}
        {{--</form>--}}
    {{--</div>--}}

    
    {{--<hr>--}}
    <!-- Posted Comments -->
    <!-- Comment -->
    {{--@foreach($comments as $comment)--}}
        {{--<div class="media">--}}
            {{--<a class="pull-left" href="#">--}}
                {{--<img class="media-object" src="http://placehold.it/64x64" alt="">--}}
            {{--</a>--}}
            {{--<div class="media-body">--}}
                {{--<h4 class="media-heading">{{$comment->username}}--}}
                    {{--<small>{{$comment->updated_at}}</small>--}}
                {{--</h4>--}}
                {{--{!! $comment->content !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}

    {{--<!-- Comment -->--}}
    {{--<div class="media" style="margin-top: 20px;">--}}
        {{--<a class="pull-left" href="#">--}}
            {{--<img class="media-object" src="http://placehold.it/64x64" alt="">--}}
        {{--</a>--}}
        {{--<div class="media-body">--}}
            {{--<h4 class="media-heading">Start Bootstrap--}}
                {{--<small>August 25, 2014 at 9:30 PM</small>--}}
            {{--</h4>--}}
            {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
        {{--</div>--}}
    {{--</div>--}}
    {{----}}

    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
         var disqus_config = function () {
         this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
         this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
         };
         */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://mates-y-papeles.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



</div>
@push('scripts')

@endpush

