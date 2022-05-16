@extends('layout')

@section('head')

<title>Crow Cottage Arts | Admin</title>

@endsection

@section('content')
<h1 class="title has-text-centered has-text-weight-bold has-text-grey-darker is-size-3 pt-3 mb-6 mt-6">Create a Product</h1>


<div class="columns is-centered mt-3">
    <div class="column is-half">
      
        <form method="post" action="{{route('product_store')}}" enctype='multipart/form-data'>
          
          @csrf

          <div class="field">
            <label class="label">Title</label>
            <div class="control">
              <input class="input" type="text" placeholder="Title..." name="title">
            </div>
          </div>
          
          <div class="field">
            <label class="label">Description</label>
            <div class="control">
              <textarea class="textarea" placeholder="Description..." name="desc"></textarea>
            </div>
          </div>

          <div class="field has-addons">
            <div class="button is-info is-static control"><strong>£</strong></div>
            <div class="control">
              <input class="input" placeholder="Product Price..." name="price">
            </div>
          </div>

          <div class="field">
            <label class="label">Thumbnail Image</label>
            <div class="control">
              <input name="thumbnail_img" type="file"> 
            </div>
          </div><br>

          <div class="field">
            <label class="label">Secondary Image</label>
            <div class="control">
              <input name="secondary_img" type="file"> 
            </div>
          </div><br>

          <div class="field">
            <label class="label">Video Walkthrough URL</label>
            <div class="control">
                <input class="input" type="text" name="url" placeholder="Leave blank for no video">
            </div>
          </div><br>
          
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-secondary">Create Product</button>
            </div>
          </div>

        </form>
    </div>
</div>
@endsection