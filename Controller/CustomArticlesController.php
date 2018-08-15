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

	public function admin_add($customContentId) {
		$this->pageTitle = __d('baser', '新規登録') . ' : ' . $this->request->params['Content']['title'];
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