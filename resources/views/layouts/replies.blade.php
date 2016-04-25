<div class="media">
    <a href="" class="pull-left">
        <img class="media-object" src="{{$reply->_user()->getProfilePic(40)}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">
            <a href="/profile/{{$reply->_user()->id}}">
                {{ $reply->_user()->firstname }} {{ $reply->_user()->name }}
            </a>
        </h4>
        <p>{{ $reply->body }}</p>
        <ul class="list-inline">
            <li>{{ $reply->created_at->diffForHumans() }}</li>
        </ul>
    </div>
</div>

<br>