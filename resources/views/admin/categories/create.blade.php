@extends('admin.layout.master')
@section('title' , 'Create')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <h1 class="h3 mb-4 text-gray-800">Add categories</h1>
 <form action="{{ route('admin.caregory.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name" value="{{ old('name') }}" name="name">
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
        @error('image')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
</form>
@endsection