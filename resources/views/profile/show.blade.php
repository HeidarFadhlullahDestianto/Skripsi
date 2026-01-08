@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="pt-5 pt-md-0">
  <div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4 text-center" style="max-width:400px; width:100%;">
      
      <img src="{{ Auth::user()->foto 
          ? asset('uploads/user/'.Auth::user()->foto) 
          : asset('images/default-user.png') }}"
          class="rounded-circle mx-auto mb-3"
          style="width:120px;height:120px;object-fit:cover;">

      <h4>{{ Auth::user()->name }}</h4>
      <p class="text-muted">{{ Auth::user()->email }}</p>

      <hr>

      <p><strong>No HP:</strong><br>{{ Auth::user()->no_hp }}</p>

      <a href="{{ route('profile.edit') }}" class="btn btn-danger w-100 mt-3">
        Edit Profil
      </a>

    </div>
  </div>
</div>  
@endsection
