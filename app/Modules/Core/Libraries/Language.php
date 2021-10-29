<?php
namespace MVP\Core\Libraries;

class Language {

	private static $props = array();
	private static $instance;
	public static $deft_lang = 'ru';

	private function __construct(){
	    $config = config('App');
		self::$deft_lang = $config->defaultLocale;
	}

	public static function getInstance(){
		if (empty(self::$instance)) {
			self::$instance = new Language();
		}
		self::setLang();
		return self::$instance;
	}

	private static function setLang(){

		$files = scandir(APPPATH . '/Modules');
		foreach ($files as $p => $pa) {
			if($pa != '.' and $pa != '..') {
				$files[$p] = APPPATH . 'Modules/' . $pa.'/Language/'.self::$deft_lang.'.json';
			}
		}

		if(is_dir(ROOTPATH.'/modules')) {
			$files_pak = scandir(ROOTPATH.'/modules');
			foreach ($files_pak as $p => $pa) {
				$str = substr($pa, 0, 3);
				if (!in_array($pa, $files) and $str == 'mod') {
					array_push($files, ROOTPATH.'modules/'.$pa.'/Language/'.self::$deft_lang.'.json');
				}
			}
		}

		$files_new = [];
		foreach ($files as $val){
			if($val != '.' and $val != '..'){
				$files_new[] = $val;
			}
		}
		self::$props = [];
		self::$props[self::$deft_lang] = [];
		foreach ($files_new as $l => $la)
		{
			if(file_exists($la)) {
				$json = file_get_contents($la);
				if(json_decode($json, true))
					self::$props[self::$deft_lang] += json_decode($json, true);
			}
		}
	}
	public function search($key, $replace = NULL){
		if (!empty(self::$props[self::$deft_lang])) {
			if (array_key_exists($key, self::$props[self::$deft_lang]))
				$data = self::$props[self::$deft_lang][$key];
			else $data = $key;
		} else $data = $key;

		preg_match_all("'\\[(.+?)\\]'si", $key,$search);
		$search = $replace == NULL ? null : $search[0];

		return $replace != NULL ? str_replace($search, $replace, $data) : $data;
	}
}
