<nav id="sidebar" class="img" style="background-image: url(images/bg_1.jpg);">
    <div class="p-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-outline" data-mdb-input-init>
                        <input type="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" />
                    </div>
                </div>

            </div>
        </div>
        <br>

        <div class="p-3 mb-5 rounded shadow cardCust bg-body" style="width: 18rem;">
            <h6 class="mb-2 card-subtitle text-muted">Activities</h6>
            <ul class="mb-auto nav nav-pills flex-column ">
                <li class="nav-item">
                    <a href="{{route("dashboard")}}" class="nav-link link-dark" aria-current="page">
                        <i class="bi bi-house"> </i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link link-dark" aria-current="page">
                        <i class="bi bi-card-checklist"> </i>
                        <span>Payments</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="nav-link link-dark" data-bs-toggle="modal" data-bs-target="#new_property"
                        type="button">
                        <i class="bi bi-house-add"></i>
                        New Property
                    </a>

                    @include('properties.create')

                </li>
            </ul>
            <br>
            <br>
            <br>
            <h6 class="mb-2 card-subtitle text-muted">Modules</h6>
            <ul class="mb-auto nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="{{route("reports.index")}}" class="nav-link link-dark" aria-current="page">
                        <i class="bi bi-bar-chart-steps"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="{{route("transactions.index")}}" class="nav-link link-dark">
                        <i class="fa fa-university" aria-hidden="true"></i>
                        Transaction Reports
                    </a>
                </li>
                <li>
                    <a href="{{route("penalties.index")}}" class="nav-link link-dark">
                        <i class="bi bi-calculator"></i>
                        Penalties Management
                    </a>
                </li>
                @if(auth()->user()->user_role == 'Super_Admin')

                <li>
                    <a href="{{route("users.index")}}" class="nav-link link-dark">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        User Management
                    </a>
                </li>
                @endif
            </ul>

            <br>
            <br>
            <br> <br>
            <br>
            <br> <br>
            <br>
            <br>
            <div class="footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <a class="link-secondary" :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
