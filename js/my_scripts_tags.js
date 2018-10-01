$(document).ready(function() {
		
		$.ajax({
			type: "POST",
			url: "Counter_Tags.php",
			data: {value: Counter_Tags},
		}); // ajax - Counter_Tags
		
		$(".kulcsszavak").on('input', function() {
				var value = $(this).val();
				if (value != '') {
					$('.kulcslista').show();
					$.ajax({
					type: "POST",
					url: "ac_tags_jquery.php",
					dataType: "json",
					data: {value: value},
					success: function(data) {
						var availableTags = data;
						$(".kulcsszavak").autocomplete({
							source: availableTags
						}).autocomplete("widget").addClass("ac");// autocomplete
					 } // success function
					}); // ajax - autoc.					
				}// if value
			});// on input
			
		var Counter_Tags = 1;
		$('#add_tag').on('click', function() {
			Counter_Tags += 1;
			$('#ksz_form').append(
				'<label for="kulcsszo' + Counter_Tags + '">Kulcsszó #' + Counter_Tags +'</label>' +
				'<input type="text" class="kulcsszavak" name="kulcsszo_' + Counter_Tags + '" placeholder="Kulcsszó #' + Counter_Tags + '">' +
				'<div class="kulcslista"></div>' 
			); //append
			
			$(".kulcsszavak").on('input', function() {
				var value = $(this).val();
				if (value != '') {
					$('.kulcslista').show();
					$.ajax({
					type: "POST",
					url: "ac_tags_jquery.php",
					dataType: "json",
					data: {value: value},
					success: function(data) {
						var availableTags = data;
						$(".kulcsszavak").autocomplete({
							source: availableTags
						}).autocomplete("widget").addClass("ac");// autocomplete
					 } // success function
					}); // ajax - autoc.					
				}// if value
			});// on input
			
			$.ajax({
				type: "POST",
				url: "Counter_Tags.php",
				data: {value: Counter_Tags},
			}); // ajax - Counter_Tags
					
		}); //on click
	}); //doc ready