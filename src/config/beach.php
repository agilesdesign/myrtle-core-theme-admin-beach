<?php

return [
	'registerable' => [
		'providers'
	],
	'views' => [
		'path' => '/vendor/agilesdesign/myrtle-core-theme-admin-beach/src/views'
	],
//	'public' => [
//		'path' => base_path() . '/vendor/agilesdesign/myrtle-admin-theme-beach/src/public'
//	],
	'providers' => [
		\Myrtle\Core\Themes\Admin\Beach\Theme\Providers\MyrtleThemeAdminBeachServiceProvider::class,
	]
];