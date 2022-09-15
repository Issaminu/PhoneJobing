<div id="mainBody" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item" style="margin-top: 0.1rem;"><a href="/dashboard"><svg class="icon icon-xxs"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg></a></li>
                <li class="breadcrumb-item"><a href="/scripts">Scripts</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $script->name }}</li>
            </ol>
        </nav>
        <div class="nameAndPic" style="display: flex; align-items: center; margin-left:0.5rem;">

            <h2 class="h1" style=" font-weight:600;">
                {{ $script->name }}
            </h2>
        </div>

    </div>
    @if (Auth::user()->type === 'manager')
        <div id="ajoutClient" class="btn-toolbar mt-2">
            <a href="/scripts/modifier-script/{{ $script->id }}">
                <button class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                    <svg class="icon icon-xs mr-1" fill="currentColor" viewBox="0 0 23 22"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd"></path>
                    </svg>Modifier
                </button>
            </a>
        </div>
    @endif
</div>
