namespace('FlamingSnail', function (root)
{
	var is		= root.Plankton.is;
	var array	= root.Plankton.array;
	var foreach	= root.Plankton.foreach;
	var func	= root.Plankton.func;
	var obj		= root.Plankton.obj;
	var url		= root.Plankton.url;
	
	var inherit		= root.Classy.inherit;
	var classify	= root.Classy.classify;
	
	
	var Application			= root.Oyster.Application;
	var TreeActionsModule	= root.Oyster.Modules.Routing.TreeActionsModule;
	
	var ViewModule					= root.FlamingSnail.Modules.ViewModule;
	var HistoryJsNavigationModule	= root.FlamingSnail.Modules.HistoryJsNavigationModule;
	
	var Routing	= root.FlamingSnail.Config.Routing;
	
	
	function setupGlobals()
	{
		window.is		= is;		
		window.array	= array;
		window.foreach	= foreach;
		window.func		= func;
		window.obj		= obj;		
		window.url		= url;		
		
		window.inherit	= inherit;
		window.classify	= classify;
	}
	
	function getModules()
	{
		return [
			[
				TreeActionsModule,
				HistoryJsNavigationModule
			],
			[
				ViewModule
			]
		];
	}
	
	function startApplication()
	{
		root.app = Application.create(
			getModules(), 
			(app, routing) => 
			{
				routing.setupRoutes(Routing);
				app.run();
			}
		);
	}
	
	
	this.Boot = function ()
	{
		console.log('Booting');
		
		setupGlobals();
		startApplication();
	};
});