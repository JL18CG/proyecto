@extends('Panel.master')
@section('content')

<form action="{{route("user.store")}}" method="POST">
@include('Panel.user._form')
</form>
@endsection
