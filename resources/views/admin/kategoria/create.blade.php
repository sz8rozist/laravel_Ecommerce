@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Új kategória <a href="{{ url('admin/kategoria') }}"
                            class="btn btn-danger btn-sm text-white float-end">Vissza</a> </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/kategoria')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">Név</label>
                                <input type="text" class="form-control" name="name">
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug">
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control" rows="3"></textarea>
                                @error('description') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                                @error('image') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-check-label">Status</label><br>
                                <input type="checkbox" class="form-check-input" name="status">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta title</label>
                                <input type="text" class="form-control" name="meta_title">
                                @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" id="" class="form-control" rows="3"></textarea>
                                @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" id="" class="form-control" rows="3"></textarea>
                                @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror

                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn text-white btn-primary float-end">Mentés</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
