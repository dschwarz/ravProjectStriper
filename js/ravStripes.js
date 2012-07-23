$(document).ready(function(){
	
	$('#moreAbout').click(function(){
		$('#aboutDialog').dialog({width:450, height:350});
	});
	
	$('.projectThumb').click(function(){
		var classNum = $(this).attr("id").replace("projectThumb","");
		var diDiv = "#projectImgDiv" + classNum;
		
		$('#inDiv').html('<img src="'+$(diDiv).children().attr('src')+'">');
		$('#selectionDialog').dialog({width:600, height:600});
		var selDivHeight = $(inDiv).children().css("height");
		var selDivWidth = $(inDiv).children().css("width");
		$('#inDiv').css({'background-image':'url('+$(diDiv).children().attr('src')+")", 'background-repeat': 'no-repeat'});
		$('#currentImage').val($(diDiv).children().attr('src'));
		$('#inDiv').html('<div id="dragClear"></div>');
		$('#inDiv').css({'height': selDivHeight, 'width': selDivWidth});
		$('#dragClear').draggable({containment: "parent" });		
		
	});
	
	$('#imgSelectButton').click(function(){
		var myPosition = $('#dragClear').position();
		var myPositionLeft = Math.round((1 * myPosition.left) - 17);
		var myPositionTop = Math.round((1 * myPosition.top) - 8);
		$('#noSwatches').css('display','none');
		
		$.ajax({
			url: "cropImage.php",
			cache: false,
			data: {imgSrc: $('#currentImage').val(), x: myPositionLeft, y: myPositionTop}
			}).done(function( html ) {
		  		$("#stripeSwatches").append(html);
				$('#selectionDialog').dialog('close');
				$('.image20').css({'margin': '7px'});
				$('.image20').click(function(){
					$('.image20').css('border','0');
					$(this).css('border','solid 2px #C2EBB1');
					$('.image20').removeClass('selectedStripeImage');
					$(this).addClass('selectedStripeImage');
				});
				
		});
	});

	g_canvasStripes = new stripesCanvas('scanvas');
	
	$('#addStripe').click(function(){
		if ($('.selectedStripeImage').length){
			g_canvasStripes.addStripe($('#rows').val(),$('.selectedStripeImage').attr('id'))
		}else{
			alert('Before you can add a stripe, you must select a swatch by clicking on it.');
		}
		$('#stripeDownload').css('display','block');
		
	});
	
	
	
});