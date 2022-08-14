<div class="mb-4 ml-32 mr-32" style="display: flex; flex-flow:row wrap;" id="ClientBox">
    @foreach ($scripts as $script)
        <a href="/scripts/{{ str_replace(' ', '', $script->name) }}-{{ $script->id }}">
            <div class="card shadow border-0 text-center p-0 mt-5"
                style="margin-bottom: 16px; min-width: 30%;max-width: 30%; height:fit-content; margin-bottom: calc(10%/6); margin-left: calc(10%/6); margin-right: calc(10%/6);">

                <div class="card-body pb-5" style="display: flex; flex-direction: column;align-items: center;">
                    <img src="{{ asset('script-icon.jpg') }}" alt="script icon" width="140" height="150" />
                    <h4 class="h2 mt-3" style="color: #f0bc74; text-shadow: 1px 1px 2px #be7f26;
                ">
                        {{ ucwords($script->name) }}</h4>

                </div>
        </a>
</div>
@endforeach
</div>
