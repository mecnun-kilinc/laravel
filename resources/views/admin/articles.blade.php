@extends('admin.layout')
@section('content')
<main>

    <div class="container">
    <div class="row">
        <table class="table table-bordered">
        <thead>
        <th class="text-muted">#</th>
        <th class="text-muted">Id</th>
        <th class="text-muted">Image</th>
        <th class="text-muted">Name</th>
        <th class="text-muted">Delete</th>
        <th class="text-muted">Action</th>
        </thead>
        <tbody>
        @foreach ($results as $result)
          <tr>
                <td width="1px"><input type="checkbox"></td>
                <td>{{$result->id}}</td>
                <td width="40px"><img src="{{ asset('/images/articles/'. $result->photo) }}" height="36px" class="img-responsive" /></td>
                <td>{{$result->name}}</td>
                <td width="5px"><a href="article/delete/{{ $result->id }}" class="btn btn-sm btn-danger">Delete</a></td>
                <td width="5px"><a href="article/edit/{{ $result->id }}" class="btn btn-sm btn-primary">Edit</a></td>
              </tr>
        @endforeach
    </tbody>
    </table>

    <div class="container-fluid">

            {{ $results->withQueryString()->links('pagination::bootstrap-5') }}

        </div>


    </div>



    </main>

@endsection
