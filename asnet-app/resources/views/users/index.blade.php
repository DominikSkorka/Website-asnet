@extends('layouts.app')

@section('content')
    <div class="container">   Lista użytkowników
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Imie</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Numer telefonu</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->email}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->phone_number}}</td>
            <td>
                <button class="btn btn-danger btn-sm" data-id="{{$user->id}}">
                    X
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        {{$users->Links()}}
        </div>
@endsection

@section('javascript')
        $(function(){
            $('.delete').click(function() {
                $.ajax({
                            method: "DELETE",
                            url: "http://asnet.test/users/" + $(this).data("id")
                }) 
                .done(function(response){
                  window.location.reload();  
                })
                .fail(function(response){
                      alert("ERROR");  
                });
            });
        });
@endsection
