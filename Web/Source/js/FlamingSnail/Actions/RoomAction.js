namespace('FlamingSnail.Actions', function (root)
{
	var Action 	= root.Oyster.Action;
	
	
	function RoomAction() { Action.call(this); }
	inherit(RoomAction, Action);
	
	
	RoomAction.prototype.activate = function ()
	{
		this.modules('View').render('room');
		
		var canvas = new fabric.Canvas('screen', {isDrawingMode: true});
		canvas.freeDrawingBrush.color = '#00000';
    	canvas.freeDrawingBrush.width = 5;
    	
    	canvas.setHeight($(window).height() - 50);
		canvas.setWidth($(window).width() - 50);
	};
	
	
	this.RoomAction = RoomAction;
});