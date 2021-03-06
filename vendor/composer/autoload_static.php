<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0caf0321537d0a72cf44a6854dbd823f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0caf0321537d0a72cf44a6854dbd823f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0caf0321537d0a72cf44a6854dbd823f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0caf0321537d0a72cf44a6854dbd823f::$classMap;

        }, null, ClassLoader::class);
    }
}
