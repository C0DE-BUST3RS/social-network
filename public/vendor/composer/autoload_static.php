<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d7247d3025e799f5ec0e26694b81c48
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d7247d3025e799f5ec0e26694b81c48::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d7247d3025e799f5ec0e26694b81c48::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
