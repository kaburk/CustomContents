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
 * @var array $articles
 */
?>


<?php if($articles): ?>
<ul>
<?php foreach($articles as $article): ?>
	<li><?php $this->BcBaser->link($article['CustomArticle']['first_name'], $this->BcBaser->getContentsUrl(null, false, null, false) . 'detail/' . $article['CustomArticle']['id']) ?></li>
<?php endforeach ?>
</ul>
<?php else: ?>
<p>記事がありません。</p>
<?php endif ?>

