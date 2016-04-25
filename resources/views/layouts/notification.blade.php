<div class="popover_content hide">  
    <br>
    @foreach(Auth::user()->getNotificationsNotRead() as $notification)
    <div class="media">
      <div class="media-left col-md-2">
        <a href="#">
            <img src="http://demo.dnnrox.com/Portals/_default/Skins/Flatna/img/icons/user@2x.png" class=" media-object img-responsive img-circle" />
        </a>
      </div>

       <div class="media-body">
        <h4 class="media-heading">{{ $notification->from->name }}</h4>
        <a href="{{ $notification->url }}" class="list-group-item-text">{{ $notification->text }}</a>
      </div>

    </div>
    <hr>
    @endforeach
</div>