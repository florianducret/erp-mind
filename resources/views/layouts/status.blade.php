<div class="media">
    <a href="/profile/{{ $status->_user()->id }}" class="pull-left">
        <img class="media-object" width="50" src="{{$status->_user()->getProfilePic(64)}}" alt="">
    </a>
    <div class="media-body">

        <h4 class="media-heading">
            <a href="/profile/{{ $status->_user()->id }}">
                {{ $status->_user()->firstname }} {{ $status->_user()->name }}
            </a>
        </h4>

        <p style="width:450px;text-align: justify;word-wrap: break-word;">{{ $status->body }}</p>
        <ul class="list-inline">
            <li>{{ $status->created_at->diffForHumans() }}</li>
        </ul>
        <br>

        <div id="replies-{{$status->id}}">  
            @foreach($status->replies as $reply)
                @include('layouts.replies')
            @endforeach
        </div>

        <form data-id="{{$status->id}}" action="/status/reply/{{$status->id}}" class="reply-form" method="post">
        {!! csrf_field() !!}
            <div class="form-group">
                <textarea name="reply-{{$status->id}}" class="form-control" rows="1" placeholder="Répondre à ce statut"></textarea>
            </div>
            <button type="submit" class="btn btn-info btn-sm pull-right"><i class="fa fa-comment-o"></i>Répondre</button>
        </form>
    
    </div>
</div>
<hr>