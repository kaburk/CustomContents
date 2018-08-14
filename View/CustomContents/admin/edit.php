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
$this->BcListTable->setColumnNumber(5);
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

<table class="list-table">
    <tr>
        <th><?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', ['alt' => __d('baser', '新規追加')]) . ' ' . __d('baser', '新規追加'), ['controller' => 'custom_fields', 'action' => 'add', $this->BcForm->value('CustomContent.id')]) ?></th>
        <th><?php echo $this->Paginator->sort('id', ['asc' => $this->BcBaser->getImg('admin/blt_list_down.png', ['alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順')]) . __d('baser', ' NO'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', ['alt' => __d('baser', '降順'), 'title' => __d('baser', '降順')]) . __d('baser', ' NO')], ['escape' => false, 'class' => 'btn-direction']) ?></th>
        <th><?php echo $this->Paginator->sort('name', ['asc' => $this->BcBaser->getImg('admin/blt_list_down.png', ['alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順')]) . __d('baser', ' フィールド名'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', ['alt' => __d('baser', '降順'), 'title' => __d('baser', '降順')]) . __d('baser', ' フィールド名')], ['escape' => false, 'class' => 'btn-direction']) ?></th>
        <th><?php echo $this->Paginator->sort('title', ['asc' => $this->BcBaser->getImg('admin/blt_list_down.png', ['alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順')]) . __d('baser', ' タイトル'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', ['alt' => __d('baser', '降順'), 'title' => __d('baser', '降順')]) . __d('baser', ' タイトル')], ['escape' => false, 'class' => 'btn-direction']) ?></th>
        <?php echo $this->BcListTable->dispatchShowHead() ?>
		<th>
			<?php echo $this->Paginator->sort('created', ['asc' => $this->BcBaser->getImg('admin/blt_list_down.png', ['alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順')]) . __d('baser', ' 作成日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', ['alt' => __d('baser', '降順'), 'title' => __d('baser', '降順')]) . __d('baser', ' 作成日')], ['escape' => false, 'class' => 'btn-direction']) ?><br>
			<?php echo $this->Paginator->sort('modified', ['asc' => $this->BcBaser->getImg('admin/blt_list_down.png', ['alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順')]) . __d('baser', ' 更新日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', ['alt' => __d('baser', '降順'), 'title' => __d('baser', '降順')]) . __d('baser', ' 更新日')], ['escape' => false, 'class' => 'btn-direction']) ?>
		</th>
    </tr>
<?php if(!empty($this->data['CustomField'])): ?>
    <?php foreach($this->data['CustomField'] as $field): ?>
    <tr>
        <td><?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', ['alt' => __d('baser', '編集'), 'class' => 'btn']), ['controller' => 'custom_fields', 'action' => 'edit', $this->BcForm->value('CustomContent.id'), $field['id']], ['title' => __d('baser', '編集')]) ?></td>
        <td><?php echo h($field['id']) ?></td>
        <td><?php echo h($field['name']) ?></td>
        <td><?php echo h($field['title']) ?></td>
        <?php echo $this->BcListTable->dispatchShowRow($data) ?>
		<td>
			<?php echo $this->BcTime->format('Y-m-d', $field['created']) ?><br />
			<?php echo $this->BcTime->format('Y-m-d', $field['modified']) ?>
		</td>
    </tr>
    <?php endforeach ?>
<?php else: ?>
	<tr><td colspan="<?php echo $this->BcListTable->getColumnNumber() ?>"><p class="no-data"><?php __d('baser', 'データが見つかりませんでした。') ?></p></td></tr>
<?php endif ?>
</table>	


