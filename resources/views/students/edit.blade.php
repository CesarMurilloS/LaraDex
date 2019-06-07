@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')

@include('commons.errors')

<form class="form-group" method="POST" action="/students/{{ $student->slug }}" enctype="multipart/form-data">
    <div class="card">
        <img class="card-img-top" src="/images/{{ $student->avatar }}" style="height:300px;width:auto;"
            alt="Card image cap">

        <div class="card-body">

            @method('PUT')
            @csrf

            @include('students.form')

            <button class="btn btn-primary" type="submit">Edit</button>
        </div>
    </div>
</form>

@endsection


