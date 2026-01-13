@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">

            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-center mb-3">Import Data Latihan (Excel)</h5>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="file" name="file" class="form-control mb-3" required>

                        <button class="btn btn-primary w-100">
                            Import Excel
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
