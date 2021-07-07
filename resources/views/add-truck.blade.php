<title>Truck Institute - Add Truck</title>
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
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- basic table  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Basic Form</h5>
                                    <div class="card-body">
                                        <form action="/add_truck" method="POST" id="basicform" data-parsley-validate="" novalidate="">
                                            @csrf
                                            <div class="form-group">
                                                <label for="inputTov">Type of Vehicle</label>
                                                <input id="inputTov" type="text" name="type_of_vec" data-parsley-trigger="change" placeholder="Enter Type of Vehicle" autocomplete="off" class="form-control">
                                                <p class="error">{{ $errors->first('type_of_vec') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCn">Classic Number</label>
                                                <input id="inputCn" type="number" name="classic_no" data-parsley-trigger="change" placeholder="Enter Classic Number" autocomplete="off" class="form-control">
                                                <p class="error">{{ $errors->first('classic_no') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDest">Destination</label>
                                                <input id="inputDest" type="text" placeholder="Enter Destination" name="destination" class="form-control">
                                                <p class="error">{{ $errors->first('destination') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="inpuInfo">Information</label>
                                                <input id="inpuInfo" data-parsley-equalto="#inputInfo" type="text" name="information" placeholder="Enter Information" class="form-control">
                                                <p class="error">{{ $errors->first('information') }}</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                    <label class="be-checkbox custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                    </label>
                                                </div>
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                        <button class="btn btn-space btn-secondary">Cancel</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end basic table  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
    @include('/includes.footer')