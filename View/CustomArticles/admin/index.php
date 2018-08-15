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
 * @var array $articles 記事一覧データ
 */
$this->BcListTable->setColumnNumber(count($currentCustomFields) + 3);
?>


<table class="list-table">
    <tr>
        <th><?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', ['alt' => __d('baser', '新規追加')]) . ' ' . __d('baser', '新規追加'), ['controller' => 'custom_articles', 'action' => 'add', $currentCustomContent['id'], $this->BcForm->value('CustomContent.id')]) ?></th>
<?php if($currentCustomFields): ?>
	<?php foreach($currentCustomFields as $currentCustomField): ?>
		<th><?php echo $this->Paginator->sort($currentCustomField['name'], ['asc' => $this->BcBaser->getImg('admin/blt_list_down.png', ['alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順')]) . ' ' . __d('baser', $currentCustomField['title']), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', ['alt' => __d('baser', '降順'), 'title' => __d('baser', '降順')]) . ' ' . __d('baser', $currentCustomField['title'])], ['escape' => false, 'class' => 'btn-direction']) ?></th>
	<?php endforeach ?>
<?php endif ?>
        <?php echo $this->BcListTable->dispatchShowHead() ?>
		<th>
			<?php echo $this->Paginator->sort('created', ['asc' => $this->BcBaser->getImg('admin/blt_list_down.png', ['alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順')]) . __d('baser', ' 作成日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', ['alt' => __d('baser', '降順'), 'title' => __d('baser', '降順')]) . __d('baser', ' 作成日')], ['escape' => false, 'class' => 'btn-direction']) ?><br>
			<?php echo $this->Paginator->sort('modified', ['asc' => $this->BcBaser->getImg('admin/blt_list_down.png', ['alt' => __d('baser', '昇順'), 'title' => __d('baser', '昇順')]) . __d('baser', ' 更新日'), 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', ['alt' => __d('baser', '降順'), 'title' => __d('baser', '降順')]) . __d('baser', ' 更新日')], ['escape' => false, 'class' => 'btn-direction']) ?>
		</th>
    </tr>
<?php if(!empty($articles)): ?>
    <?php foreach($articles as $article): ?>
    <tr>
        <td><?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', ['alt' => __d('baser', '編集'), 'class' => 'btn']), ['controller' => 'custom_articles', 'action' => 'edit', $currentCustomContent['id'], $article['CustomArticle']['id']], ['title' => __d('baser', '編集')]) ?></td>
<?php if($currentCustomFields): ?>
	<?php foreach($currentCustomFields as $currentCustomField): ?>
        <td><?php echo h($article['CustomArticle'][$currentCustomField['name']]) ?></td>
	<?php endforeach ?>
<?php endif ?>
        <?php echo $this->BcListTable->dispatchShowRow($article) ?>
		<td>
			<?php echo $this->BcTime->format('Y-m-d', $article['CustomArticle']['created']) ?><br />
			<?php echo $this->BcTime->format('Y-m-d', $article['CustomArticle']['modified']) ?>
		</td>
    </tr>
    <?php endforeach ?>
<?php else: ?>
	<tr><td colspan="<?php echo $this->BcListTable->getColumnNumber() ?>"><p class="no-data"><?php __d('baser', 'データが見つかりませんでした。') ?></p></td></tr>
<?php endif ?>
</table>
