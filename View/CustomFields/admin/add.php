<?php
/**
 * CustomContents :  baserCMS Plugin <https://github.com/ryuring/CustomContents>
 * Copyright (c) ryuring.com
 *
 * @copyright		Copyright (c) ryuring.com
 * @link			http://ryuring.com
 * @package			CustomContents.View
 * @since			baserCMS v 4.1.2
 * @license			MIT
 */

/**
 * @var BcAppView $this
 * @var int $customContentId
 */
?>


<?php $this->BcBaser->element('admin/custom_fields/form', ['methodUrl' => ['action' => 'add', $customContentId]]) ?>