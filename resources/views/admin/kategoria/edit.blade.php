@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Kategória szerkesztés <a href="{{ url('admin/kategoria') }}"
                            class="btn btn-primary btn-sm text-white float-end">Vissza</a> </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/kategoria/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">Név</label>
                                <input type="text" value="{{ $category->name}}" class="form-control" name="name">
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Slug</label>
                                <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" value="" id="" class="form-control" rows="3">{{ $category->description }}</textarea>
                                @error('description') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                                <img width="60px" height="60px" src="{{asset('/uploads/category/'. $category->image)}}">
                                @error('image') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-check-label">Status</label><br>
                                <input type="checkbox" class="form-check-input" {{$category->status == '1' ? 'checked' : ''}} name="status">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta title</label>
                                <input type="text" value="{{ $category->meta_title}}" class="form-control" name="meta_title">
                                @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" value="" id="" class="form-control" rows="3">{{ $category->meta_keyword}}</textarea>
                                @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" value="" id="" class="form-control" rows="3">{{ $category->meta_description}}</textarea>
                                @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Mentés</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
