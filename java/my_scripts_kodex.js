$(document).ready(function() {
		
		$.ajax({
			type: "POST",
			url: "Counter_Kodex.php",
			data: {value: Counter_Kodex},
		}); // ajax - Counter_Kodex
		
		$(".kodex_alegyseg").on('input', function() {
				var value = $(this).val();
				if (value != '') {
					$('.kodexlista').show();
					$.ajax({
					type: "POST",
					url: "ac_kodex_jquery.php",
					dataType: "json",
					data: {value: value},
					success: function(data) {
						var availableTags = data;
						$(".kodex_alegyseg").autocomplete({
							source: availableTags
						}).autocomplete("widget").addClass("ac");// autocomplete
					 } // success function
					}); // ajax - autoc.					
				}// if value
			});// on input
			
		var Counter_Kodex = 1;
		$('#add_kodex').on('click', function() {
			Counter_Kodex += 1;
			$('#kodex_form').append(
				'<label for="odex_alegyseg' + Counter_Kodex + '">Kódex alegység #' + Counter_Kodex +'</label>' +
				'<input type="text" class="kodex_alegyseg" name="kodex_alegyseg_' + Counter_Kodex + '" placeholder="Kódex alegység #' + Counter_Kodex + '">' +
				'<div class="kodexlista"></div>' 
			); //append
			
			$(".kodex_alegyseg").on('input', function() {
				var value = $(this).val();
				if (value != '') {
					$('.kodexlista').show();
					$.ajax({
					type: "POST",
					url: "ac_kodex_jquery.php",
					dataType: "json",
					data: {value: value},
					success: function(data) {
						var availableTags = data;
						$(".kodex_alegyseg").autocomplete({
							source: availableTags
						}).autocomplete("widget").addClass("ac");// autocomplete
					 } // success function
					}); // ajax - autoc.					
				}// if value
			});// on input
			
			$.ajax({
				type: "POST",
				url: "Counter_Kodex.php",
				data: {value: Counter_Kodex},
			}); // ajax - Counter_Kodex
					
		}); //on click
	}); //doc ready