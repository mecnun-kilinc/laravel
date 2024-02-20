@extends('admin.layout')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <form action="{{ url($action) }}" method="post" enctype="multipart/form-data" id="form-article">
                    @csrf

                    <input type="hidden" name="article_id" value="@isset($result->id){{ $result->id }}@endisset">

                        <div class="col mb-3 mt-3">
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                placeholder="Article Name"
                                value="@isset($result->name){{ $result->name }}@endisset">
                        </div>
                        <div class="col mb-3 mt-3">
                            <textarea name="description" cols="30" rows="5" class="form-control"
                            placeholder="Article Description">@isset($result->description){{ $result->description }}@endisset</textarea>
                        </div>
                        <div class="col mb-3 mt-3">
                            <input class="form-control @error('meta_title') is-invalid @enderror" type="text" name="meta_title" placeholder="Article Meta Title"
                                value="@isset($result->meta_title){{ $result->meta_title }}@endisset">
                        </div>
                        <div class="col mb-3 mt-3">
                            <textarea name="meta_description" cols="30" rows="2" class="form-control"
                                placeholder="Article Meta Description">@isset($result->meta_description){{ $result->meta_description }}@endisset</textarea>
                        </div>
                        <div class="col mb-3 mt-3">
                            <input class="form-control" type="text" name="meta_keywords" placeholder="Article Keywords"
                                value="@isset($result->meta_keywords){{ $result->meta_keywords }}@endisset">
                        </div>
                        <div class="col mb-3 mt-3">
                            <input class="form-control @error('seourl') is-invalid @enderror" type="text" name="seourl" placeholder="Article SEO Url"
                                value="@isset($result->seourl){{ $result->seourl }}@endisset">


                                @if (Session::has('error'))
                                <div class="alert alert-success">
                                    {{ Session::get('error') }}
                                </div>
                            @endif



                        </div>

                            <input type="hidden" name="editor"
                                value="@isset($result->editor){{ $result->editor }}@endisset">
                            <input type="hidden" name="editor_id"
                                value="@isset($result->editor_id){{ $result->editor_id }}@endisset">




                        <div class="col mb-3 mt-3">
                            <input class="form-control" type="file" name="photo"
                                value="@isset($result->photo){{ $result->photo }}@endisset">
                        </div>
                </form>

                <div class="mb-2">
                    <div class="container-fluid">
                        <div class="btn-group  gap-1 float-end" role="group"">
                            <button type="submit" form="form-article" data-toggle="tooltip" title="Save"
                                class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
        </div>








@endsection

