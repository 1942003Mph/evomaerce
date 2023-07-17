@extends('admin.layout.master')
@section('title' , 'Catrgoris')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <h1 class="h3 mb-4 text-gray-800">All categories</h1>

 @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
@endif


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
@endsection