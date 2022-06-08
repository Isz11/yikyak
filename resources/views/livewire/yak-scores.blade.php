<div>
    <div id="app" class="col-2 align-self-start">
        <div>
            <a wire:click.prevent="vote(1)" href="#">
                <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
            </a>
        </div>
        <div>{{ $yak->score }}</div>
        <div id="app" class="col-2 align-self-start">
            <div>
                <a wire:click.prevent="vote(-1)" href="#">
                    <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>
