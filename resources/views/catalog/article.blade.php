@extends('catalog.layout')

@section('content')

<h3 class="text-center"><span class="badge text-bg-warning"> {{  $result->name  }} </span></h3>
<p>Article {{ $result->id }}</p>
<div class="text-center"><a href="{{ url()->previous() }}" class="btn btn-primary">Back</a></div>
<br>
<main>


<div class="container">
    <img src="{{ asset('/images/'. $result->photo) }}" class="img-responsive" />

            <div class="card">

              <div class="card-body">
                <p>{{ substr($result->description,0,80)}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{$result->name}}</small>


                </div>
              </div>
            </div>



</div>


</main>

@endsection
