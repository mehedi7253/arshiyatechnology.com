@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                    <a href="{{ route('admin.clients.index' )}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                        <em class="far fa-edit p-1"> </em> Manage Clients
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Select Image <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="file" name="client_logo" class="form-control @error('client_logo') is-invalid @enderror">
                            @error('client_logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <img src="{{ asset($client->client_logo) }}" alt="client logo" width="100" height="100">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Link </label>
                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter url" value="{{ $client->url }}">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status: </label>
                            <select class="form-control" name="status" id="status">
                                <option selected value="1" {{ old('status', $client->status) == 'active' ? 'selected' : '' }}> Active</option>
                                <option value="0"{{ old('status', $client->status) == 'inactive' ? 'selected' : '' }}> Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mt-5">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
