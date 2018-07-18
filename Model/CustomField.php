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

class CustomField extends CustomContentsAppModel {

/**
 * AfterSave
 * @param bool $created
 * @param array $options
 */
	public function afterSave($created, $options = []) {
		parent::afterSave($created, $options);
		if($created) {
			$this->addAArticleField($this->data['CustomField']['custom_content_id'], $this->data['CustomField']['name']);
		}
	}

}