namespace('FlamingSnail.Actions', function (root)
{
	var DrawRoomConnector	= root.FlamingSnail.Server.DrawRoomConnector;
	
	var Action 	= root.Oyster.Action;
	
	
	function DrawAction() { Action.call(this); }
	inherit(DrawAction, Action);
	
	
	DrawAction.prototype.activate = function ()
	{
		this.modules('View').render('create');
		
		this._connector = this.component(DrawRoomConnector);
		
		$('form#draw').on('submit', 
			(e) => 
			{
				console.log($(e));
				return false;
			});
	};
	
	
	this.DrawAction = DrawAction;
});