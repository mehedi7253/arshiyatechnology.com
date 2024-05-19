@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                    <a href="{{ route('admin.banners.index')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                        <em class="far fa-edit p-1"> </em> Manage Banner
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.banners.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Select Banner <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="file" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror">
                            @error('banner_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Link </label>
                            <input type="text" name="banner_link" class="form-control @error('banner_link') is-invalid @enderror" placeholder="Enter url" value="{{old('banner_link')}}">
                            @error('banner_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status: </label>
                            <select class="form-control" name="status" id="status">
                                <option value="0" selected>Active</option>
                                <option value="1">In-Active</option>
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
