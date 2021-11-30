<script>
    @if(Session::has('msg'))
        toastr.success("{{ Session::get('msg') }}");
    @endif
    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif
    @if(Session::has('error-msg'))
        toastr.warning("{{ Session::get('error-msg') }}");
    @endif
    @if(Session::has('warning'))
        toastr.error("{{ Session::get('warning') }}");
    @endif
</script>