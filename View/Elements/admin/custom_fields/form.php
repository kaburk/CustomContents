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
 * @var int $methodUrl
 */
?>


<?php echo $this->BcForm->create('CustomField', ['url' => $methodUrl]) ?>
<?php echo $this->BcForm->hidden('id') ?>
<?php echo $this->BcForm->hidden('custom_content_id') ?>
<?php echo $this->BcForm->hidden('type') ?>
	<table class="form-table">
		<tr>
			<th>フィールド名</th>
			<td><?php echo $this->BcForm->input('CustomField.name', ['size' => 60]) ?></td>
		</tr>
		<tr>
			<th>タイトル</th>
			<td><?php echo $this->BcForm->input('CustomField.title', ['size' => 60]) ?></td>
		</tr>
	</table>
	<div class="submit">
		<?php $this->BcBaser->link('戻る', ['controller' => 'custom_contents', 'action' => 'edit', $customContentId], ['class' => 'button']) ?>
		<?php echo $this->BcForm->submit(__d('baser', '保存'), ['class' => 'button', 'div' => false]) ?>
	</div>
<?php echo $this->BcForm->end() ?>