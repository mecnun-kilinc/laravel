@extends('catalog.layout')

@section('content')

<div class="container">


      <div class="row">
        <div class="col-12">
            <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="bi bi-arrow-return-left"></i> Back</a>
        </div>

      </div>

 <br>

      <div class="row align-items-md-stretch">

        <div class="col-md-5">
            <div class="h-100 p-5 bg-light border rounded-3">
            <img src="{{ asset('/images/'. $result->photo) }}" class="img-fluid" />
         </div>
       </div>

        <div class="col-md-7">
           <div class="h-100 p-5 bg-light border rounded-3">
            <h3><span class="badge text-bg-warning"> {{  $result->name  }} </span></h3><hr>
            <p>Article {{ $result->id }}</p>
            <p>{{ substr($result->description,0,80)}}</p>
            <small class="text-muted">{{$result->name}}</small>
            <small class="text-muted">{{ $result->seo_url }}</small>
            <hr />
            <div class="btn-group g-3">
                <button class="btn btn-warning">{{ $result->date_added }}</button>
           </div>
            <div class="btn-group g-3">
                <button class="btn btn-primary">{{ $result->date_modified }}</button>
           </div>
      </div>

    </div>
<br>

      <div class="row align-items-md-stretch">
        <div class="col-md-5">
          <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2>Change the background</h2>
            <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
            <button class="btn btn-outline-light" type="button">Example button</button>
          </div>
        </div>
        <div class="col-md-7">
          <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
          </div>
        </div>
      </div>

<br>

    </div>


@endsection
