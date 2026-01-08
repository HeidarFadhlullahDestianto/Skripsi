@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tambah Slider</h3>
    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.slider.form')
    </form>
</div>
@endsection