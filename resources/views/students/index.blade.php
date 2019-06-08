@extends('layouts.app')

@section('title', 'Students Create')

@section('content')
    <div class="row">

        @foreach($students as $student)

        <div class="col-12 col-sm-6 col-md-4 my-2">

            <div class="card">
                <img class="card-img-top" src="/images/{{ $student->avatar }}" style="height:100px;width:auto;" alt="Card image cap">

                <div class="card-body">

                    <h5 class="card-title">{{ $student->name }}</h5>
                    <p>{{ $student->description }}</p>

                    <a href="/students/{{ $student->slug }}" class="btn btn-primary">View Profile</a>

                </div>
            </div>

        </div>

        @endforeach

    </div>
@endsection


