<div class="card card-user card-clickable card-clickable-over-content gameFlavorItem">
    <div class="card-heading heading-full">
        <div class="user-image coverImgContainer">
            @if($gameFlavor->cover_img_file_path == null)
                <img class="coverImg" src="{{asset('assets/img/memori.png')}}">
            @else
                <img class="coverImg" src="{{route('resolveDataPath', ['filePath' => $gameFlavor->cover_img_file_path])}}">
            @endif
            <img class="langImg" src="{{asset('assets/img/' . $gameFlavor->language->flag_img_path)}}">
        </div>
        @if($user != null)
            @if($gameFlavor->accessed_by_user)
                <div class="clickable-button">
                    <div class="layer bg-green"></div>
                    <a class="btn btn-floating btn-green initial-position floating-open"><i class="fa fa-cog" aria-hidden="true"></i></a>
                </div>

                <div class="layered-content bg-green">
                    <div class="overflow-content">
                        <ul class="borderless">

                            <li><a href="{{url('gameFlavor/edit', $gameFlavor->id)}}" class="btn btn-flat btn-ripple"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></li>
                            <li><a href="{{url('gameFlavor/delete', $gameFlavor->id)}}" class="btn btn-flat btn-ripple"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
                            @if($user->isAdmin())
                                @if(!$gameFlavor->published)
                                    <li><a href="{{url('gameFlavor/publish', $gameFlavor->id)}}" class="btn btn-flat btn-ripple"><i class="fa fa-check" aria-hidden="true"></i> Publish</a></li>
                                @else
                                    <li><a href="{{url('gameFlavor/unpublish', $gameFlavor->id)}}" class="btn btn-flat btn-ripple"><i class="fa fa-ban" aria-hidden="true"></i> Unpublish</a></li>
                                @endif
                            @endif
                        </ul>
                    </div><!--.overflow-content-->
                    <div class="clickable-close-button">
                        <a class="btn btn-floating initial-position floating-close"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                </div>
            @endif
        @endif
    </div><!--.card-heading-->

    <div class="card-body">
        <h3>
        <a href="{{route('showEquivalenceSetsForGameFlavor', $gameFlavor->id)}}"> {{$gameFlavor->name}}</a>
            @if($user != null)
                @if($user->isAdmin())
                    @if(!$gameFlavor->published)
                        <i class="fa fa-exclamation-triangle statusIcon" aria-hidden="true" style="color: orangered" title="This game is not published yet."></i>
                    @else
                        <i class="fa fa-check-circle statusIcon" aria-hidden="true" style="color: forestgreen" title="Published game."></i>
                    @endif
                @endif
            @endif
        </h3>
        <p class="description">{{$gameFlavor->description}}</p>

    </div><!--.card-body-->

    <div class="card-footer">
        @if($gameFlavor->published)
            <h6 class="margin-bottom-1">Download the game:</h6>
            <ul class="justified-list">
                <li><a href="{{route('downloadGameFlavorWindows', $gameFlavor->id)}}"><button class="btn btn-xs btn-flat" style="color: #337ab7"><i class="fa fa-windows" aria-hidden="true"></i> Windows</button></a></li>
                <li><a href="{{route('downloadGameFlavorLinux', $gameFlavor->id)}}"><button class="btn btn-xs btn-flat" style="color: #337ab7"><i class="fa fa-linux" aria-hidden="true"></i> Linux</button></a></li>
            </ul>

        @else
            <small class="pull-left"><h6>This game will be available for downloading when it is published by an admin.</h6></small>
        @endif
            {{--<small class="pull-right">Created by: {{$gameFlavor->creator->name}}</small>--}}
    </div><!--.card-footer-->

</div><!--.card-->