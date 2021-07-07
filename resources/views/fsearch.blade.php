@include('/includes.header')
<style>
    .mbs{
        background: #0e0c28;
        color: #fff;
        margin-right: 9%;
    }
    .mbsd{
        background: #0e0c28;
        padding: 15px;
        color: #fff;
    }
</style>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/">Concept</a>
                <button aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarSupportedContent" data-target="#navbarSupportedContent" data-toggle="collapse" type="button" class="navbar-toggler collapsed mbs">
                    <span class="navbar-toggler-icon fas fa-ellipsis-v" style="margin-top: 6px;"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <form action="/search">
                                    <input class="form-control" name="query" type="text" placeholder="Search..">
                                </form>
                            </div>
                        </li>
                        <li class="nav-item mbsd">
                            <a class="dropdown-item" href="/pages_login" style="color: #fff;">
                                <i class="fas fa-user mr-2"></i>Login
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        {{-- @include('/includes.nav'); --}}
       
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="r">
            <div class="dashboard-ecommerce">
                <div class="row c2">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Basic Table</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>No:</th>
                                            <th>Type of Vehicle</th>
                                            <th>Classic Number</th>
                                            <th>Destination</th>
                                            <th>Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data == null)
                                            @else
                                            @foreach($data as $key => $truck)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $truck->type_of_vec}}</td>
                                                <td>{{ $truck->classic_no}}</td>
                                                <td>{{ $truck->destination}}</td>
                                                <td>{{ $truck->information}}</td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
            </div>
            </div>

    @include('/includes.footer')