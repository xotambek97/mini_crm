@extends('admin.master')

@section('title','Admin Employes')

@section('content')



    <div class="container">

        <a href="{{route('admin.employes.create')}}" class="btn btn-primary" role="button">Create new Employe</a><br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            ?>
            @foreach($employes as $employe)
                <tr>
                    <th scope="row">{{++$i}}</th>

                    <td>{{$employe->firstname}}</td>
                    <td>{{$employe->lastname}}</td>
                    <td>{{$employe->company->name}}</td>
                    <td>{{$employe->email}}</td>
                    <td>{{$employe->phone}}</td>

                    <td><div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Settings
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item text-center"  href="{{route('admin.employes.edit',['id'=>$employe->id])}}">Edit</a>
                                <form action="{{route('admin.employes.destroy',['id'=>$employe->id])}}" method="post">
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
                {{ $employes->links() }}
</div>


    </div>
@endsection