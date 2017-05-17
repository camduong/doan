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
		    { "width": "150", "targets": "_all"}
		  ],
		  "oLanguage": {
	      "oPaginate": {
	      	"sPrevious": "Trước",
	        "sNext": "Sau"
	      },
	      "sEmptyTable": "Bảng chưa có dữ liệu !!!",
	      "sSearch": "Tìm kiếm:",
	      "sZeroRecords": "Không có dữ liệu trong bản !!!",
	      "sInfo": "Hiển thị _END_ mục trong tổng _TOTAL_ mục có trong dữ liệu",
	      "sInfoFiltered": " - Lọc được trong _MAX_ mục",
	      "sInfoEmpty": "Không có kết quả để hiển thị",
	      "sLengthMenu": "Hiện _MENU_ dòng",
	      "sLoadingRecords": "Xin đợi - đang xử lý...",
	      "sProcessing": "DataTables đang bận",
	      "sInfoThousands": "."
	    }
		});
	});
</script>
@yield('scripts')