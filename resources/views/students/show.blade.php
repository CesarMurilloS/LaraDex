@extends('layouts.app')

@section('title', 'Show Student')

@section('content')
@include('commons.success')

<div class="card">
    <img class="card-img-qtop" src="/images/{{ $student->avatar }}" style="height:300px;width:auto;" alt="Card image cap">

    <div class="card-body">

        <h5 class="card-title">{{ $student->name }}</h5>
        <h1>{{ $student->slug }}</h1>
        <p>{{ $student->description }}</p>

        <a href="/students/{{ $student->slug }}/edit" class="btn btn-primary">Edit Profile</a>

        <form class="form-group" method="POST" action="/students/{{$student->slug}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>

    </div>
</div>
@endsection


