@csrf
<div class="mb-3">
    <label for="title">Judul</label>
    <input type="text" class="form-control" name="title" value="{{ old('title', $slider->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="description">Deskripsi</label>
    <textarea class="form-control" name="description">{{ old('description', $slider->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="image">Gambar</label>
    <input type="file" class="form-control" name="image">
    @if(isset($slider))
        <img src="{{ asset('storage/' . $slider->image) }}" width="100" class="mt-2">
    @endif
</div>

<button type="submit" class="btn btn-success">Simpan</button>

