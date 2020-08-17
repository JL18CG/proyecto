@extends('panel.main')
@section('content')

<form action="{{route("user.store")}}" method="POST">
@include('panel.user._form')
</form>
@endsection
