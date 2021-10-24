@extends('layout')

@section('head')

@endsection

@section('content')

<div class="columns is-centered mt-6">
    <div class="column is-8">
        <div class="columns">
            <div class="column is-4">
                <h1 class="has-text-weight-medium has-text-grey-darker is-size-5 pt-3 mb-3">Alec Galloway</h1>

                <p class="has-text-justified is-size-5 has-text-weight-light">Alec Galloway is a Scottish stained glass artist and painter based in Inverclyde on the West coast of Scotland.

                    His glass work falls into a range of specialisms including; commercial projects, restoration of traditional glass and contemporary gallery based pieces.</p>
            </div>
            <div class="column pt-5">
                <img src="img/alec.jpg" alt="Alec Galloway" style="width:90%">
            </div>
        </div>
    </div>
</div>

{{-- Examples of work in carousel --}}



<div class="columns is-centered">
    <div class="column is-8">
        <h1 class="title has-text-weight-semibold has-text-grey-darker is-size-3 pt-3 mb-6 mt-6">Projects</h1>

        <div class="columns">
            <div class="column is-one-third">
              <a href="axis.html">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="img/projects/axis.jpg" alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <p class="card-title has-text-weight-semibold">Axis</p> 
                    <p class="card-description">Axis is an ongoing project that focuses on the study of iconic british guitars</p>
                    
                    <p class="card-date">Jan 2014 - Present</p>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <div class="column is-one-third">
              <a href="absent.html">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="img/projects/absent.jpg" alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <p class="card-title has-text-weight-semibold">Absent Voices</p> 
                    <p class="card-description">Focusing on the legacy of Inverclyde’s sugar history and heritage</p>
                    
                    <p class="card-date">Dec 2017 - Feb 2018</p>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <div class="column is-one-third">
                <a href="chair.html">
                  <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by3">
                        <img src="img/projects/chair.jpg" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="content">
                        <p class="card-title has-text-weight-semibold">Art Chair</p> 
                        <p class="card-description">Bringing together creatives to create work from the viewpoint of the 'Art Chair'</p>
                        
                        <p class="card-date">March 2012 - July 2014</p>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </a>
        </div>
    </div>
</div>
</div>


@endsection