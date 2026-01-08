@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="pt-5 pt-md-0">
  <div class="d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width:450px; width:100%;">

      <h4 class="text-center mb-4">Edit Profil</h4>

      <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 text-center">
          <img src="{{ Auth::user()->foto 
              ? asset('uploads/user/'.Auth::user()->foto) 
              : asset('images/default-user.png') }}"
              class="rounded-circle mb-2"
              style="width:100px;height:100px;object-fit:cover;">
          <input type="file" name="foto" class="form-control mt-2">
        </div>

        <div class="mb-3">
          <label>Nama</label>
          <input type="text" name="name" class="form-control"
                value="{{ Auth::user()->name }}" required>
        </div>

        <div class="mb-3">
          <label>No HP</label>
          <input type="text" name="no_hp" class="form-control"
                value="{{ Auth::user()->no_hp }}" required>
        </div>

        <hr>

        <div class="mb-3">
          <label>Password Baru (Opsional)</label>
          <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
          <label>Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-danger w-100">
          Simpan Perubahan
        </button>

      </form>
    </div>
  </div>
</div>  
@endsection
