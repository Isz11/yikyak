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
                <a style="background-color: lightgray" class="dropdown-item" href="#" wire:click.prevent="markAsRead( '{{ $notification->id }}', '{{ $notification->data['info']['url'] }}' )">
                    <div>{{ $notification->data['info']['message'] }}</div>
                    <div style="font-size: small">{{ get_time_ago($notification->created_at) }}</div>
                </a>
            @endforeach
            @foreach (auth()->user()->readNotifications as $notification)
                <a class="dropdown-item" href="{{ $notification->data['info']['url'] }}">
                    <div>{{ $notification->data['info']['message'] }}</div>
                    <div style="font-size: small">{{ get_time_ago($notification->created_at) }}</div>
                </a>
            @endforeach
            @if (auth()->user()->unreadNotifications->count() > 0)
                <button class="dropdown-item" href="#" style="font-size: small" wire:click="markAllAsRead">Mark all as read</button>
            @endif
        </div>
    </li>
</div>
