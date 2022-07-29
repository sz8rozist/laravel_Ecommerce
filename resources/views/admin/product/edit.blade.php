@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                Termék szerkesztés
            </h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product/'.$product->id)}}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-group input-group-static mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">Kategória</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                                <option>{{$product->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Név</label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Leírás</label>
                            <input type="text" name="description" value="{{$product->description}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Ár</label>
                            <input type="text" name="price" value="{{$product->price}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Mennyiség</label>
                            <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" value="" id="fcustomCheck1" {{$product->status == "1" ? 'checked' : ''}}>
                            <label class="custom-control-label" for="customCheck1">Status</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Meta Title</label>
                            <input type="text" value="{{$product->meta_title}}" name="meta_title" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Meta Keywords</label>
                            <input type="text" value="{{$product->meta_title}}" name="meta_keywords" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="input-group input-group-static mb-4">
                            <label>Meta Description</label>
                            <input type="text"  value="{{$product->meta_title}}"name="meta_description" class="form-control">
                        </div>
                    </div>
                    @if($product->image)
                        <img alt="Category image" src="{{asset('assets/uploads/product/'.$product->image)}}" style="width: 100px">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
