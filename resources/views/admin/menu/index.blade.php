@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                    <a href="{{ route('admin.menus.create')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                        <em class="far fa-plus p-1"> </em> Add New Menu
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable-init nowrap table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Parent</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $i=>$menu)
                            <tr>
                                <td>
                                    {{ $menu->name }}
                                </td>
                                <td>{{ $menu->url }}</td>
                                <td>
                                    {{ $menu->parent_id ? $menu->parent->name : 'Parent' }}
                                </td>
                                <td>
                                    <span class="badge {{ $menu->is_active ? 'badge-success' : 'badge-danger' }}">{{ $menu->is_active ? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td>{{ $menu->order }}</td>
                                <td>
                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST">
                                        <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection


    @section('script')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Enter Description',
                tabsize: 2,
                height: 200
            });
        });
    </script>

    @endsection
