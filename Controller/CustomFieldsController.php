<?php
/**
 * CustomContents :  baserCMS Plugin <https://github.com/ryuring/CustomContents>
 * Copyright (c) ryuring.com
 *
 * @copyright		Copyright (c) ryuring.com
 * @link			http://ryuring.com
 * @package			CustomContents.Controller
 * @since			baserCMS v 4.1.2
 * @license			MIT
 */

/**
 * Class CustomFieldsController
 * @property CustomField $CustomField
 */
class CustomFieldsController extends AppController {


/**
 * コンポーネント
 *
 * @var array
 */
	public $components = ['Cookie', 'BcAuth', 'BcAuthConfigure'];
	
/**
 * フィールドを追加する
 * 
 * @param int $customContentId カスタムコンテンツID
 */
	public function admin_add($customContentId) {
		if(!$customContentId) {
			$this->notFound();
		}
		$this->pageTitle = __d('baser', 'カスタムフィールド追加');
		if(!$this->request->data) {
			$this->request->data = ['CustomField' => [
				'custom_content_id' => $customContentId,
				'type' => 'textarea'
			]];
		} else {
			$this->CustomField->create($this->request->data);
			if($this->CustomField->save()) {
				$this->setMessage(__d('baser', 'カスタムフィールド「%s」を追加しました。', $this->request->data['CustomField']['title']), false, true);
				$this->redirect(['action' => 'edit', $customContentId, $this->CustomField->id]);
			} else {
				$this->setMessage(__d('baser', '保存中にエラーが発生しました。入力内容を確認してください。'), true, true);
			}
		}
		$this->set('customContentId', $customContentId);
	}

/**
 * フィールドを編集する
 * 
 * @param int $customContentId カスタムコンテンツID
 * @param int $id
 */
	public function admin_edit($customContentId, $id) {
		if(!$customContentId || !$id) {
			$this->notFound();
		}
		$this->pageTitle = __d('baser', 'カスタムフィールド編集');
		if(!$this->request->data) {
			$this->request->data = $this->CustomField->read(null, $id);
		} else {
			if ($this->CustomField->save($this->request->data)) {
				$this->setMessage(__d('baser', 'カスタムフィールド「%s」を更新しました。', $this->request->data['CustomField']['title']), false, true);
				$this->redirect(['action' => 'edit', $customContentId, $id]);
			} else {
				$this->setMessage(__d('baser', '保存中にエラーが発生しました。入力内容を確認してください。'), true, true);
			}
		}
		$this->set('customContentId', $customContentId);
	}
	
}