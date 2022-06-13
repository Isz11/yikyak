<div>
    <div class="text-center">
        <div>
            @auth
            <a wire:click.prevent="vote(1)" href="#">
            @endauth
                <i class="fa fa-2x fa-sort-asc" style="color: {{ $arrow_up }}" aria-hidden="true"></i>
            </a>
        </div>
        <div style="color: {{ $vote_colour }}; font-weight: bold">{{ $total_score }}</div>
        <div>
            @auth
            <a wire:click.prevent="vote(-1)" href="#">
            @endauth
                <i class="fa fa-2x fa-sort-desc" style="color: {{ $arrow_down }}" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
