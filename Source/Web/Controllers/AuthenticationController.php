<?php
namespace FlamingSnail\Web\Controllers;


use FlamingSnail\Base\Modules\ISessionModule;
use FlamingSnail\Base\Modules\IUserModule;
use FlamingSnail\Base\Web\Validators\ILoginParamsValidator;
use FlamingSnail\Base\Web\Validators\IRegisterParamsValidator;
use WebCore\HTTP\Responses\StandardWebResponse;
use WebCore\IWebRequest;


class AuthenticationController
{
	public function onException(\Throwable $exception)
	{
		throw $exception;
	}
	
	public function login(
		IWebRequest $request,
		ILoginParamsValidator $validator,
		IUserModule $userModule,
		ISessionModule $sessionModule
	)
	{
		$params = $validator->validate($request->getPost());
		$user = $userModule->getUserByLoginParams($params);
		$session = $sessionModule->createSession($user);
		
		$response = new StandardWebResponse();
		$response->setCookieByName('sid', $session->ID);
		$response->setBody('Hello ' . $user->Username);
		
		return $response;
	}
	
	public function register(
		IWebRequest $request,
		IRegisterParamsValidator $validator,
		IUserModule $userModule
	)
	{
		$user = $validator->validate($request->getPost());
		$userModule->saveUser($user);
		
		return 'User saved, please login';
	}
	
	public function sendResetToken()
	{
		
	}
	
	public function resetPassword()
	{
		
	}
}