namespace('FlamingSnail.Modules', function (root)
{
	var Module = root.Oyster.Module;
	
	
	function ViewModule () { classify(this); }
	inherit(ViewModule, Module);
	
	
	ViewModule.moduleName = 'View';
	
	
	ViewModule.prototype.render = function(name)
	{
		if (!is(Views[name]))
		{
			console.error(`Could not find template ${name}!`);
		}
		
		$('main').empty().append(Views[name]());
	};
	
	
	this.ViewModule = ViewModule;
});