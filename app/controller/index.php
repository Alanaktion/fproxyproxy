<?php

namespace Controller;

class Index extends \Controller {

	function index($f3) {
		$pq = $this->_getPQ('/');
		echo $pq->find('.progressbar-peers + div')->text();

		/**
		 * Bookmarks associative array
		 * @var  array
		 * @todo Make this work with bookmarks not in a category
		 */
		$bookmarks = array();
		foreach($pq->find('.bookmarks-box .cat') as $i => $cat) {
			$cat = pq($cat);
			$bookmarks["cat_$i"] = array(
				'title' => $cat->text(),
				'items' => array(),
			);
			foreach($cat->next()->find('td:nth-child(2)') as $item) {
				$item = pq($item);
				$bookmarks["cat_$i"]['items'][] = array(
					'title' => $item->find('a')->text(),
					'href' => $item->find('a')->attr('href'),
					'html' => trim($item->html()),
				);
			}
		}

		echo '<pre>';
		print_r($bookmarks);

	}

}
