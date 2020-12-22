@extends('layouts.master')
@section('title')
  BRV - Error
@endsection
@section('content')
<h2>{{ $exception->getMessage() }}</h2>
@endsection