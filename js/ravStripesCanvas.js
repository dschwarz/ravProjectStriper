function stripesCanvas(canvasIdName)
{
	var m_canvasIdName = canvasIdName;
	var myCanvas = document.getElementById(m_canvasIdName).getContext('2d');
	myCanvas.canvas.height = 800;
	myCanvas.canvas.width = 600;
	var totalStripesHeight = 0;
	
	function addStripe(rows,imageId){
		var ptrn = myCanvas.createPattern(document.getElementById(imageId),'repeat');
		myCanvas.fillStyle = ptrn;
		myCanvas.strokeStyle = ptrn;
		//fabric images are 20 px high
		var stripeHeight = 20 * rows;
		//add a rectangle, starting at x=0 and the last stripe, as long as thew width and as high as the specified rows
		myCanvas.fillRect(0,totalStripesHeight,600,stripeHeight);
		totalStripesHeight = 1 * totalStripesHeight + stripeHeight;
	}
	this.addStripe = addStripe;


}