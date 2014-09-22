<?php
App::uses('ConfigReaderInterface', 'Configure');
class SyncTool {
	// take a server as parameter and return a HttpSocket object using the ssl options defined in the server settings
	public function setupHttpSocket($server, $options = array()) {
		$params = array();
        $defaults = array('proxy' => Configure::read('Proxy'));
        $options = array_merge($defaults, $options);

		App::uses('HttpSocket', 'Network/Http');
		if ($server['Server']['cert_file'])	$params['ssl_cafile'] = APP . "files" . DS . "certs" . DS . $server['Server']['id'] . '.pem';
		if ($server['Server']['self_signed']) $params['ssl_allow_self_signed'] = $server['Server']['self_signed'];
		$HttpSocket = new HttpSocket($params);

        if(!empty($options['proxy']['enabled'])){
            unset($options['proxy']['enabled']);
            $HttpSocket->configProxy($options['proxy']);
        }
		return $HttpSocket;
	}
}
