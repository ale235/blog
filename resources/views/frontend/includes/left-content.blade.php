<div class="left-content rounded">
  @foreach ($posts as $post)
    <div class="col-md-12 blogShort" style="    margin: 5px 0px 0px 0px;">
      <h2><a href="{{ url('/post')}}/{{$post->slug }}">{{$post->title}}</a></h2>
      <hr>
      <div class="row row-article">
          <div class="col-md-12">
              <article>
                  <div >
                      {!! $post->summary !!}
                  </div>
              </article>
              <a href="{{ url('/post')}}/{{$post->slug }}" class="btn btn-default" role="button">Leer más</a>
          </div>
      </div>
      <div class="row row-info">
          <div class="col-md-12">
              <p>
                  <i class="fa fa-user-o" aria-hidden="true"></i> por <a href="#">{{$post->username}}</a>
                  | <i class="fa fa-calendar" aria-hidden="true"></i> {{ $post->updated_at }}
                  | <i class="disqus-comment-count" data-disqus-url="{{URL::action('BlogController@getPost',$post->id)}}" aria-hidden="true"></i>
              {{--<span class="disqus-comment-count" data-disqus-url="{{URL::action('BlogController@getPost',$post->post_id)}}">First article</span>--}}
              {{--<script id="dsq-count-scr" src="https://mates-y-papeles.disqus.com/count.js" async></script>--}}
              </p>
          </div>
      </div>
  </div>
  @endforeach
  {{$posts->render()}}
</div>