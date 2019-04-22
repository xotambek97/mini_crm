@extends('admin.master')

@section('title','Admin Companies')

@section('content')



    <div class="container">

        <a href="{{route('admin.companies.create')}}" class="btn btn-primary" role="button">Create new Company</a><br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">Company Name</th>
                <th scope="col">Email</th>
                <th scope="col">Website</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            ?>
            @foreach($companies as $company)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td width="25%"><img style="width:40%" src="{{ asset('storage/app/public/'.$company->image)}}"></td>           
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td><a href="http://{{$company->website}}">{{$company->website}}</a></td>
                <td><div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Settings
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item text-center"  href="{{route('admin.companies.edit',['id'=>$company->id])}}">Edit</a>
                            <form action="{{route('admin.companies.destroy',['id'=>$company->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <p class="text-center"><button class="dropdown-item btn btn-danger" type="submit" >Delete</button></p>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

        {{$companies->links()}}
    </div>
@endsection