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
			() => 
			{
				var name = $('form#draw #name').val();
				var roomId = $('form#draw #roomId').val();
				
				if (roomId === '')
				{
					this._connector.create(name)
						.done((data) => 
						{
							this.navigate('room/' + data.roomId);
						});
				}
				else 
				{
					this._connector.join(name, roomId)
						.done((data) => 
						{
							this.navigate('room/' + data.roomId);
						});
				}
				
				return false;
			});
	};
	
	
	this.DrawAction = DrawAction;
});