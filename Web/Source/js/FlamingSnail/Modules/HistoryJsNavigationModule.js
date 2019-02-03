namespace('FlamingSnail.Modules', function (root)
{
	var OysterModules			= root.Oyster.Modules.OysterModules;
	var BaseNavigationModule	= root.Oyster.Modules.BaseNavigationModule;
	
	
	function HistoryJsNavigationModule() { classify(this); }
	
	inherit(HistoryJsNavigationModule, BaseNavigationModule);
	HistoryJsNavigationModule.moduleName = BaseNavigationModule.moduleName;
	
	
	HistoryJsNavigationModule.prototype._bindEvents = function ()
	{
		var navigate 	= this.navigate;
		var handleURL 	= this._routing.handleURL;

		$(window).on('popstate', function (e)
		{			
			handleURL(window.location.pathname + window.location.search);
		});
		
		$(document).on('click', "a[direct-link]", function (e) 
		{
			e.preventDefault();
			navigate($(this).attr('href'));
		});
	};


	HistoryJsNavigationModule.prototype.preLoad = function ()
	{
		/** @var {BaseRoutingModule} */
		this._routing = this.manager().get(OysterModules.RoutingModule);
		this._bindEvents();
	};
	

	HistoryJsNavigationModule.prototype.navigate = function (url)
	{
		console.log('Navigating to: ' + url);
		
		if (url === '/error/not-found') 
		{
			history.replaceState(null, null, url);
		}
		else 
		{
			history.pushState(null, null, url);
		}
		
		this._routing.handleURL(url);
	};

	HistoryJsNavigationModule.prototype.goto = function (path, params)
	{
		var url = path;

		if (is.object(params) && is.object.notEmpty(params))
		{
			url += '?' + $.param(params);
		}

		this.navigate(url);
	};
	
	HistoryJsNavigationModule.prototype.handleMiss = function (url)
	{
		if (url !== '/404')
		{
			console.error('Could not handle URL: ' + url);
			this.goto('/404');
		}
	};
	
	
	this.HistoryJsNavigationModule = HistoryJsNavigationModule;
});