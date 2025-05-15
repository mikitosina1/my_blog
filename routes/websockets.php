<?php

use Illuminate\Support\Facades\Route;

Route::get('/websockets-test', function () {
	return response()->json([
		'pusher_config' => [
			'key' => config('broadcasting.connections.pusher.key'),
			'host' => config('broadcasting.connections.pusher.options.host'),
			'port' => config('broadcasting.connections.pusher.options.port'),
			'scheme' => config('broadcasting.connections.pusher.options.scheme'),
			'cluster' => config('broadcasting.connections.pusher.options.cluster'),
		],
		'websockets_config' => [
			'port' => config('websockets.dashboard.port'),
			'apps' => config('websockets.apps'),
		],
	]);
});
