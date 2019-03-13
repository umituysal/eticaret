@extends('layouts.front.fmaster')
@section('title',$data[0]->Title)


@section('description',$data[0]->Description)


@section('keywords',$data[0]->Keywords)


@section('slider')
    @include('front.slider')
@endsection
@section('content')
 @include('front.content')
    @endsection