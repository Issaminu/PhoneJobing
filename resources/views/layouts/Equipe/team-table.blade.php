<div id="mainBody">

    <div id="searchAndAccountType">
        <div class="btn-toolbar mb-2 mb-md-0">
            <div id="accTypeSelector" class="btn-group ms-2 ms-lg-3"><button id="FilterByTeleButton" type="button"
                    class="btn btn-sm btn-outline-gray-600 ml-">Téléoperateurs</button>
                <button id="FilterByCommButton" type="button"
                    class="btn btn-sm btn-outline-gray-600">Commerciaux</button>
            </div>
        </div>
        <div class="input-group fmxw-300 ">
            <input style="width:14rem" id="teamSearch" type="text" class="form-control" placeholder="Chercher">
            {{-- <span class="input-group-text border-l-0"> </span> --}}



        </div>

    </div>
    <br style="user-select: none;">
    <div class="card card-body shadow border-0 table-wrapper table-responsive">
        {{-- <div class="d-flex mb-3"><select class="form-select fmxw-200" aria-label="Message select example">
            <option selected="selected">Bulk Action</option>
            <option value="1">Send Email</option>
            <option value="2">Change Group</option>
            <option value="3">Delete User</option>
        </select> <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button></div> --}}
        <table class="table user-table table-hover align-items-center" id="teamTable">
            <thead>
                <tr>
                    {{-- <th class="border-bottom">
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
                                id="userCheck55"> <label class="form-check-label" for="userCheck55"></label></div>
                    </th> --}}
                    <th class="border-bottom">Nom</th>
                    <th class="border-bottom">Classement</th>
                    <th class="border-bottom">Email</th>
                    <th class="border-bottom"> Status</th>
                    <th class="border-bottom">Type</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($users as $user)
                    <?php $i++; ?>
                    <tr>
                        {{-- <td>
                            <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox"
                                    value="" id="userCheck1"> <label class="form-check-label" for="userCheck1"></label>
                            </div>
                        </td> --}}
                        <td><a href="users.html#" class="d-flex align-items-center">
                                {{-- <img src="../assets/img/team/profile-picture-1.jpg" class="avatar rounded-circle me-3"
                        alt="Avatar"> --}}
                                <div class="d-block"><span
                                        class="fw-bold">{{ ucwords($user->name) }}</span>
                                    <div class="small text-gray"><span class="__cf_email__"
                                            data-cfemail="dbb2b5bdb49bbea3bab6abb7bef5b8b4b6"></span>
                                    </div>
                                </div>
                            </a></td>
                        <td><span class="fw-normal">{{ $i }}</span>
                        </td>
                        <td><span class="fw-normal d-flex align-items-center"><svg
                                    class="icon icon-xxs text-success me-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg> {{ $user->email }}</span>
                        </td>
                        <td><span class="fw-normal text-success">Active</span></td>
                        <td>
                            <span class="fw-normal">{{ ucwords($user->type) }}</span>
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
        {{-- <div
            class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                    <li class="page-item"><a class="page-link" href="users.html#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="users.html#">1</a></li>
                    <li class="page-item"><a class="page-link" href="users.html#">2</a></li>
                    <li class="page-item"><a class="page-link" href="users.html#">3</a></li>
                    <li class="page-item"><a class="page-link" href="users.html#">4</a></li>
                    <li class="page-item"><a class="page-link" href="users.html#">5</a></li>
                    <li class="page-item"><a class="page-link" href="users.html#">Next</a></li>
                </ul>
            </nav>
            <div class="fw-normal small mt-4 mt-lg-0">Showing <b>{{ $TeleCount + $CommCount }}</b> out of
                <b>{{ $TeleCount + $CommCount }}</b>
                entries
            </div>
        </div> --}}
        <br style="user-select: none;">
    </div>
</div>
