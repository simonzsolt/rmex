$(document).ready(function() {

		$.ajax({
			type: "POST",
			url: "Counter_Szereplok.php",
			data: {value: Counter_Szereplok},
		}); // ajax - Counter_Szereplok
		
		$(".szereplok").on('input', function() {
			var value = $(this).val();
			if (value != '') {
				$('.szereplolista').show();
				$.ajax({
					type: "POST",
					url: "ac_sz_jquery.php",
					dataType: "json",
					data: {value: value},
					success: function(data) {
						var availableTags = data;
						$(".szereplok").autocomplete({
							source: availableTags
						}).autocomplete("widget").addClass("ac");// autocomplete
					} // success function
				}); // ajax - autoc.					
			}// if value
		});// on input
			
		var Counter_Szereplok = 1;
		$('#add_szereplo').on('click', function() {
			Counter_Szereplok += 1;
			$('#szereplok_form').append(
				'<label for="szereplok' + Counter_Szereplok + '">Szereplő #' + Counter_Szereplok +'</label>' +
				'<input type="text" class="szereplok" name="szereplo_' + Counter_Szereplok + '" placeholder="Szereplő #' + Counter_Szereplok + '">' +
				'<div class="szereplolista"></div>' 
			); //append
			
			$(".szereplok").on('input', function() {
				var value = $(this).val();
				if (value != '') {
					$('.szereplolista').show();
					$.ajax({
						type: "POST",
						url: "ac_sz_jquery.php",
						dataType: "json",
						data: {value: value},
						success: function(data) {
							var availableTags = data;
							$(".szereplok").autocomplete({
								source: availableTags
							}).autocomplete("widget").addClass("ac");// autocomplete
						} // success function
					}); // ajax - autoc.					
				}// if value
			});// on input
			
			$.ajax({
				type: "POST",
				url: "Counter_Szereplok.php",
				data: {value: Counter_Szereplok},
			}); // ajax - Counter_Szereplok
					
		}); //on click
	}); //doc ready