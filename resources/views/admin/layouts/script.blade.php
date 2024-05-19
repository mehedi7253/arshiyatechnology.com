<script src="{{ asset('backend/assets/js/bundle.js') }}"></script>
<script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
<script src="{{ asset('backend/assets/js/charts/gd-default.js') }}"></script>

<link rel="stylesheet" href="{{ asset('backend/assets/css/editors/summernote.css?ver=2.4.0') }}">
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.options = {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                }
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.options = {
                    "closeButton" : false,
                    "progressBar" : true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                }
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.options.timeOut = 10000;
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.options.timeOut = 10000;
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
@stack('scripts')
