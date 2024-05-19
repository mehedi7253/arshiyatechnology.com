@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.update-mission-vision')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Mission:</label>
                            <textarea type="text" name="mission" id="description" class="form-control @error('description') is-invalid @enderror">{{ $mission_vision->mission }}</textarea>
                            @error('mission')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Vision:</label>
                            <textarea type="text" name="vision" id="vision" class="form-control @error('vision') is-invalid @enderror">{{ $mission_vision->mission }}</textarea>
                            @error('vision')
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

            $(document).ready(function() {
                $('#vision').summernote({
                    placeholder: 'Enter Vision',
                    tabsize: 2,
                    height: 200
                });
            });
        </script>
   @endpush
