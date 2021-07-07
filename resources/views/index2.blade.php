<title>Truck Institute - Dashboard</title>
@include('/includes.header')
<style>
    .nav-item{
        margin-bottom: 5px;
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                            <li class="nav-item">
                                <div id="custom-search" class="top-search-bar">
                                    <form action="/search_query">
                                        <input class="form-control" name="query" type="text" placeholder="Search..">
                                    </form>
                                </div>
                            </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        @include('/includes.nav');
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Truck Dashboard</h2>
                                <p class="pageheader-text">Truck</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center remove">Created Successfully!</div>
                    @endif
                    @if (session()->has('editSuccess'))
                        <div class="alert alert-success text-center remove">Edited Successfully!</div>
                    @endif
                    @if (session()->has('deleteSuccess'))
                        <div class="alert alert-success text-center remove">Deleted Successfully!</div>
                    @endif
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- basic table  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Trucks Table</h5>
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
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($trucks == null)
                                                        @else
                                                        @foreach($trucks as $key => $truck)
                                                        <tr>
                                                            <td>{{ $key }}</td>
                                                            <td>{{ $truck->type_of_vec}}</td>
                                                            <td>{{ $truck->classic_no}}</td>
                                                            <td>{{ $truck->destination}}</td>
                                                            <td>{{ $truck->information}}</td>
                                                            @if ($truck->user_id == Auth::user()->id)
                                                                <td>
                                                                    <button class="btn btn-success" data-toggle="modal" data-target="#editTruck{{ $truck->id }}"><i class="fas fa-edit"></i> Edit</button> 
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteTruck{{ $truck->id }}"><i class="fas fa-trash"></i> Delete</button> 
                                                                </td>
                                                                @else
                                                                <td>This wasn't added by you</td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- ============================================================== -->
                                <!-- modal  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <!-- Modal -->
                                        @foreach ($trucks as $truck)
                                            <div class="modal fade" id="editTruck{{ $truck->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="/edit_truck/{{ $truck->id }}" method="POST" id="basicform"  style="margin: 0;">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Edit Truck</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="inputTov">Type of Vehicle</label>
                                                                    <input id="inputTov" type="text" name="type_of_vec" required value="{{ $truck->type_of_vec }}" placeholder="Enter Type of Vehicle" class="form-control">
                                                                    <p class="error">{{ $errors->first('type_of_vec') }}</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputCn">Classic Number</label>
                                                                    <input id="inputCn" type="number" name="classic_no" required value="{{ $truck->classic_no }}" placeholder="Enter Classic Number" class="form-control">
                                                                    <p class="error">{{ $errors->first('classic_no') }}</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputDest">Destination</label>
                                                                    <input id="inputDest" type="text" value="{{ $truck->destination }}" required placeholder="Enter Destination" name="destination" class="form-control">
                                                                    <p class="error">{{ $errors->first('destination') }}</p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inpuInfo">Information</label>
                                                                    <input id="inpuInfo" data-parsley-equalto="#inputInfo" type="text" required name="information" value="{{ $truck->information }}" placeholder="Enter Information" class="form-control">
                                                                    <p class="error">{{ $errors->first('information') }}</p>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                
                                                                    <button type="submit" href="#" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- modal  -->
                                <!-- ============================================================== -->
                                <div class="row">
                                    <!-- ============================================================== -->
                                    <!-- modal  -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            @foreach ($trucks as $truck)
                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteTruck{{ $truck->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Woohoo, You are readng this text in a modal! Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close/No</a>
                                                                <form action="/delete_truck/{{ $truck->id }}" method="POST" style="margin: 0;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" href="#" class="btn btn-primary">Yes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- modal  -->
                                    <!-- ============================================================== -->
                            </div>
                            <!-- ============================================================== -->
                            <!-- end basic table  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
    @include('/includes.footer')