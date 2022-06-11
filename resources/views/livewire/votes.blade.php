<div>
    <div class="text-center">
        <div>
            @auth
            <a wire:click.prevent="vote(1)" href="#" style="color: {{ $arrow_up }}">
            @endauth
                <i class="fa fa-2x fa-sort-asc blackiconcolor" aria-hidden="true"></i>
            </a>
        </div>
        <div style="color: {{ $vote_colour }}; font-weight: bold">{{ $total_score }}</div>
        <div>
            @auth
            <a wire:click.prevent="vote(-1)" href="#" style="color: {{ $arrow_down }}">
            @endauth
                <i class="fa fa-2x fa-sort-desc blackiconcolor" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
