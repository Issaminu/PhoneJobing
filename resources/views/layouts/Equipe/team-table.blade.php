<div id="mainBody">
    <div id="searchAndAccountType">
        <div class="input-group me-2 me-lg-3 fmxw-300 "><span class="input-group-text"><svg class="icon icon-xs"
                    x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg> </span><input id="teamSearch" type="text" class="form-control" placeholder="Search Employees">
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div id="accTypeSelector" class="btn-group ms-2 ms-lg-3"><button id="AccTypeTeleButton" type="button"
                    class="btn btn-sm btn-outline-gray-600 ml-">Teleoperateurs</button>
                <button id="AccTypeCommButton" type="button" class="btn btn-sm btn-outline-gray-600">Commerciaux</button>
            </div>
        </div>
    </div>
    <br>
    <div class="card card-body shadow border-0 table-wrapper table-responsive">
        {{-- <div class="d-flex mb-3"><select class="form-select fmxw-200" aria-label="Message select example">
            <option selected="selected">Bulk Action</option>
            <option value="1">Send Email</option>
            <option value="2">Change Group</option>
            <option value="3">Delete User</option>
        </select> <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button></div> --}}
        <table class="table user-table table-hover align-items-center">
            <thead>
                <tr>
                    <th class="border-bottom">
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
                                id="userCheck55"> <label class="form-check-label" for="userCheck55"></label></div>
                    </th>
                    <th class="border-bottom">Name</th>
                    <th class="border-bottom">Date Created</th>
                    <th class="border-bottom">Verified</th>
                    <th class="border-bottom">Status</th>
                    <th class="border-bottom">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
                                id="userCheck1"> <label class="form-check-label" for="userCheck1"></label></div>
                    </td>
                    <td><a href="users.html#" class="d-flex align-items-center">
                            {{-- <img src="../assets/img/team/profile-picture-1.jpg" class="avatar rounded-circle me-3"
                            alt="Avatar"> --}}
                            <div class="d-block"><span class="fw-bold">Roy Fendley</span>
                                <div class="small text-gray"><span class="__cf_email__"
                                        data-cfemail="dbb2b5bdb49bbea3bab6abb7bef5b8b4b6">[email&#160;protected]</span>
                                </div>
                            </div>
                        </a></td>
                    <td><span class="fw-normal">10 Feb 2020</span></td>
                    <td><span class="fw-normal d-flex align-items-center"><svg class="icon icon-xxs text-success me-1"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg> Email</span></td>
                    <td><span class="fw-normal text-success">Active</span></td>
                    <td>
                        <div class="btn-group"><button
                                class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg> <span class="visually-hidden">Toggle Dropdown</span></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="users.html#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                            clip-rule="evenodd"></path>
                                    </svg> Reset Pass </a><a class="dropdown-item d-flex align-items-center"
                                    href="users.html#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> View Details </a><a class="dropdown-item d-flex align-items-center"
                                    href="users.html#"><svg class="dropdown-icon text-danger me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z">
                                        </path>
                                    </svg> Suspend</a></div>
                        </div><svg class="icon icon-xs text-danger ms-1" title="Delete" data-bs-toggle="tooltip"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
                                id="userCheck2"> <label class="form-check-label" for="userCheck2"></label></div>
                    </td>
                    <td><a href="users.html#" class="d-flex align-items-center">
                            <div
                                class="avatar d-flex align-items-center justify-content-center fw-bold rounded bg-secondary me-3">
                                <span>SA</span>
                            </div>
                            <div class="d-block"><span class="fw-bold">Scott Anderson</span>
                                <div class="small text-gray"><span class="__cf_email__"
                                        data-cfemail="9af3f4fcf5daffe2fbf7eaf6ffb4f9f5f7">[email&#160;protected]</span>
                                </div>
                            </div>
                        </a></td>
                    <td><span class="fw-normal">10 Feb 2020</span></td>
                    <td><span class="fw-normal d-flex align-items-center"><svg class="icon icon-xxs text-success me-1"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg> Email</span></td>
                    <td><span class="fw-normal text-success">Active</span></td>
                    <td>
                        <div class="btn-group"><button
                                class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg> <span class="visually-hidden">Toggle Dropdown</span></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="users.html#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                            clip-rule="evenodd"></path>
                                    </svg> Reset Pass </a><a class="dropdown-item d-flex align-items-center"
                                    href="users.html#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> View Details </a><a class="dropdown-item d-flex align-items-center"
                                    href="users.html#"><svg class="dropdown-icon text-danger me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z">
                                        </path>
                                    </svg> Suspend</a></div>
                        </div><svg class="icon icon-xs text-danger ms-1" title="Delete" data-bs-toggle="tooltip"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
                                id="userCheck3"> <label class="form-check-label" for="userCheck3"></label></div>
                    </td>
                    <td><a href="users.html#" class="d-flex align-items-center">
                            {{-- <img src="../assets/img/team/profile-picture-2.jpg" class="avatar rounded-circle me-3"
                                alt="Avatar"> --}}
                            <div class="d-block"><span class="fw-bold">George Driskell</span>
                                <div class="small text-gray"><span class="__cf_email__"
                                        data-cfemail="9bf2f5fdf4dbfee3faf6ebf7feb5f8f4f6">[email&#160;protected]</span>
                                </div>
                            </div>
                        </a></td>
                    <td><span class="fw-normal">10 Feb 2020</span></td>
                    <td><span class="fw-normal d-flex align-items-center"><svg class="icon icon-xxs text-success me-1"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg> Email</span></td>
                    <td><span class="fw-normal text-success">Active</span></td>
                    <td>
                        <div class="btn-group"><button
                                class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg> <span class="visually-hidden">Toggle Dropdown</span></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="users.html#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                            clip-rule="evenodd"></path>
                                    </svg> Reset Pass </a><a class="dropdown-item d-flex align-items-center"
                                    href="users.html#"><svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> View Details </a><a class="dropdown-item d-flex align-items-center"
                                    href="users.html#"><svg class="dropdown-icon text-danger me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z">
                                        </path>
                                    </svg> Suspend</a></div>
                        </div><svg class="icon icon-xs text-danger ms-1" title="Delete" data-bs-toggle="tooltip"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
                                id="userCheck4"> <label class="form-check-label" for="userCheck4"></label></div>
                    </td>
                    <td><a href="users.html#" class="d-flex align-items-center">
                            {{-- <img src="../assets/img/team/profile-picture-3.jpg" class="avatar rounded-circle me-3"
                            alt="Avatar"> --}}
                            <div class="d-block"><span class="fw-bold">Bonnie Green</span>
                                <div class="small text-gray"><span class="__cf_email__"
                                        data-cfemail="1a73747c755a7f627b776a767f34797577">[email&#160;protected]</span>
                                </div>
                            </div>
                        </a></td>
                    <td><span class="fw-normal">10 Feb 2020</span></td>
                    <td><span class="fw-normal d-flex align-items-center"><svg class="icon icon-xxs text-success me-1"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg> Email</span></td>
                    <td><span class="fw-normal text-success">Active</span></td>
                    <td>
                        <div class="btn-group"><button
                                class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg> <span class="visually-hidden">Toggle Dropdown</span></button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                    class="dropdown-item d-flex align-items-center" href="users.html#"><svg
                                        class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                            clip-rule="evenodd"></path>
                                    </svg> Reset Pass </a><a class="dropdown-item d-flex align-items-center"
                                    href="users.html#"><svg class="dropdown-icon text-gray-400 me-2"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> View Details </a><a class="dropdown-item d-flex align-items-center"
                                    href="users.html#"><svg class="dropdown-icon text-danger me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z">
                                        </path>
                                    </svg> Suspend</a></div>
                        </div><svg class="icon icon-xs text-danger ms-1" title="Delete" data-bs-toggle="tooltip"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </td>
                </tr>


            </tbody>
        </table>
        <div
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
            <div class="fw-normal small mt-4 mt-lg-0">Showing <b>5</b> out of <b>25</b> entries</div>
        </div>
    </div>
</div>
