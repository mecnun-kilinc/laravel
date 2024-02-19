@extends('catalog.layout')

@section('content')
<h3 class="text-center"><span class="badge text-bg-warning">{{  $results->total()  }} </span> records were found related to your search results.</h3>
<main>
<div class="album py-5">
<div class="container">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-2">
    @foreach ($results as $result)

        <div class="col">
            <div class="card shadow-sm">
             <img src="{{ asset('/images/articles/'. $result->photo) }}" class="img-responsive" />
              <div class="card-body">
                <p>{{ substr($result->description,0,80)}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{$result->name}}</small>
                     <div class="btn-group">
                    <a href="article/{{ $result->seourl ? $result->seourl : $result->id }}" class="btn btn-sm btn-primary"><i class="bi bi-three-dots"></i></a>
                  </div>

                </div>
              </div>
            </div>
          </div>

    @endforeach
</div>
</div>
</div>
{{ $results->withQueryString()->links('pagination::bootstrap-5') }}
</main>
@endsection
