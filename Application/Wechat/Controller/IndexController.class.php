<?php
namespace Wechat\Controller;

use Think\Controller;
use EasyWeChat\Foundation\Application;
class IndexController extends Controller
{
	public function index()
	{
		$options = [
		    'debug'     => true,
		    'app_id'    => 'wx637261a950dae71a',
		    'secret'    => '22aa1bcbae4f769833ad552ac8761d12',
		    'token'     => 'easywechat',
		    'log' => [
		        'level' => 'debug',
		        'file'  => '/tmp/easywechat.log',
		    ],
		];

		$app = new Application($options);

		$server = $app->server;
		$user = $app->user;

		$server->setMessageHandler(function($message) use ($user) {
		    $fromUser = $user->get($message->FromUserName);

		    return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
		});

		$server->serve()->send();

	}
}