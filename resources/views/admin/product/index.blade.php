@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Termékek <a href="{{ url('admin/product/create') }}"
                            class="btn btn-primary btn-sm text-white float-end">Termék hozzáadása</a> </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategória</th>
                                <th>Termék</th>
                                <th>Ár</th>
                                <th>Státusz</th>
                                <th>Művelet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        @if ($product->category)
                                        {{$product->category->name}}
                                        @else
                                        Nincs kategória
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->selling_price}}</td>
                                    <td>
                                        @if ($product->status == 1)
                                        <i class="mdi mdi-24px mdi-check-circle-outline text-success"></i>
                                        @else
                                        <i class="mdi mdi-24px mdi-minus-circle-outline text-danger"></i>
                                        @endif
                                    </td>
                                <td>
                                    <a href="{{url('admin/product/'.$product->id.'/edit')}}" class="btn btn-success text-white">Szerkesztés</a>
                                    <a href="{{url('admin/product/'.$product->id.'/delete')}}" class="btn btn-danger text-white">Törlés</a>
                                </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Nincs elérhető termék.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
