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
                <li class="breadcrumb-item"><a href="/equipe">Équipe</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    @if ($user->type === 'manager')
                        Manager
                    @elseif ($user->type === 'teleoperateur')
                        Téléoperateur
                    @elseif ($user->type === 'commercial')
                        Commercial
                    @endif
                </li>
            </ol>
        </nav>
        <div class="nameAndPic" style="display: flex; align-items: center; margin-left:0.5rem;">
            {{-- <div class="client-picture-rounded" style="
            width: 10rem; height: 10rem; background-image: url({{ asset('images/' . $user->image) }})"> --}}
            <div class="client-picture-rounded" style="
            width: 10rem; height: 10rem; background-image: url({{ $user->image }})">
            </div>
            {{-- <img src="{{ $user->image }}" alt=""> --}}
            <h2 class="h1" style="margin-left:2rem; font-weight:600;">
                {{ $user->name }}
            </h2>
        </div>

    </div>

</div>
