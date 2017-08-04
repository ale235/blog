<div class="col-lg-8 left-content" style="padding-bottom: 60px;">

    <div class="col-md-12- blogLong">
        <h2><a href="{{ url('/post')}}">Title Blog 1</a></h2>
        <div class="row row-article">
            <div class="col-md-12">
                {{$post->content}}
            </div>
        </div>
        <div class="row row-info">
            <div class="col-md-12">
                <p>
                    <i class="fa fa-user-o" aria-hidden="true"></i> by <a href="#">Maria</a> 
                    | <i class="fa fa-calendar" aria-hidden="true"></i> Sept 17th, 2016
                    | <i class="fa fa-comment" aria-hidden="true"></i> <a href="#">3 Comments</a>
                    | <i class="fa fa-file-text-o" aria-hidden="true"></i> 53 Views
                    | <i class="fa fa-share-alt-square" aria-hidden="true"></i> <a href="#">21 Shares</a>
                </p>
            </div>
        </div>
    </div>

    
    <hr>
    <!-- Blog Comments -->
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    
    <hr>
    <!-- Posted Comments -->
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>

    <!-- Comment -->
    <div class="media" style="margin-top: 20px;">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>
    
    
    



</div>

