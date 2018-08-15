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
 * Class CustomContentController
 * @property CustomArticle $CustomArticle
 */
class CustomContentController extends AppController {

/**
 * Models
 * @var array
 */
	public $uses = ['CustomContents.CustomArticle'];

	public function beforeFilter() {
		parent::beforeFilter();
		if(empty($this->request->params['entityId'])) {
			$this->notFound();
		}
		$this->CustomArticle->setup($this->request->params['entityId']);
	}

/**
 * 記事一覧
 */
 	public function index() {
		$this->set('articles', $this->CustomArticle->find('all'));
 	}

/**
 * 記事詳細
 * @param $customArticleId
 */
 	public function detail($customArticleId) {
		$this->set('article', $this->CustomArticle->find('first', ['conditions' => ['CustomArticle.id' => $customArticleId]]));
 	}

 }