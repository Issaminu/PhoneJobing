<div style="margin-left:10rem; margin-right:10rem;">

    <div id="searchAndAccountType" style="display: flex; justify-content:flex-end">
        <div class="input-group fmxw-300" style="margin-top: 0rem;">
            <input style="width:14rem; --tw-ring-color: rgb(75, 85, 99);" id="productSearch" onkeyup="callSearch()"
                type="text" class="form-control" value="#APPEL">
        </div>
    </div>
    <br style="user-select: none;">
    <div class="card card-body shadow border-0 table-wrapper table-responsive"
        style="width:auto; padding: 1.1rem 1rem;">
        <table class="table user-table table-hover align-items-center" id="callTable" style="table-layout: auto;">
            <thead>
                <tr style="text-align: center;">
                    <th class="border-bottom">Appel ID</th>
                    <th class="border-bottom">Téléoperateur</th>
                    <th class="border-bottom">Client</th>
                    <th class="border-bottom">Résultat</th>
                    <th class="border-bottom">Quantité</th>
                    <th class="border-bottom">Produit</th>
                    <th class="border-bottom">Durée appel</th>
                    <th class="border-bottom d-flex justify-content-center">Date</th>

                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach ($calls as $call)
                    <tr>
                        <td><span class="fw-normal d-flex justify-content-center" style=" font-weight:400;">
                                {{ $call->callId }}
                            </span>
                        </td>
                        <td><a href="/equipe/{{ str_replace(' ', '', $call->teleoperateur) }}"
                                class="d-flex justify-content-center">
                                <div class="d-block"><span class="fw-bold">{{ ucwords($call->teleoperateur) }}</span>
                                </div>
                            </a></td>
                        </td>
                        <td><a href="/clients/{{ str_replace(' ', '', $call->client) }}-{{ $call->clientId }}"
                                class="d-flex justify-content-center">
                                <div class="d-block"><span class="fw-bold">{{ ucwords($call->client) }}</span>
                                </div>
                            </a></td>
                        </td>
                        <td>
                            @if ($call->result === 'Vente réussie')
                                <span class="fw-normal d-flex justify-content-center"
                                    style="color: #10b981; font-weight:500;">
                                    Vente réussie
                                </span>
                            @elseif ($call->result === 'Appel reporté')
                                <span class="fw-normal d-flex justify-content-center"
                                    style="color: #30a5d3; font-weight:500;">
                                    Appel reporté
                                </span>
                            @elseif ($call->result === 'Vente non réalisée')
                                <span class="fw-normal d-flex justify-content-center"
                                    style="color: #e11d48; font-weight:500;">
                                    Vente non réalisée
                                </span>
                            @elseif ($call->result === 'Mauvaise numéro')
                                <span class="fw-normal d-flex justify-content-center"
                                    style="color: #7c3aed; font-weight:500;">
                                    Mauvaise numéro
                                </span>
                            @elseif ($call->result === 'Aucune réponse')
                                <span class="fw-normal d-flex justify-content-center"
                                    style="color: #8f9793; font-weight:500;">
                                    Aucune réponse
                                </span>
                            @elseif ($call->result === 'Problème technique')
                                <span class="fw-normal d-flex justify-content-center"
                                    style="color: #8f9793; font-weight:500;">
                                    Problème technique
                                </span>
                            @endif
                        </td>
                        <td><span class="fw-normal d-flex justify-content-center">
                                {{ $call->quantity }}
                            </span>
                        </td>
                        <td><span class="fw-normal d-flex justify-content-center">
                                {{ $call->product }}
                            </span>
                        </td>
                        <td><span class="fw-normal d-flex justify-content-center">
                                {{ $call->callLength }}
                            </span>
                        </td>
                        <td><span class="fw-normal d-flex justify-content-center">
                                {{ $call->callDate->format('d/m/Y') }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br style="user-select: none;">
    </div>
</div>
