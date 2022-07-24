@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Kategóriák</h4>
            <hr>
        </div>
        <div class="card-body">
            @if($category->count() > 0)
           <table class="table table-borderless">
               <thead>
                <tr>
                    <th>Id</th>
                    <th>Név</th>
                    <th>Leírás</th>
                    <th>Kép</th>
                    <th>Művelet</th>
                </tr>
               </thead>
               <tbody>
                   @foreach($category as $item)
                       <tr>
                           <td>{{$item->id}}</td>
                           <td>{{$item->name}}</td>
                           <td>{{$item->description}}</td>
                           <td><img src="{{asset('assets/uploads/category/'.$item->image)}}" width="50px" alt="Image here"></td>
                           <td>
                               <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Szerkesztés</a>
                               <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Törlés</a>
                           </td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
            @else
                <p><span>Nincs rögzítve kategória.</span></p>
            @endif
        </div>
    </div>
@endsection
