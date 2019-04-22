@extends('admin.master')

@section('title','Admin')

@section('content')

 <div class="container">
     <table class="table table-bordered">
         <thead>
         <tr>
             <th scope="col">#</th>
             <th scope="col">Username</th>
             <th scope="col">Email</th>
         </tr>
         </thead>
         <tbody>
         <?php
         $i = 0;
         ?>
         @foreach(App\User::all() as $user)
         <tr>
             <th scope="row">{{++$i}}</th>
             <td>{{$user->name}}</td>
             <td>{{$user->email}}</td>

         </tr>
        @endforeach
         </tbody>
     </table>
 </div>

@endsection