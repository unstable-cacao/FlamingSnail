namespace('FlamingSnail.Config', function (root)
{
	var RootAction  	= root.FlamingSnail.Actions.RootAction;
	var RoomAction		= root.FlamingSnail.Actions.RoomAction;
	var NotFoundAction	= root.FlamingSnail.Actions.NotFoundAction;
	
	
	this.Routing = {
		_:
		{
			action: RootAction
		},
		404: 
		{
			$:
			{
				path: '404',
				action: NotFoundAction
			}
		},
		Room:
		{
			$:
			{
				path: 'room/{room}',
				action: RoomAction
			}
		}
	};
});