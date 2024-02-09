@extends('catalog.layout')

@section('content')

  <h1 class="text-3xl font-bold underline">
   <p class="text-center">Search Results</p>

   <main>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
    @foreach ($results as $result)

        <div class="col">
            <div class="card shadow-sm">
             <img src="{{ asset('public/images/'. $result->photo) }}" class="img-responsive" />
              <div class="card-body">
                <p>{{$result->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </div>
                  <small class="text-muted">{{$result->name}}</small>
                </div>
              </div>
            </div>
          </div>

    @endforeach

    </div>
  </main>

@endsection
