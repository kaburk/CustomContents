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

/**
 * Class CustomContent
 *
 * @property CustomField $CustomField
 */
class CustomContent extends CustomContentsAppModel {

/**
 * Behavior Setting
 * @var array
 */
	public $actsAs = ['BcContents'];
	
/**
 * Has Many
 * @var array
 */
	public $hasMany = ['CustomField'];

/**
 * After Save
 * @param bool $created
 * @param array $options
 */
	public function afterSave($created, $options = []) {
		parent::afterSave($created, $options);
		$this->createArticleTable($this->id);
	}

}