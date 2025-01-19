@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                    <a href="{{ route('admin.clients.create')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                        <em class="far fa-plus p-1"> </em> Add New Client
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable-init nowrap table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $i=>$client)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <img src="{{ asset($client->client_logo) }}" width="100px" height="50px">
                                </td>
                                <td>{{ $client->url }}</td>
                                <td>
                                    @if ($client->status == 'active')
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST">
                                        <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
