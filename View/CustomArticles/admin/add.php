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
 */
 ?>


<?php if($currentCustomFields): ?>
<?php echo $this->BcForm->create('CustomArticle', ['url' => [$currentCustomContent['id']]]) ?>

<table class="form-table">
	<?php foreach($currentCustomFields as $currentCustomField): ?>
	<tr>
		<th><?php echo $this->BcForm->label('CustomArticle.' . $currentCustomField['name'], $currentCustomField['title']) ?></th>
		<td><?php echo $this->BcForm->input('CustomArticle.' . $currentCustomField['name'], ['type' => 'textarea']) ?></td>
	</tr>
	<?php endforeach ?>
</table>

<div class="submit">
	<?php echo $this->BcForm->submit('保存', ['class' => 'button']) ?>
</div>
<?php echo $this->BcForm->end() ?>
<?php endif ?>
