@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Termékek</h4>
            <hr>
        </div>
        <div class="card-body">
            @if($products->count() > 0)
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kategória</th>
                        <th>Név</th>
                        <th>Ár</th>
                        <th>Kép</th>
                        <th>Művelet</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td><img src="{{asset('assets/uploads/product/'.$item->image)}}" width="50px" alt="Image here"></td>
                            <td>
                                <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-info">Szerkesztés</a>
                                <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger">Törlés</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p><span>Nincs rögzítve termék.</span></p>
            @endif
        </div>
    </div>
@endsection
