@extends('layout')

@section('head')

<title>Crow Cottage Arts | Admin</title>

@endsection

@section('content')

<a href="{{route('admin_products')}}">Products</a> <br>

<a href="{{route('admin_classes')}}">Classes</a> <br>

<a href="{{route('admin_orders')}}">Orders</a>

@endsection