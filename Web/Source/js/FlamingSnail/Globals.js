namespace('FlamingSnail', function (root)
{
	var target = typeof window  !== 'undefined' ? window : global;
	
	
	target.is		= root.Plankton.is;
	target.obj		= root.Plankton.obj;
	target.func		= root.Plankton.func;
	target.array	= root.Plankton.array;
	target.foreach	= root.Plankton.foreach;
	
	target.inherit	= root.Classy.inherit;
	target.classify	= root.Classy.classify;
	
	
	this.Globals = {};
});