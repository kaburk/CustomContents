<?php
/**
 * CustomContents :  baserCMS Plugin <https://github.com/ryuring/CustomContents>
 * Copyright (c) ryuring.com
 *
 * @copyright		Copyright (c) ryuring.com
 * @link			http://ryuring.com
 * @package			CustomContents.Controller
 * @since			baserCMS v 4.1.3
 * @license			MIT
 */

/**
 * Class CustomArticlesController
 *
 * @property CustomContent $CustomContent
 * @property CustomArticle $CustomArticle
 * @property BcContentsComponent $BcContents
 */
class CustomArticlesController extends AppController {

/**
 * Models
 * @var array
 */
	public $uses = ['CustomContents.CustomContent', 'CustomContents.CustomArticle'];

/**
 * Components
 * @var array
 */
	public $components = ['BcAuth', 'Cookie', 'BcAuthConfigure', 'BcContents' => ['type' => 'CustomContents.CustomContent']];

/**
 * 現在のカスタムコンテンツ
 * @var
 */
	public $currentCustomContent;

/**
 * 現在のカスタムフィールド
 * @var
 */
	public $currentCustomFields;

/**
 * Before Filter
 */
	public function beforeFilter() {
		parent::beforeFilter();
		if(empty($this->request->params['pass'][0])) {
			throw new BcException(__d('baser', '不正なURLです。カスタムコンテンツを特定できません。'));
		}
		$customContentId = $this->request->params['pass'][0];
		$content = $this->BcContents->getContent($customContentId);
		$customContents = $this->CustomContent->find('first', ['conditions' => ['CustomContent.id' => $customContentId]]);
		if(!$content || !$customContents) {
			throw new BcException(__d('baser', '指定したIDのカスタムコンテンツが見つかりません。'));
		}
		$this->request->params['Content'] = $content['Content'];
		$this->request->params['Site'] = $content['Site'];
		$this->currentCustomContent = $customContents['CustomContent'];
		$this->currentCustomFields = $customContents['CustomField'];
		$this->CustomArticle->setup($customContentId);
	}

/**
 * 記事一覧
 */
	public function admin_index() {
		$this->pageTitle = __d('baser', '記事一覧') . ' : ' . $this->request->params['Content']['title'];
		$this->set('articles', $this->CustomArticle->find('all'));
	}

/**
 * 記事追加
 * @param $customContentId
 * @throws Exception
 */
	public function admin_add($customContentId) {
		if($this->request->data) {
			$this->CustomArticle->create($this->request->data);
			if($this->CustomArticle->save()) {
				$this->setMessage(sprintf(__d('baser', '%s を新規登録しました。'), $this->CustomArticle->id), false, true);
				$this->redirect(['action' => 'edit', $customContentId, $this->CustomArticle->id]);
			} else {
				$this->setMessage(__d('baser', 'エラーが発生しました。内容を確認してください。'), true);
			}
		}
		$this->pageTitle = __d('baser', '新規登録') . ' : ' . $this->request->params['Content']['title'];
	}

/**
 * 記事編集
 * @param $customContentId
 * @param $customArticleId
 * @throws Exception
 */
	public function admin_edit($customContentId, $customArticleId) {
		if(!$customArticleId) {
			throw new BcException(__d('baser', '不正なアクセスです。'));
		}
		if(!$this->request->data) {
			$this->request->data = $this->CustomArticle->read(null, $customArticleId);
		} else {
			$this->CustomArticle->set($this->request->data);
			if($this->CustomArticle->save()) {
				$this->setMessage(sprintf(__d('baser', '%s を更新しました。'), $this->CustomArticle->id), false, true);
				$this->redirect(['action' => 'edit', $customContentId, $this->CustomArticle->id]);
			} else {
				$this->setMessage(__d('baser', 'エラーが発生しました。内容を確認してください。'), true);
			}
		}
		// @TODO first_name を 記事のタイトルに変更する
		$this->pageTitle = __d('baser', '編集') . ' : ' . $this->request->params['Content']['title'] . '「' . $this->request->data['CustomArticle']['first_name'] . '」';
	}

/**
 * Before Render
 */
	public function beforeRender() {
		parent::beforeRender();
		$this->set('currentCustomContent', $this->currentCustomContent);
		$this->set('currentCustomFields', $this->currentCustomFields);
	}

}