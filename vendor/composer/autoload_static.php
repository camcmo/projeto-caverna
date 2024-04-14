<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit84944e59d978f9937bdddc6cd34cb678
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'C' => 
        array (
            'CavernaGames\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'CavernaGames\\' => 
        array (
            0 => __DIR__ . '/..' . '/project/php-classes/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit84944e59d978f9937bdddc6cd34cb678::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit84944e59d978f9937bdddc6cd34cb678::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit84944e59d978f9937bdddc6cd34cb678::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit84944e59d978f9937bdddc6cd34cb678::$classMap;

        }, null, ClassLoader::class);
    }
}
