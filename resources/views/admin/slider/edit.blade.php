@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Edit Slider</h3>
    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.slider.form')
    </form>
</div>
@endsection