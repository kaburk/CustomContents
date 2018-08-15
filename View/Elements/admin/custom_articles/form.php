<?php
/**
 * CustomContents :  baserCMS Plugin <https://github.com/ryuring/CustomContents>
 * Copyright (c) ryuring.com
 *
 * @copyright		Copyright (c) ryuring.com
 * @link			http://ryuring.com
 * @package			CustomContents.View
 * @since			baserCMS v 4.1.3
 * @license			MIT
 */

/**
 * @var BcAppView $this
 * @var array $currentCustomContent 現在のカスタムコンテンツ設定
 * @var array $currentCustomFields 現在のカスタムフィールド設定
 * @var string $formType フォームの種類（add | edit）
 */
if($formType == 'add') {
	$actionUrl = [$currentCustomContent['id']];
} elseif($formType == 'edit') {
	$actionUrl = [$currentCustomContent['id'], $this->BcForm->value('CustomArticle.id')];
}
?>


<?php if($currentCustomFields): ?>
<?php echo $this->BcForm->create('CustomArticle', ['url' => $actionUrl]) ?>
<?php echo $this->BcForm->hidden('CustomArticle.id') ?>

<table class="form-table">
	<?php foreach($currentCustomFields as $currentCustomField): ?>
	<tr>
		<th><?php echo $this->BcForm->label('CustomArticle.' . $currentCustomField['name'], $currentCustomField['title']) ?></th>
		<td><?php echo $this->BcForm->input('CustomArticle.' . $currentCustomField['name'], ['type' => 'textarea', 'rows' => 2]) ?></td>
	</tr>
	<?php endforeach ?>
</table>

<div class="submit">
	<?php echo $this->BcForm->submit('保存', ['class' => 'button']) ?>
</div>
<?php echo $this->BcForm->end() ?>
<?php endif ?>
