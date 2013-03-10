<?php

class Traslator {

	private $currentLanguage="en";

	private static $instance;

    private function __construct() {}

	/**
    *    Returns THE instance of 'UserHandles'.
	*
    *    @return    object
    **/

    public static function getInstance()
    {
        if ( !isset(self::$instance))
        {
            self::$instance = new self;

        }
        return self::$instance;
    }



	function register_translations($path, $load_all = false) {
		if ($handle = opendir($path)) {
		while ($language = readdir($handle)) {
			if (
				((in_array($language, array('en.php', $this->current_language . '.php'))) /*&& (!is_dir($path . $language))*/) ||
				(($load_all) && (strpos($language, '.php')!==false)/* && (!is_dir($path . $language))*/)
			) {
				include_once($path . $language);
			}
		}
	}
	}

}
