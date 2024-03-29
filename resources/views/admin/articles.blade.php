@extends('admin.layout')
@section('content')
<main>
  <div class="container">
    <div class="row">


        <div class="mb-2">
            <div class="container-fluid">
             <div class="btn-group  gap-1 float-end" role="group"">
              <a href="{{ url('panel/article/add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
              <button type="button" form="form-article" formaction="{{ url('panel/article/delete') }}" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure') ? $('#form-article').submit() : false;"><i class="fa fa-trash"></i> Delete</button>
            </div>
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
         <form action="{{ url('panel/article/delete') }}" method="post" id="form-article" enctype="multipart/form-data">
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
