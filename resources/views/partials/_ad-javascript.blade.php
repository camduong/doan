<!-- jQuery -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap3.min.js') }}"></script>
<!-- Skycons -->
{{-- <script src="{{ asset('vendors/skycons/skycons.js') }}"></script> --}}
<!-- Custom Theme Scripts -->
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.table').DataTable({
			"lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
		  "columnDefs": [
		  	{ "width": "10", "targets": 0},
		    { "width": "100", "targets": "_all"}

		  ]
		});
	});
</script>
@yield('scripts')