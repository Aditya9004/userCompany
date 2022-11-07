@extends('layout.header')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-4">{{$title}}</h3>
        </div>
        <div class="card-body">
            <form action="/usercompany/create/{{$company->id}}" method="POST">
                {!! csrf_field() !!}
                @foreach ($users as $user)
                @php $checked = $user->userCompany->where('company_id',1)->isEmpty() ? '' : 'checked'  @endphp
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="user.{{$user->id}}" name="user[{{$user->id}}]" {{$checked}}>
                    <label class="form-check-label" for="user.{{$user->id}}">
                        {{$user->name}}
                    </label>
                </div>
                @endforeach

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