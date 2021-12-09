@extends('layout')

@section('head')

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
        <h1 class="underlined is-size-3 mb-5">Classes</h1>
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

<form action="">
    <input type="date" class="art-bar">
</form>

<script>
    
</script>

@endsection