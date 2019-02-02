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
	
	
	var Application					= root.Oyster.Application;
	var TreeActionsModule			= root.Oyster.Modules.Routing.TreeActionsModule;
	var HistoryJsNavigationModule	= root.FlamingSnail.Modules.HistoryJsNavigationModule;
	
	
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
			]
		];
	}
	
	function getRoutes()
	{
		return [
			
		];
	}
	
	function startApplication()
	{
		root.app = Application.create(
			getModules(), 
			getRoutes()
		);
		
		root.app.run();
	}
	
	
	this.Boot = function ()
	{
		console.log('Booting');
		
		setupGlobals();
		startApplication();
		
		
		fabric.Object.prototype.objectCaching = false;
		
			
	
		var canvas = new fabric.Canvas('main-screen');
		var rect1 = new fabric.Rect({
			left: 100,
			top: 100,
			fill: 'red',
			width: 20,
			height: 20,
			angle: 45
		});
		
		var rect2 = new fabric.Rect({
			left: 50,
			top: 50,
			fill: 'red',
			width: 20,
			height: 20,
			angle: 45
		});
		
		canvas.add(rect1);
		canvas.add(rect2);
	};
});