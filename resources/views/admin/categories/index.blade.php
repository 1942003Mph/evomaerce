@extends('admin.layout.master')
@section('title' , 'Catrgoris')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>All Posts</h1>
    <a href="{{ route('admin.caregory.create') }}" class="btn btn-dark">Add new Post</a>
</div>


 @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
@endif

<div class="input-group mb-3 ">
    <div class="search">
        <input name="search" type="search" id="search" class="form-control"  placeholder="Search about anything ..." >

    </div>
</div>

{{-- <form action="{{ route('admin.caregory.index') }}" method="GET">
    <div class="input-group mb-3">
        <input name="search" type="text" class="form-control" value="{{ request()->search }}" placeholder="Search about anything ..." >
        <button class="btn btn-primary" id="button-addon2">Search</button>
    </div>
</form> --}}

        <div class="row">
            <table class="table table-hover table-bordered table-striped">
                <tr class="bg-dark text-white">
                    <th>ID</th>
                    <th>Name</th>
                    <th>status	</th>
                    <th>image</th>
                    <th>Created At</th>  
                    <th>Action</th>  
                </tr>
            
            @forelse ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->status }}</td>
        <td><img src="{{ asset('uploads/'.$category->image) }}" width="80" alt=""></td>
        <td>{{ $category->created_at->format('d F, Y - h:m:s A') }}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.caregory.edit', $category->id) }}">
                <i class="fas fa-edit"></i>
            </a>
            <form class="d-inline" action="{{ route('admin.caregory.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </td> 
    </tr>
    @empty
    <tr>
        <td colspan="5" class="text-center">No Data Available</td>
    </tr>
    @endforelse
</table>
{{ $categories->appends($_GET)->links() }}
@endsection
@push('scripts')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script>
     $('#search').on('keyup',function() {
     }); 
    </script>

@endpush