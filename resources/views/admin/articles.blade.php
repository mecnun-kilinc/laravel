@extends('admin.layout')
@section('content')
<main>
  <div class="container">
    <div class="row">

        <div class="mb-2">
            <div class="container-fluid">
              <button type="button" form="form-article" formaction="{{ url('admin/article/delete') }}" data-toggle="tooltip" title="Delete" class="btn btn-danger float-end" onclick="confirm('Are you sure') ? $('#form-article').submit() : false;">Delete</button>
             </div>
             <br>
       </div>


       @if(session()->has('message'))
       <div class="mb-2">
        <div class="container-fluid">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
           {{ session()->get('message') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        </div>
       </div>
       @endif





      <div class="panel panel-primary">
     <div class="panel-body">
        <div class="container-fluid">
         <form action="{{ url('admin/article/delete') }}" method="post" id="form-article" enctype="multipart/form-data">
           @csrf
            <div class="table-responsive">
        <table class="table table-bordered table-hover">
        <thead>
        <th class="text-muted"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></th>
        <th class="text-muted">Id</th>
        <th class="text-muted">Image</th>
        <th class="text-muted">Name</th>
        <th class="text-muted">Action</th>
        </thead>
        <tbody>
        @foreach ($results as $result)
          <tr>
                <td width="1px"><input type="checkbox" name="selected[]" value="{{ $result->id }}" /></td>
                <td>{{$result->id}}</td>
                <td width="40px"><img src="{{ asset('/images/articles/'. $result->photo) }}" height="36px" class="img-responsive" /></td>
                <td>{{$result->name}}</td>

                <td width="5px"><a href="article/edit/{{ $result->id }}" class="btn btn-sm btn-primary">Edit</a></td>
              </tr>
        @endforeach
        </tbody>
      </table>
     </form>
     </div>
    </div>

       <div class="container-fluid">
            {{ $results->withQueryString()->links('pagination::bootstrap-5') }}
        </div>


        </div>
        </div>
    </div>

    </main>


@endsection
