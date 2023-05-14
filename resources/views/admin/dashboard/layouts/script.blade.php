<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
{{-- <script src="{{asset()}}plugins/chart.js/Chart.min.js"></script> --}}
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/pages/dashboard3.js')}}"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('toastr-error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
        toastr.success('{{ Session::get('toastr-success') }}');
        @endif
    });

</script>
@stack('script')
