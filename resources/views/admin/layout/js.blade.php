<script type="text/javascript">
	$(document).ready(function(){
		$('#datatable').dataTable({
	        "language": {
	            "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
	            "emptyTable": "Không có dữ liệu",
	            "search": "Tìm kiếm",
	            "info": "Hiển thị từ _START_ đến _END_ trong _TOTAL_ kết quả",
	            "infoEmpty": "Hiển thị 0 kết quả",
	            "infoFiltered": "(Lọc từ _MAX_ kết quả)",
	            "paginate": { "first": "Đầu", "last": "Cuối", "next": "Sau", "previous": "Trước" },
	            "lengthMenu": "Hiện _MENU_ mục",
	        }
	    });

		$.fn.datepicker.defaults.format = "dd/mm/yyyy";

		$('.datepicker').datepicker({
		    language: 'vi'
		});


		setInterval(function(){

		}, 1000);
	});	
	
</script>
