@extends('layouts.app')

@section('title','Home Page')
@section('content')
<div class="p-5 text-center bg-image rounded-3" style="
    background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
    height: 400px;
    background-repeat: no-repeat;
    background-size: cover;
  ">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Heading</h1>
        <h4 class="mb-3">Subheading</h4>
        <a class="btn btn-outline-light btn-lg" href="#!" role="button">Call to action</a>
      </div>
    </div>
  </div>
</div>

@endsection
