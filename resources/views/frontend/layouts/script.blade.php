<script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.hoverIntent.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.waypoints.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/superfish.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap-input-spinner.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.plugin.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.countdown.min.js"></script>
<!-- Main JS File -->
<script src="{{ asset('frontend') }}/assets/js/main.js"></script>
<script src="{{ asset('frontend') }}/assets/js/demos/demo-14.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.elevateZoom.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
@stack('scripts')
