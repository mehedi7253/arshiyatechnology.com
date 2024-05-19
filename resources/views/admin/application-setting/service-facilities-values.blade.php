@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.update-service-facilities-values')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Services:</label>
                            <textarea type="text" name="services" id="service" class="form-control @error('services') is-invalid @enderror">{{ $sfv->services ?? '' }}</textarea>
                            @error('services')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Facilities:</label>
                            <textarea type="text" name="facilities" id="facilities" class="form-control @error('facilities') is-invalid @enderror">{{ $sfv->facilities ?? ''}}</textarea>
                            @error('facilities')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Values:</label>
                            <textarea type="text" name="values" id="descrip" class="form-control @error('values') is-invalid @enderror">{{ $sfv->values ?? '' }}</textarea>
                            @error('values')
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
            CKEDITOR.replace('service',
            {
                height:300,
                resize_enabled:true,
                wordcount: {
                    showParagraphs: false,
                    showWordCount: true,
                    showCharCount: true,
                    countSpacesAsChars: true,
                    countHTML: false,
                    maxCharCount: 20}
            });
            CKEDITOR.replace('facilities',
            {
                height:300,
                resize_enabled:true,
                wordcount: {
                    showParagraphs: false,
                    showWordCount: true,
                    showCharCount: true,
                    countSpacesAsChars: true,
                    countHTML: false,
                    maxCharCount: 20}
            });
            CKEDITOR.replace('descrip',
            {
                height:300,
                resize_enabled:true,
                wordcount: {
                    showParagraphs: false,
                    showWordCount: true,
                    showCharCount: true,
                    countSpacesAsChars: true,
                    countHTML: false,
                    maxCharCount: 20}
            });
        </script>
   @endpush
