namespace('FlamingSnail.Server', function (root)
{
	var Component = root.Oyster.Component;
	
	
	function DrawRoomConnector() { Component.call(this); }
	inherit(DrawRoomConnector, Component);
	
	
	DrawRoomConnector.prototype.create = function(username)
	{
		return $.post(
			'room/create',
			{
				username: username
			});
	};
	
	DrawRoomConnector.prototype.join = function(username, roomId)
	{
		return $.get(
			'room/join',
			{
				username: username,
				roomId: roomId
			});
	};
	
	DrawRoomConnector.prototype.update = function(changes)
	{
		$.post('room/update', { changes: JSON.stringify(changes) });
	};
	
	DrawRoomConnector.prototype.pull = function(after)
	{
		return $.get('room/pull', { after: after });
	};
	
	
	this.DrawRoomConnector = DrawRoomConnector;
});