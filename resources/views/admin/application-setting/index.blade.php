@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.settings-update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Name: <sup class="text-danger">*</sup></label>
                            <input type="text" name="name" value="{{ $application_setting->name }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email: <sup class="text-danger">*</sup></label>
                            <input type="text" name="email" value="{{ $application_setting->email }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone:<sup class="text-danger">*</sup></label>
                            <input type="text" name="phone" value="{{ $application_setting->phone }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Additional Phone:</label>
                            <input type="text" name="additional_phone" value="{{ $application_setting->additional_phone }}" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Address:<sup class="text-danger">*</sup></label>
                            <textarea type="text" name="address" class="form-control">{{ $application_setting->address }}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Logo:<sup class="text-danger">*</sup></label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="form-group col-md-2 mt-4">
                            <img src="{{ $application_setting->logo }}" style="height: 50px; width: 50px; border-radius: 50%">
                        </div>
                        <div class="form-group col-md-4">
                            <label>FavIcon:<sup class="text-danger">*</sup></label>
                            <input type="file" name="favicon" class="form-control">
                        </div>
                        <div class="form-group col-md-2 mt-4">
                            <img src="{{ $application_setting->favicon }}" style="height: 50px; width: 50px; border-radius: 50%">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Facebook Link:</label>
                            <input type="text" name="facebook" value="{{ $application_setting->facebook }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company LinkdIn Link:</label>
                            <input type="text" name="linkedin" value="{{ $application_setting->linkedin }}" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Meta Tag:</label>
                            <input type="text" name="keywords" value="{{ $application_setting->keywords }}" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Meta Description:</label>
                            <textarea type="text" name="meta_description" class="form-control">{{ $application_setting->meta_description }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Copyright:<sup class="text-danger">*</sup></label>
                            <input type="text" name="copyright" value="{{ $application_setting->copyright }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" class="btn btn-info" value="Submit">
                        </div>
                    </div>
                </form>
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
