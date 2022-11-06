@extends('layout.header')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-4">{{$title}}</h3>
            <a href="/user/add" class="btn btn-success mb-4">Add User</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">      
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    <a href = "/user/edit/{{$user->id}}" class="btn btn-sm btn-warning" style="color:white;">Edit</a>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger" onclick="deleteUser('{{$user->id}}')">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layout.modal')
    
@endsection

@section('custom-js')
    function deleteUser(id) {
        if(confirm('Are you sure you want to delete this user')) {
            $.ajax({
                    url: '/user/delete',
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", id},
                    dataType: 'JSON',
                    success: function (data) { 
                        alert(data.message);
                        if(!data.success) {
                            return false;
                        }
                        window.location.reload();
                         
                    }
            }); 
        }
    }
@endsection