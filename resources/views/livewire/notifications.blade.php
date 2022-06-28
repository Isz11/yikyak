<div>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fa fa-bell fa" aria-hidden="true"></i>
            @if (auth()->user()->unreadNotifications->count() > 0)
                <span class="badge badge-pill badge-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
            @endif
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @foreach (auth()->user()->unreadNotifications as $notification)
                <button style="background-color: lightgray" class="dropdown-item" href="#" wire:click.prevent="markAsRead( '{{ $notification->id }}', '{{ $notification->data['info']['url'] }}' )">
                    {{ $notification->data['info']['message'] }}
                    <br>
                    {{ get_time_ago($notification->created_at) }}
                </button>
            @endforeach
            @foreach (auth()->user()->readNotifications as $notification)
                <button class="dropdown-item" href="{{ $notification->data['info']['url'] }}">
                    {{ $notification->data['info']['message'] }}
                    <br>
                    {{ get_time_ago($notification->created_at) }}
                </button>
            @endforeach
        </div>
    </li>
</div>
