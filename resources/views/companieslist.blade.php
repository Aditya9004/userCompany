@extends('layout.header')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-4">{{$title}}</h3>
            <a href="/company/add" class="btn btn-success mb-4">Add Company</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">      
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Add Users</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$company->name}}</td>
                                <td><a href = "/company/addUser/{{$company->id}}" class="btn btn-sm btn-primary" style="color:white;">Add Users</a></td>
                                <td>
                                    <a href = "/company/edit/{{$company->id}}" class="btn btn-sm btn-warning" style="color:white;">Edit</a>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger" onclick="deleteCompany('{{$company->id}}')">Delete</button>
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
    function deleteCompany(id) {
        if(confirm('Are you sure you want to delete this company')) {
            $.ajax({
                    url: '/company/delete',
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