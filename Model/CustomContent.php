<?php
/**
 * CustomContents :  baserCMS Plugin <https://github.com/ryuring/CustomContents>
 * Copyright (c) ryuring.com
 *
 * @copyright		Copyright (c) ryuring.com
 * @link			http://ryuring.com
 * @package			CustomContents.Model
 * @since			baserCMS v 4.1.2
 * @license			MIT
 */

class CustomContent extends CustomContentsAppModel {

/**
 * Behavior Setting
 * @var array
 */
	public $actsAs = ['BcContents'];
	
/**
 * hasMany
 * @var array
 */
	public $hasMany = ['CustomField'];

	public function afterSave($created, $options = []) {
		parent::afterSave($created, $options);
		$this->createArticleTable($this->id);
	}

}