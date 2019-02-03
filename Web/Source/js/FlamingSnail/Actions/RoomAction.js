namespace('FlamingSnail.Actions', function (root)
{
	var Action 	= root.Oyster.Action;
	
	
	function RoomAction() { Action.call(this); }
	inherit(RoomAction, Action);
	
	
	RoomAction.prototype.activate = function ()
	{
		this.modules('View').render('room')
	};
	
	
	this.RoomAction = RoomAction;
});