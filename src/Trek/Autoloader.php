<?php

namespace Trek;

/**
 * The autoloader
 * 
 * @category Autoloading
 * @package  Trek
 * @author   Trey Shugart <treshugart@gmail.com>
 * @license  MIT http://www.opensource.org/licenses/mit-license.php
 */
class Autoloader
{
    /**
     * The namespace of the autoloader.
     * 
     * @var string
     */
    const NS = 'Trek';

    /**
     * Registers autoloading.
     * 
     * @return void
     */
    public static function register()
    {
        spl_autoload_register(array('\\' . self::NS . '\Autoloader', 'autoload'));
    }

    /**
     * Autoloads the specified class.
     * 
     * @param string $class The class to autoload.
     * 
     * @return void
     */
    public static function autoload($class)
    {
        if (strpos($class, self::NS) === 0) {
            include dirname(__FILE__) 
                  . '/../' 
                  . str_replace(array('_', '\\'), DIRECTORY_SEPARATOR, $class) . '.php';
        }
    }
}