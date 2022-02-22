<div class="col-12 mb-4" style="display: flex; flex-flow:row wrap;" id="ClientBox">
    @foreach ($clients as $client)
        <div class="card shadow border-0 text-center p-0"
            style="margin-bottom: 16px; width: 30%; margin-bottom: calc(10%/6); margin-left: calc(10%/6); margin-right: calc(10%/6);">
            {{-- <div class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg"></div> --}}

            {{-- <div class="card-body pb-5"><img src="/images/avatar-2a96598af5f243f692a9a304011f980e.jpg"
                    class="avatar-xl rounded-circle mx-auto mt-3 mb-4" alt="{{ $client->name }}"> --}}
            <div class="card-body pb-5">
                <div class="client-picture-rounded"
                    style="background-image: url({{ asset('images/' . $client->image) }})"></div>
                <h4 class="h3">{{ $client->name }}</h4>
                <h5 class="fw-normal h6" style="display:inline;">{{ $client->position }},
                    {{ $client->company }}</h5>
                <p class="text-gray mb-4 text-sm">{{ $client->city }}, {{ $client->country }}</p>
                <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="#"><svg
                        class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 21 21"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd">
                        </path>
                    </svg> Voir Profile </a><a class="btn btn-sm btn-secondary d-inline-flex align-items-center"
                    href="https://mail.google.com/mail/?view=cm&source=mailto&to={{ $client->email }}"><svg
                        class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd"></path>
                    </svg> Envoyer Email </a>
            </div>
        </div>
    @endforeach

</div>
