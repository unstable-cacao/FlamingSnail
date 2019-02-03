namespace('FlamingSnail.Actions', function (root)
{
	var Action 	= root.Oyster.Action;
	
	
	function NotFoundAction() { Action.call(this); }
	inherit(NotFoundAction, Action);
	
	
	NotFoundAction.prototype.activate = function()
	{
		this.modules('View').render('404');
	};
	
	
	this.NotFoundAction = NotFoundAction;
});