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
 * Class CustomContentsController
 * 
 * @property CustomContent $CustomContent
 * @property CookieComponent $Cookie
 * @property BcAuthComponent $BcAuth
 * @property BcAuthConfigureComponent $BcAuthConfigure
 * @property BcContentsComponent $BcContents
 */
class CustomContentsController extends AppController {

/**
 * コンポーネント
 *
 * @var array
 */
	public $components = ['Cookie', 'BcAuth', 'BcAuthConfigure', 'BcContents' => ['useForm' => true]];

/**
 * コンテンツを追加する
 *
 * @return string Or false
 */
	public function admin_add() {
		$this->autoRender = false;
		if(!$this->request->data) {
			$this->ajaxError(500, __d('baser', '無効な処理です。'));
		}
		if ($data = $this->CustomContent->save($this->request->data)) {
			$this->setMessage(__d('baser', 'カスタムコンテンツ「%s」を追加しました。', $this->request->data['Content']['title']), false, true, false);
			return json_encode($data['Content']);
		} else {
			$this->ajaxError(500, __d('baser', '保存中にエラーが発生しました。'));
		}
		return false;
	}

/**
 * コンテンツを更新する
 *
 * @param int $id
 * @return void
 */
	public function admin_edit($id) {
		if(!$id) {
			$this->notFound();
		}
		$this->pageTitle = __d('baser', 'カスタムコンテンツ設定編集');
		if(!$this->request->data) {
			$this->request->data = $this->CustomContent->read(null, $id);
		} else {
			if ($this->CustomContent->save($this->request->data)) {
				$this->setMessage(__d('baser', 'カスタムコンテンツ「%s」を更新しました。', $this->request->data['Content']['title']), false, true);
				$this->redirect(['action' => 'edit', $id]);
			} else {
				$this->setMessage(__d('baser', '保存中にエラーが発生しました。入力内容を確認してください。'), true, true);
			}
		}
		$this->set('publishLink', $this->request->data['Content']['url']);
	}
	
}