<div class="left-content rounded">
    <div class="col-md-12 blogLong">
        <h2><a href="{{ url('/post')}}/{{$post->slug }}"> {!! $post->title !!}</a></h2>
        <hr>
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
                </p>
            </div>
        </div>
    </div>
</div>
@push('scripts')
@endpush

