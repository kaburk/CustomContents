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

class CustomContentsAppModel extends AppModel {

/**
 * メッセージテーブルを作成する
 *
 * @param string $contentName コンテンツ名
 * @return boolean
 */
	public function createTable($customContentId) {
		/* @var DboSource $db */
		$db = $this->getDataSource();
		$schema = [
			'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'],
			'modified' => ['type' => 'datetime', 'null' => true, 'default' => null],
			'created' => ['type' => 'datetime', 'null' => true, 'default' => null],
			'indexes' => ['PRIMARY' => ['column' => 'id', 'unique' => 1]]
		];
		$table = $this->createTableName($customContentId);
		$ret = true;
		if ($this->tableExists($db->config['prefix'] . $table)) {
			$ret = $db->dropTable(array('table' => $table));
		}
		if (!$ret) {
			return false;
		}
		$ret = $db->createTable(array('schema' => $schema, 'table' => $table));
		$this->deleteModelCache();
		return $ret;
	}

/**
 * テーブル名を生成する
 * int型でなかったら強制終了
 * @param $mailContentId
 * @return string
 */
	public function createTableName($customContentId) {
		$customContentId = (int) $customContentId;
		if(is_int($customContentId)) {
			return 'custom_contents_articles_' . $customContentId;
		} else {
			throw new BcException(__d('baser', 'createTableName の引数 $customContentId はint型しか受けつけていません。'));
		}
	}

}