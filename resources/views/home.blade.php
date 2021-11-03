@extends('layout')

@section('head')

<link rel="stylesheet" href="../../css/slideshow.css"> 
<x-embed-styles />

@endsection

@section('content')

<div class="columns is-centered">
    <div class="column is-12">
        <div class="slideshow-container">

            <div class="mySlides fade background-image chair">
                <div class="numbertext">1 / 3</div>
                <div class="text"></div>
            </div>
        
            <div class="mySlides fade background-image absent">
                <div class="numbertext">2 / 3</div>
                <div class="text"></div>
            </div>
        
            <div class="hero mySlides fade background-image axis">
                <div class="numbertext">3 / 3</div>
                <div class="text"></div>
            </div>
        
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
    </div>
</div>

<div class="columns is-centered">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="title is-size-4">Welcome to Crow Cottage Arts</h1>
        <p class="is-size-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores ipsam et, corporis eligendi rerum esse deleniti soluta veritatis perspiciatis similique voluptate placeat debitis nostrum numquam omnis tenetur excepturi nobis ad.</p>  
    </div>
</div>

<div class="columns is-centered">
    <div class="column is-7">
        <div class="mt-6" id="vidbox">
            <x-embed url="https://www.youtube.com/watch?v=xoODq7Ol1so"/>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="title is-size-4">Incorperating Alec Galloway Stained Glass</h1><br>
        <p>Images side by side</p>
        <p class="is-size-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores ipsam et, corporis eligendi rerum esse deleniti soluta veritatis perspiciatis similique voluptate placeat debitis nostrum numquam omnis tenetur excepturi nobis ad.</p>
    </div>
</div>

<div class="columns is-centered mt-5">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="title is-size-5 has-text-centered">For Sale</h1><br>
        <p class="is-size-5">Carousel of sale items size 9/10</p>
    </div>
</div>

<div class="columns is-centered mt-5">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="title is-size-5 has-text-centered">Hire Our Shop</h1><br>
        <p class="is-size-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, distinctio?</p>
    </div>
</div>



@endsection