@extends('profile/layout')

@section('additionalButton')
<div class="container">
    <h1>Upload Album Baru</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('uploadAlbum.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judulUtama" class="form-label">Judul Utama</label>
            <input type="text" class="form-control" id="judulUtama" name="judulUtama" value="{{ old('judulUtama') }}" required>
            @error('judulUtama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="judulTambahan" class="form-label">Judul Tambahan</label>
            <input type="text" class="form-control" id="judulTambahan" name="judulTambahan" value="{{ old('judulTambahan') }}">
            @error('judulTambahan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="statusTamat" class="form-label">Status Tamat</label>
            <select class="form-select" id="statusTamat" name="statusTamat" required>
                <option value="1" {{ old('statusTamat') == 1 ? 'selected' : '' }}>Tamat</option>
                <option value="0" {{ old('statusTamat') == 0 ? 'selected' : '' }}>Belum Tamat</option>
            </select>
            @error('statusTamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="releaseDate" class="form-label">Tanggal Rilis</label>
            <input type="date" class="form-control" id="releaseDate" name="releaseDate" value="{{ old('releaseDate') }}">
            @error('releaseDate')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="studioID" class="form-label">Studio ID (Maksimal 10)</label>
            <input type="number" class="form-control" id="studioID" name="studioID" value="{{ old('studioID') }}" max="10" required>
            @error('studioID')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi (Maksimal 100 karakter)</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" maxlength="100" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="imageAlbum" class="form-label">Link Gambar Album</label>
            <input type="url" class="form-control" id="imageAlbum" name="imageAlbum" placeholder="Masukkan link gambar album" value="{{ old('imageAlbum') }}" required>
            @error('imageAlbum')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="imageHorizontal" class="form-label">Link Gambar Horizontal</label>
            <input type="url" class="form-control" id="imageHorizontal" name="imageHorizontal" placeholder="Masukkan link gambar horizontal" value="{{ old('imageHorizontal') }}" required>
            @error('imageHorizontal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
    <label for="genre" class="form-label">Genre</label>
    @foreach($genres as $genre)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="genre{{ $genre->id }}" name="genre[]" value="{{ $genre->id }}" 
                {{ in_array($genre->id, old('genre', [])) ? 'checked' : '' }}>
            <label class="form-check-label" for="genre{{ $genre->id }}">{{ $genre->genreName }}</label>
        </div>
    @endforeach
    @error('genre')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
        <a href="/main/profile/admin" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>



@endsection
