@extends('layout')

@section('head')

<link rel="stylesheet" href="../../css/slideshow.css">

<style>
    .axis{
        background-image: url("img/projects/axis.jpg");
    }

    .absent{
        background-image: url("img/projects/absent.jpg");
    }

    .chair{
        background-image: url("img/projects/chair.jpg");
    }
</style>

@endsection

@section('content')

<div class="columns is-centered mt-6">
    <div class="column is-8">
        <h1 class="underlined is-size-3 mb-5">Hire For Events</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique suscipit in delectus voluptatibus dolorum libero illo excepturi voluptatem, voluptates rerum hic. Architecto, rerum accusantium sint cum repellat numquam at quibusdam.</p>
        <br>
        <p>Features include:</p>
        <ul type="disc" style="color:black">
            <li>&nbsp;&nbsp;&#8226;&nbsp;blah</li>
            <li>&nbsp;&nbsp;&#8226;&nbsp;blah</li>
            <li>&nbsp;&nbsp;&#8226;&nbsp;blah</li>
        </ul>
        <br>
    </div>
</div>

<div class="columns is-centered">
    <div class="column is-8">
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
        <p>To hire this space, get in contact with us via our contact form <a href="{{route('contact_create')}}">here</a></p>
    </div>
</div>

@endsection