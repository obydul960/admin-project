
<!-- Jquery Core Js -->
<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
{{--<script src="{{URL::asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>--}}

<!-- Slimscroll Plugin Js -->
<script src="{{URL::asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{URL::asset('assets/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{URL::asset('assets/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Custom Js -->
<script src="{{URL::asset('assets/js/admin.js')}}"></script>
<script src="{{URL::asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>

<!-- Demo Js -->
<script src="{{URL::asset('assets/js/demo.js')}}"></script>
<!-- Tuest Flash message show -->
<script type="text/javascript" src="{{URL::asset('assets/js/toastr/toastr.min.js')}}"></script>
<!-- Flash message shwo -->
@if(Session::has('success'))
    <script type="text/javascript">
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                // progressBar: true,
                showMethod: 'slideDown',
                timeOut: 7000
            };
            toastr.success('{{ Session::get('success') }}');
            //alert("hello world");

        }, 1300);
    </script>
@elseif(Session::has('error'))
    <script type="text/javascript">
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                // progressBar: true,
                showMethod: 'slideDown',
                timeOut: 7000
            };
            toastr.error('{{ Session::get('error') }}');

        }, 1300);
    </script>
@elseif(Session::has('warning'))
    <script type="text/javascript">
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                // progressBar: true,
                showMethod: 'slideDown',
                timeOut: 7000
            };
            toastr.warning('{{ Session::get('warning') }}');
        }, 1300);
    </script>
@else(Session::has('voucher'))
    <script type="text/javascript">
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                // progressBar: true,
                showMethod: 'slideDown',
                timeOut: 7000
            };
            //toastr.success('<a href="{{ Session::get('id') }}">{{ Session::get('voucher') }} | Print Voucher222</a>');

        }, 1300);
    </script>
@endif
<!--End flash message show -->
