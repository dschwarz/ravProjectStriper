<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<link type="text/css" href="js/jquery-ui/css/smoothness/jquery-ui-1.8.21.custom.css" rel="Stylesheet" />
	<link type="text/css" href="css/ravStripes.css" rel="Stylesheet" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery-ui/js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
	<script src="js/ravStripesCanvas.js" type="text/javascript"></script>
	<script src="js/ravStripes.js" type="text/javascript"></script>	
</head>
<body>

<div id="header"><h1>project striper</h1></div>
<div id="sandbox">
	<div id="leftCol">
		<div id="stripeOptions"  class="roundedCorners">
			Add Stripes
			
			<div id="stripeSwatches" class="roundedCorners smaller" >
				<span id="noSwatches">No swatches yet.</span>
			</div>
		
			<p class="smaller">Rows: <select id="rows" name="rows">
				<option value="1">1</option>
				<option value="2" selected>2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>

				</select>
			</p>
			<input type="button" id="addStripe" value="Add Stripe">

		</div>		

<?php
require_once(dirname(__FILE__) . "/ravData.php");

$projects = getProjectData('tumblingblocks','0aede207495654651aa9227ed010a038c585964e');

print '<div id="projImgs" class="roundedCorners">Choose Image<br><div id="projScroll">';

 foreach ($projects as $key => $val) {

		if (!empty($projects[$key]['thumbnail']['src'])){
		
			//print $projects[$key]['name'].'<br>';
		
			print '<img class="projectThumb" id="projectThumb'.$key.'" src="'.$projects[$key]['thumbnail']['src'].'"><div class="projectImgDiv" id="projectImgDiv'.$key.'"><img class="projectImg" src="'.$projects[$key]['thumbnail']['medium'].'"></div><br>';
			
		}
}

print '</div></div>';

?>

	
</div>
<div id="rightCol" class="roundedCorners">
	<div id="introText">
		<p>Click the project images to create swatches, then select a swatch to make a stripe.  Change the number of rows to make wider or more narrow stripes. <span id="moreAbout">More about.</span></p>
	</div>

	<div id="stripes">
		<canvas id="scanvas"></canvas>
	</div>
	

</div>
<div id="footer"></div>
<div id="selectionDialog">
	<div id="squareInst">Move the gray square over the part of the photo you want to use as a swatch.</div>
	<div id="imgSelectButtonDiv" class="ui-state-default ui-corner-all">
		
		<div id="imgSelectButton">Make swatch</div>
		<input type="hidden" id="currentImage" value="">
	</div>
	<div id="inDiv">
	</div>
	
</div>

<div id="aboutDialog" title="More about">
	<p>Lately I've been spending a lot of time thinking about stripes.  I guess I'm dreaming of fall sweater knitting and all of the wonderful stripey possibilities.</p>
	<p>The project striper lets you make stripes using your project photos.  So, if you have project yarn leftovers, you can see how they will stripe up.</p>
	<p>You click on a photo thumbnail, which opens a dialog.  The dialog allows to select the 20px space on your photo you want to use as a swatch.  You then select a swatch and a number of rows to add a stripe.</p>
	<p>This represents one day of coding work.  In time, I would like to have this tool reference stash phots instead of project photos, and I would like to add the ability to delete and insert stripes.  I would also like to add download functionality so you can save and compare stripey variations.</p>

</div>

</body>
</html>