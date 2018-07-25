<div class="left-content">
  @foreach ($posts as $post)
    <div class="col-md-12 blogShort">
      <h2><a href="{{URL::action('BlogController@getPost',$post->post_id)}}">{{$post->title}}</a></h2>
      <div class="row row-article">
          <div class="col-md-12">
              <article>
                  <div >
                      {!! $post->summary !!}
                  </div>
              </article>
              <a href="{{URL::action('BlogController@getPost',$post->post_id)}}" class="btn btn-default" role="button">Leer más</a>
          </div>
      </div>
      <div class="row row-info">
          <div class="col-md-12">
              <p>
                  <i class="fa fa-user-o" aria-hidden="true"></i> por <a href="#">{{$post->username}}</a>
                  | <i class="fa fa-calendar" aria-hidden="true"></i> {{ $post->updated_at }}
                  {{--| <i class="fa fa-comment" aria-hidden="true"></i> <a href="#"><span class="fb-comments-count" data-href="https://www.matesypapeles.com.ar/blog/{{$post->post_id}}"></span> Comentarios</a>--}}
                  {{--<script>(function(d, s, id) {--}}
                          {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
                          {{--if (d.getElementById(id)) return;--}}
                          {{--js = d.createElement(s); js.id = id;--}}
                          {{--js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=581097305242558';--}}
                          {{--fjs.parentNode.insertBefore(js, fjs);--}}
                      {{--}(document, 'script', 'facebook-jssdk'));--}}
                  {{--</script>--}}
                  | <i class="disqus-comment-count" data-disqus-url="{{URL::action('BlogController@getPost',$post->post_id)}}" aria-hidden="true"></i>
              {{--<span class="disqus-comment-count" data-disqus-url="{{URL::action('BlogController@getPost',$post->post_id)}}">First article</span>--}}
              <script id="dsq-count-scr" src="https://mates-y-papeles.disqus.com/count.js" async></script>
              {{--| <i class="fa fa-comment" aria-hidden="true"></i> <a href="#">3 Comments</a>--}}
                  {{--| <i class="fa fa-file-text-o" aria-hidden="true"></i> 53 Views--}}
                  {{--| <i class="fa fa-share-alt-square" aria-hidden="true"></i> <a href="#">21 Shares</a>--}}
              </p>
          </div>
      </div>
  </div>
  @endforeach
  {{$posts->render()}}
</div>