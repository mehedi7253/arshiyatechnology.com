@extends('admin.layouts.app')
    @section('content')
    <div class="card">
        <div class="card-header">
            <div class="h3">
                {{ $page }}
                <a href="{{ route('admin.categories.create')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                    <em class="far fa-plus p-1"> </em> Add New Category
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered datatable-init">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Main Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->parentCategory->category_name }}</td>
                            <td>
                                @if ($category->status == 'active')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure to delete !!');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
