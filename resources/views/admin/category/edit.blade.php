@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                Kategória szerkesztése
            </h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>
                                Name
                            </label>
                            <input type="text" class="form-control" value="{{$category->name}}" name="name">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>
                            Slug
                        </label>
                        <input type="text" value="{{$category->slug}}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>
                            Description
                        </label>
                        <input type="text" value="{{$category->description}}" class="form-control" name="description">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>
                            Status
                        </label>
                        <input type="checkbox" {{$category->status == "1" ? 'checked' : ''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>
                            Popular
                        </label>
                        <input type="checkbox" {{$category->popular == "1" ? 'checked' : ''}} name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>
                            Meta Title
                        </label>
                        <input type="text" value="{{$category->meta_title}}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>
                            Meta Keywords
                        </label>
                        <input type="text" value="{{$category->meta_keywords}}" class="form-control" name="meta_keywords">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>
                            Meta Description
                        </label>
                        <input type="text" value="{{$category->meta_descrip}}" class="form-control" name="meta_descrip">
                    </div>
                    @if($category->image)
                        <img alt="Category image" src="{{asset('assets/uploads/category/'.$category->image)}}" style="width: 100px">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
