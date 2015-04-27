<?php

abstract class Controller {

	/**
	 * Get a page from Freenet
	 * @param  string $url
	 * @return string
	 */
	protected function _getPage($url = '/') {
		$url = \Base::instance()->get('freenet_base') . ltrim($url, '/');
		return file_get_contents($url);
	}

	/**
	 * Get a phpQuery instance for a page from Freenet
	 * @param  string $url
	 * @return phpQueryObject
	 */
	protected function _getPQ($url = '/') {
		$url = \Base::instance()->get('freenet_base') . ltrim($url, '/');
		return \phpQuery::newDocumentFileHTML($url);
	}

	/**
	 * Render a view
	 * @param string  $file
	 * @param string  $mime
	 * @param array   $hive
	 * @param integer $ttl
	 */
	protected function _render($file, $mime = 'text/html', array $hive = null, $ttl = 0) {
		echo \Helper\View::instance()->render($file, $mime, $hive, $ttl);
	}

	/**
	 * Output object as JSON and set appropriate headers
	 * @param mixed $object
	 */
	protected function _printJson($object) {
		if(!headers_sent()) {
			header('Content-type: application/json');
		}
		echo json_encode($object);
	}

}
