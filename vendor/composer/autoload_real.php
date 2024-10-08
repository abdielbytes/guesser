<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf18e7a048e15a18782e351e1fe6ce089
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf18e7a048e15a18782e351e1fe6ce089', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf18e7a048e15a18782e351e1fe6ce089', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf18e7a048e15a18782e351e1fe6ce089::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
