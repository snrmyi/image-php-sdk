<?php
/**
 * Some settings for SDK.
 */
namespace QcloudImage;

/**
 * Conf class.
 */
class Conf {
	//请到http://console.qcloud.com/cos去获取你的appid、sid、skey
	const BUCKET = 'you bucket name';
	const APPID = 'your appid';
	const SECRET_ID = 'your secret id';
	const SECRET_KEY = 'you secret key';

    private static $VERSION = '1.0.0';
    private static $SERVER_ADDR = 'service.image.myqcloud.com';
    private static $HEADER_HOST = 'service.image.myqcloud.com';
    private $REQ_TIMEOUT = 60;
    private $SCHEME = 'http';
    
	public function useHttp() {
		$this->SCHEME = 'http';
	}
	public function useHttps() {
		$this->SCHEME = 'https';
	}
	public function setTimeout($timeout) {
		if ($timeout > 0) {
			$this->REQ_TIMEOUT = $timeout;
		}
	}
	public function timeout() {
		return $this->REQ_TIMEOUT;
	}
	public function host() {
		return self::$HEADER_HOST;
	}
	
	public function buildUrl($uri) {
		return $this->SCHEME.'://'.self::$SERVER_ADDR.'/'.ltrim($uri, "/");
	}
	
	public static function getUa($appid = null) {
		$ua = 'CIPhpSDK/'.self::$VERSION.' ('.php_uname().')';
		if ($appid) {
			$ua .= " User($appid)";
		}
		return $ua;
	}
}
