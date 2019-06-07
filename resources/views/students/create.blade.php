@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
    @include('commons.errors')
    <form class="form-group" method="POST" action="/students" enctype="multipart/form-data">
        @include('students.form')

        <button class="btn btn-primary" type="submit">Save</button>
    </form>

@endsection


