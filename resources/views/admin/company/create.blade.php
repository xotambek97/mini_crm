@extends('admin.master')

@section('title','Admin table')

@section('content')


    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Company</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                           <h2 class="text-center text-primary">Create New Company</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{route('admin.companies.store')}}" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>

                                </div><div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company Email</label>
                                        <input type="email" class="form-control" name="email" id="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company Logo</label>
                                        <br>
                                        <input type="file"  name="image" id="name">
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company website</label>
                                        <input type="text" class="form-control" name="website" id="name">
                                    </div>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary">Add Company</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

            <p class="small text-center text-muted my-5">
                <em>More table examples coming soon...</em>
            </p>

        </div>

@endsection