@extends('admin.layouts.app')
    @section('content')
    <div class="card">
        <div class="card-header">
            <div class="h3">
                {{ $page }}
                <a href="{{ route('admin.categories.index')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                    <em class="far fa-eye p-1"> </em> All Category
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 float-left">
                        <label>Category Name: <sup class="text-danger">*</sup></label>
                        <input type="text" name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" placeholder="Enter category name" autocomplete="category_name" autofocus>
                        @error('category_name')
                        <span class="invalid-feedback" role="alert">
                                <label style="color: red">{{ $message }}</label>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12 col-md-6 float-left">
                        <label>Select Parent Category: </label>
                        <select class="form-control select2" name="parent_id">
                            <option value="">Select One</option>
                            @foreach($categories as $parent_category)
                                <option value="{{ $parent_category->id }}">{{ $parent_category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 float-left">
                        <label>Status: <sup class="text-danger">*</sup></label>
                        <select class="form-control auto-select" data-selected="{{ old('status',1) }}" name="status" required>
                            <option value="active">Active</option>
                            <option value="in-active">In Active</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6 col-md-6 float-left mt-2">
                        <input type="submit" class="btn btn-secondary btn-block mt-4" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
