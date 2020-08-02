<script type="text/javascript">
	$(document).ready(function(){
		$('.choose').on('change', function(){
			var action = $(this).attr('id');
			var ma_id = $(this).val();
			var _token = $('input[name="_token"]').val();
			var result = '';

			// alert(action);
			// alert(ma_id);
			// alert(_token);

			if (action == 'city') {
				result = 'district';
				// alert(result);
			}else{
				result = 'wards'
			}

			$.ajax({
				url : '{{ route("select-cart") }}',
				method: 'POST',
				data:{
					action:action,
					ma_id:ma_id,
					_token:_token,
				},
				success:function(data){
					$('#'+result).html(data);
				},
				error: function (data) {
                    alert(data);
                }
			});
		});
	})

</script>