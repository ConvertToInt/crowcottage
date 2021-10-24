@extends('layout')

@section('head')

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

<p>blurb</p>
<p>incorperates alecgalloway stained glass</p>
<p>shop</p>

@endsection