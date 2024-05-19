@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.update-about')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Title: <sup class="text-danger">*</sup></label>
                            <input type="text" name="title" value="{{ $about_us->title }}" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Image<sup class="text-danger">*</sup></label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2 mt-4">

                            <img src="{{ $about_us->image }}" style="height: 50px; width: 50px; border-radius: 50%">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description:</label>
                            <textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $about_us->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" class="btn btn-info" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
   @push('scripts')
        <script>
            $(document).ready(function() {
                $('#description').summernote({
                    placeholder: 'Enter Description',
                    tabsize: 2,
                    height: 200
                });
            });
        </script>
   @endpush
