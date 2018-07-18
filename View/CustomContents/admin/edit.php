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
 */
?>


<?php echo $this->BcForm->create() ?>
<?php echo $this->BcForm->hidden('id') ?>
<?php echo $this->BcForm->hidden('content_id') ?>
<div class="submit">
<?php echo $this->BcForm->submit(__d('baser', '保存'), ['class' => 'button', 'div' => false]) ?>
<?php $this->BcBaser->link('記事の管理', ['controller' => 'custom_articles', 'action' => 'index', $this->BcForm->value('CustomContent.id')], ['class' => 'button']) ?>
</div>
<?php echo $this->BcForm->end() ?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<h2><?php echo __d('baser', 'フィールド一覧') ?></h2>

<?php if(!empty($this->data['CustomField'])): ?>
<table class="list-table">
    <tr>
        <th><?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', ['alt' => __d('baser', '新規追加')]) . ' ' . __d('baser', '新規追加'), ['controller' => 'custom_fields', 'action' => 'add', $this->BcForm->value('CustomContent.id')]) ?></th>
        <th><?php echo __d('baser', 'NO') ?></th>
        <th><?php echo __d('baser', 'フィールド名') ?></th>
        <th><?php echo __d('baser', 'タイトル') ?></th>
    </tr>
    <?php foreach($this->data['CustomField'] as $field): ?>
    <tr>
        <td><?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', ['alt' => __d('baser', '編集'), 'class' => 'btn']), ['controller' => 'custom_fields', 'action' => 'edit', $this->BcForm->value('CustomContent.id'), $field['id']], ['title' => __d('baser', '編集')]) ?></td>
        <td><?php echo h($field['id']) ?></td>
        <td><?php echo h($field['name']) ?></td>
        <td><?php echo h($field['title']) ?></td>
    </tr>
    <?php endforeach ?>    
</table>	
<?php else: ?>
<?php $this->BcBaser->link(__d('baser', 'フィールドを追加する'), ['controller' => 'custom_fields', 'action' => 'add', $this->BcForm->value('CustomContent.id')], ['class' => 'button-small']) ?>
<?php endif ?>


