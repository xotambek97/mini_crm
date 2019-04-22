
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
                            <h2 class="text-center text-primary">Update Company</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{route('admin.companies.update',['id'=>$company->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$company->name}}" id="name">
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$company->email}}" id="name">
                                    </div>
                                </div><div class="col-md-6">
                                    <img style="width:40%" src="{{asset('storage/app/public/'.$company->image)}}">
                                    <div class="form-group">
                                        <label for="name">Company Logo</label>
                                        <br>
                                        <input type="file" name="image"  id="name">
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Company website</label>
                                        <input type="text" class="form-control" name="website"  value="{{$company->website}}" id="name">
                                    </div>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary btn-block">Update Company</button>
                            <br><br>
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