<div class="">

    <div class="panel panel-default panel-custom1">
        {{--<div class="panel-heading">--}}
            {{--<p class="panel-title">--}}
                {{--Post Populares--}}
            {{--</p>--}}
        {{--</div>--}}
        <div class="panel-body">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Anuncio -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-9928508845561019"
                 data-ad-slot="1549147322"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        {{--<div class="panel-footer">--}}
        {{--<button type="button" class="btn btn-primary btn-sm" id="prevBtn">Prev</button>--}}
        {{--<button type="button" class="btn btn-primary btn-sm" id="nextBtn">Next</button>--}}
        {{--</div>--}}
    </div>

    <div class="panel panel-default panel-custom1">
        <div class="panel-heading">
            <p class="panel-title">
                Post Populares
            </p>
        </div>
        <div class="panel-body">
            {{--<ul class="media-list">--}}
                {{--<div class="media-body">--}}
                    {{--<li class="media">--}}
                        {{--<h4 class="media-heading"><a href="#" class="text-info">This is one title for post</a></h4>--}}
                        {{--<p class="margin-top-10 margin-bottom-20" style="font-size: 0.8em;">--}}
                            {{--<i class="fa fa-calendar" aria-hidden="true"></i> Sept 12th, 2016--}}
                            {{--<i class="fa fa-comment" aria-hidden="true"></i> <a href="#">45 Comments</a>--}}
                        {{--</p>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<h4 class="media-heading"><a href="#" class="text-info">An other title is one title for post</a></h4>--}}
                        {{--<p class="margin-top-10 margin-bottom-20" style="font-size: 0.8em;">--}}
                            {{--<i class="fa fa-calendar" aria-hidden="true"></i> Sept 13th, 2016--}}
                            {{--<i class="fa fa-comment" aria-hidden="true"></i> <a href="#">454 Comments</a>--}}
                        {{--</p>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<h4 class="media-heading"><a href="#" class="text-info">An other title is one title for or some othe</a></h4>--}}
                        {{--<p class="margin-top-10 margin-bottom-20" style="font-size: 0.8em;">--}}
                            {{--<i class="fa fa-calendar" aria-hidden="true"></i> Sept 14th, 2016--}}
                            {{--<i class="fa fa-comment" aria-hidden="true"></i> <a href="#">4 Comments</a>--}}
                        {{--</p>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<h4 class="media-heading"><a href="#" class="text-info">An other title is one title for or some othe</a></h4>--}}
                        {{--<p class="margin-top-10 margin-bottom-20" style="font-size: 0.8em;">--}}
                            {{--<i class="fa fa-calendar" aria-hidden="true"></i> Sept 14th, 2016--}}
                            {{--<i class="fa fa-comment" aria-hidden="true"></i> <a href="#">4 Comments</a>--}}
                        {{--</p>--}}
                    {{--</li>--}}
                    {{--<li class="media">--}}
                        {{--<h4 class="media-heading"><a href="#" class="text-info">An other title is one title for or some othe</a></h4>--}}
                        {{--<p class="margin-top-10 margin-bottom-20" style="font-size: 0.8em;">--}}
                            {{--<i class="fa fa-calendar" aria-hidden="true"></i> Sept 14th, 2016--}}
                            {{--<i class="fa fa-comment" aria-hidden="true"></i> <a href="#">4 Comments</a>--}}
                        {{--</p>--}}
                    {{--</li>--}}
                {{--</div>--}}
            {{--</ul>--}}
            En construcción

        </div>
        {{--<div class="panel-footer">--}}
            {{--<button type="button" class="btn btn-primary btn-sm" id="prevBtn">Prev</button>--}}
            {{--<button type="button" class="btn btn-primary btn-sm" id="nextBtn">Next</button>--}}
        {{--</div>--}}
    </div>


    {{--<div class="panel panel-default panel-custom2">--}}
        {{--<div class="panel-heading">--}}
            {{--<p class="panel-title">--}}
                {{--Post Tags--}}
            {{--</p>--}}
        {{--</div>--}}
        {{--<div class="panel-body">--}}
            {{--@if(!empty($tags))--}}
                {{--<ul class="ul-tag">--}}
                {{--@foreach ($tags as $tag)--}}
                    {{--<li><a href="{{ url('/blog?tag='.$tag->tag_slug.'') }}">{{ $tag->tag_name }}</a></li>--}}
                {{--@endforeach--}}
                {{--</ul>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}


    {{--<div class="panel panel-default panel-custom3">--}}
        {{--<div class="panel-heading">--}}
            {{--<p class="panel-title" style="font-weight:normal;">--}}
                {{--Survey of the week--}}
            {{--</p>--}}
        {{--</div>--}}
        {{--<form method="post" action="{{ url('/survey') }}" id="form-vote">--}}
            {{--{{ csrf_field() }}  --}}
            {{--<div class="panel-body">--}}
                {{--<div class="survey_response">--}}
                {{--@if(!empty($response))--}}
                   {{--<span>{{ $survey->question }}</span> --}}
                   {{--<ul class="list-group" style="border:0px solid silver;margin-bottom: 0px; margin-left: 15px">--}}
                       {{--@foreach ($responses as $response)--}}
                            {{--<li class="list-group-item" style="border:1px solid transparent; padding:0px">--}}
                                {{--<div class="radio">--}}
                                    {{--<label><input type="radio" name="response[]" value="{{ $response->response_id }}"> {{ $response->response_text }}</label>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                       {{--@endforeach--}}
                   {{--</ul>--}}
                {{--@endif--}}
                {{--</div>--}}
                {{--<div class="survey_result" style="display: none">--}}
                    {{--result graphe--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="panel-footer">--}}
                {{--<button type="button" class="btn btn-primary btn-sm vote">Vote</button>--}}
                {{--<a href="#" id="view-result">View Result</a>--}}
                {{--<a href="#" id="view-vote" style="display: none">Back to vote</a>--}}
            {{--</div>--}}
        {{--</form>--}}
    {{--</div>--}}

</div>


