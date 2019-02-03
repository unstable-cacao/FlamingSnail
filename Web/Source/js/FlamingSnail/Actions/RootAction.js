namespace('FlamingSnail.Actions', function (root)
{
	var Action 	= root.Oyster.Action;
	
	
	function RootAction() { Action.call(this); }
	inherit(RootAction, Action);
	
	
	this.RootAction = RootAction;
});