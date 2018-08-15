<?php
/**
 * CustomContents :  baserCMS Plugin <https://github.com/ryuring/CustomContents>
 * Copyright (c) ryuring.com
 *
 * @copyright		Copyright (c) ryuring.com
 * @link			http://ryuring.com
 * @package			CustomContents.Config
 * @since			baserCMS v 4.1.2
 * @license			MIT
 */

$config = [
	'BcContents' => [
		'items' => [
			'CustomContents' => [
				'CustomContent'	=> [
					'multiple'	=> true,
					'preview'	=> true,
					'title' => 'カスタムコンテンツ',
					'icon'	=> 'admin/icon_custom_contents.png',
					'routes' => [
						'manage' => [
							'admin' => true,
							'plugin'	=> 'custom_contents',
							'controller'=> 'custom_articles',
							'action'	=> 'index'
						],
						'add'	=> [
							'admin' => true,
							'plugin'	=> 'custom_contents',
							'controller'=> 'custom_contents',
							'action'	=> 'add'
						],
						'edit'	=> [
							'admin' => true,
							'plugin'	=> 'custom_contents',
							'controller'=> 'custom_contents',
							'action'	=> 'edit'
						],
						'delete' => [
							'admin' => true,
							'plugin'	=> 'custom_contents',
							'controller'=> 'custom_contents',
							'action'	=> 'delete'
						],
						'view' => [
							'plugin'	=> 'custom_contents',
							'controller'=> 'custom_contents',
							'action'	=> 'index'
						],
						'copy'	=> [
							'admin' => true,
							'plugin'	=> 'custom_contents',
							'controller'=> 'custom_contents',
							'action'	=> 'copy'
						]
]]]]]];
