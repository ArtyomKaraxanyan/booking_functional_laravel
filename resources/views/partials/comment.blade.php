<div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
        <div class="user justify-content-between d-flex">
            <div class="thumb">
            </div>
            <div class="desc">
                <h5><a href="#">{{ucfirst($comment_details['name'])}}</a></h5>
                <p class="date">{{$date}}</p>
                <div>
                    <p class="comment">
                        {{$comment_details['message']}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>