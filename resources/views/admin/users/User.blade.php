@extends('admin.layout.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->

        <div class="row">
            <table class="table table-hover table-bordered table-striped">
                <tr class="bg-dark text-white">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>type</th>
                    <th>Created At</th>  
                </tr>
            
            @forelse ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->type }}</td>
        <td>{{ $user->created_at->format('d F, Y - h:m:s A') }}</td>
        {{-- <td>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $users->id) }}">
                <i class="fas fa-edit"></i>
            </a>
            <form class="d-inline" action="{{ route('admin.categories.destroy', $users->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </td> --}}
    </tr>
    @empty
    <tr>
        <td colspan="5" class="text-center">No Data Available</td>
    </tr>
    @endforelse

</table>
@endsection