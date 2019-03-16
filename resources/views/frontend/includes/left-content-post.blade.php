<div class="left-content">

    <div class="col-md-12 blogLong">
        <h2><a href="{{ url('/post')}}/{{$post->slug }}"> {!! $post->title !!}</a></h2>
        <div class="row row-article">
                <div class="col-md-12">
                    <article>
                        <div>
                            {!! $post->content !!}
                        </div>
                    </article>
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
            <div class="col-md-12">
                <div class="row mobile-social-share">
                    <div class="col-md-9">
                        <h3>Share this content</h3>
                    </div>
                    <div id="socialHolder" class="col-md-3">
                        <div id="socialShare" class="btn-group share-group">
                            <a data-toggle="dropdown" class="btn btn-info">
                                <i class="fa fa-share-alt fa-inverse"></i>
                            </a>
                            <button href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle share">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a data-original-title="Twitter" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-original-title="Facebook" rel="tooltip"  href="#" class="btn btn-facebook" data-placement="left">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-original-title="Google+" rel="tooltip"  href="#" class="btn btn-google" data-placement="left">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-original-title="LinkedIn" rel="tooltip"  href="#" class="btn btn-linkedin" data-placement="left">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-original-title="Pinterest" rel="tooltip"  class="btn btn-pinterest" data-placement="left">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
<style>
    .mobile-social-share {
        background: none repeat scroll 0 0 #EEEEEE;
        display: block !important;
        min-height: 70px !important;
        margin: 50px 0;
    }

    /*body {*/
        /*color: #777777;*/
        /*font-family: "Lato","Helvetica Neue","Arial","Helvetica",sans-serif;*/
        /*font-size: 13px;*/
        /*line-height: 19.5px;*/
    /*}*/


    .mobile-social-share h3 {
        color: inherit;
        float: left;
        font-size: 15px;
        line-height: 20px;
        margin: 25px 25px 0 25px;
    }

    .share-group {
        float: right;
        margin: 18px 25px 0 0;
    }

    .btn-group {
        display: inline-block;
        font-size: 0;
        position: relative;
        vertical-align: middle;
        white-space: nowrap;
    }

    .mobile-social-share ul {
        float: right;
        list-style: none outside none;
        margin: 0;
        min-width: 61px;
        padding: 0;
    }

    .share {
        min-width: 17px;
    }

    .mobile-social-share li {
        display: block;
        font-size: 18px;
        list-style: none outside none;
        margin-bottom: 3px;
        margin-left: 4px;
        margin-top: 3px;
    }

    .btn-share {
        background-color: #BEBEBE;
        border-color: #CCCCCC;
        color: #333333;
    }

    .btn-twitter {
        background-color: #3399CC !important;
        width: 51px;
        color:#FFFFFF!important;
    }

    .btn-facebook {
        background-color: #3D5B96 !important;
        width: 51px;
        color:#FFFFFF!important;
    }

    .btn-facebook {
        background-color: #3D5B96 !important;
        width: 51px;
        color:#FFFFFF!important;
    }

    .btn-google {
        background-color: #DD3F34 !important;
        width: 51px;
        color:#FFFFFF!important;
    }

    .btn-linkedin {
        background-color: #1884BB !important;
        width: 51px;
        color:#FFFFFF!important;
    }

    .btn-pinterest {
        background-color: #CC1E2D !important;
        width: 51px;
        color:#FFFFFF!important;
    }

    .btn-mail {
        background-color: #FFC90E !important;
        width: 51px;
        color:#FFFFFF!important;
    }

    .caret {
        border-left: 4px solid rgba(0, 0, 0, 0);
        border-right: 4px solid rgba(0, 0, 0, 0);
        border-top: 4px solid;
        display: inline-block;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        width: 0;
    }

    #socialShare {
        max-width:59px;
        margin-bottom:18px;
    }

    #socialShare > a{
        padding: 6px 10px 6px 10px;
    }

    @media (max-width : 320px) {
        #socialHolder{
            padding-left:5px;
            padding-right:5px;
        }

        .mobile-social-share h3 {
            margin-left: 0;
            margin-right: 0;
        }

        #socialShare{
            margin-left:5px;
            margin-right:5px;
        }

        .mobile-social-share h3 {
            font-size: 15px;
        }
    }

    @media (max-width : 238px) {
        .mobile-social-share h3 {
            font-size: 12px;
        }
    }

</style>
@push('scripts')
@endpush

