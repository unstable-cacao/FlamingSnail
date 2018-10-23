<?php
namespace SquidMigrationActions_2018_10_23;


use Squid\MySql\IMySqlConnector;
use Squids\Prepared\SimpleAction;


class CreateGameTable extends SimpleAction
{
	const ID = '48e383edc410c4c4180ecc2954b59c58';
	const DEP = ['1a6538fef27b0a753fa4fb3e1c4ea7b1'];
	
	
	public function execute(IMySqlConnector $connector)
	{
		
	}
}