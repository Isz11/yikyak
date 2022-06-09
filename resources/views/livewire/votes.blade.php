<div>
    <div class="text-center">
        <div>
            @auth
            <a wire:click.prevent="vote(1)" href="#">
            @endauth
                <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
            </a>
        </div>
        <div>{{ $totalScore }}</div>
        <div>
            @auth
            <a wire:click.prevent="vote(-1)" href="#">
            @endauth
                <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
