@extends('layout.header')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-4">{{$title}}</h3>
        </div>

        <div class="card-body">
            <form action="/company/create" method="POST">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Company Name :</label>
                    <div class="col-sm-10">
                        <input type="text" id = "name" class = "form-control" name="name" placeholder = "Enter Company Name">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2" style="text-align:right;">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                    <div class="col-sm-2">
                    <a href="/companies/list" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection