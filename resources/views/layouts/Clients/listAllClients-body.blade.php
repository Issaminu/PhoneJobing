<div id="mainBody">
    <div style="display:flex;flex-direction:column;">
        <div style="display:flex;justify-content:flex-end">
            <div class="input-group fmxw-300" style="">
                <input style="width:14rem; --tw-ring-color: rgb(75, 85, 99);" id="teamSearch" type="text"
                    class="form-control" placeholder="Chercher">
            </div>
        </div>
        <div id="">
            <br style="user-select: none;">
            <div class="card card-body shadow border-0 table-wrapper table-responsive">
                <table class="table user-table table-hover align-items-center" id="teamTable">
                    <thead style="text-align: center;">
                        <tr>
                            <th class="border-bottom">Nom</th>
                            <th class="border-bottom">Revenue</th>
                            <th class="border-bottom">Location</th>
                            <th class="border-bottom">Numero</th>
                            @if (Auth::user()->type === 'manager')
                                <th class="border-bottom">Contact</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($clients as $client)
                            <?php $i++; ?>
                            <tr style="text-align: center;">
                                <td><a href="/clients/{{ str_replace(' ', '', $client->name) }}-{{ $client->id }}"
                                        class="d-flexr">
                                        <div class="d-block"><span class="fw-bold">{{ ucwords($client->name) }}</span>
                                        </div>
                                    </a></td>
                                </td>
                                <td><span class="fw-normal">
                                        @if ($client->earnings)
                                            {{ $client->earnings }}
                                        @else
                                            0
                                        @endif MAD
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-normal">
                                        {{ $client->city }}, {{ $client->country }}
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-normal">
                                        {{ $client->phone }}
                                    </span>
                                </td>
                                @if (Auth::user()->type === 'manager')
                                    <td>
                                        <a target="_blank" class="btn btn-sm btn-secondary d-inline-flex"
                                            href="https://mail.google.com/mail/?view=cm&source=mailto&to={{ $client->email }}"><svg
                                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Envoyer Email </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br style="user-select: none;">
            </div>
        </div>
    </div>
</div>
