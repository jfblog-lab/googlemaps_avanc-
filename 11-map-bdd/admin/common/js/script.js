$(function() {
	// Code JS pour la partie administration
	$('#form').hide();

	$('#ajout').click(function(){
		$('#form').slideToggle();
	});

	$('p.description').hide();

	$('h4.titre').click(function(){
		$(this).next('p.description').slideToggle();
	});

	$('.deleteCat').click(function(){
		var id = $(this).attr('id');
		var dataString = 'id='+id;
		var parent = $(this).parent();
  
		$.ajax({
			type:'GET',
			url:'category.php',
			data:dataString,
			
			beforeSend: function(){
				parent.animate({opacity: 0.20}, 'slow');
			},
			success: function(){
				parent.slideUp('slow',function(){$(this).remove();});
			}
		});
		return false;
	});

	$('.deleteMarkers').click(function(){
		var id = $(this).attr('id');
		var dataString = 'id='+id;
		var parent = $(this).parent();
  
		$.ajax({
			type:'GET',
			url:'markers.php',
			data:dataString,
			
			beforeSend: function(){
				parent.animate({opacity: 0.20}, 'slow');
			},
			success: function(){
				parent.slideUp('slow',function(){$(this).remove();});
			}
		});
		return false;
	});
});