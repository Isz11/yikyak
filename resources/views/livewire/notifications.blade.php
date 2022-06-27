<div>
    <!-- Notifications from user id {{ Auth::user()->username }} -->
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fa fa-bell fa" aria-hidden="true"></i>
            <span class="badge badge-light">{{ auth()->user()->notifications->count() }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @foreach (auth()->user()->notifications as $notification)
                <a class="dropdown-item" href="{{ $notification->data['info']['url'] }}">
                    {{ $notification->data['info']['message'] }}
                    <br>
                    {{ get_time_ago($notification->created_at) }}
                </a>
            @endforeach
        </div>
    </li>
</div>
