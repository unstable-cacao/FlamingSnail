namespace('FlamingSnail.Config', function (root)
{
	var RootAction  	= root.FlamingSnail.Actions.RootAction;
	var RoomAction		= root.FlamingSnail.Actions.RoomAction;
	var DrawAction		= root.FlamingSnail.Actions.DrawAction;
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
		},
		Draw:
		{
			$:
			{
				path: 'draw',
				action: DrawAction
			}
		}
	};
});