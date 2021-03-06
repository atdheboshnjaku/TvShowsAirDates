<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2a9eac3282291ba55d59d33fdfd22544
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Atdhe\\Tvshowsapi\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Atdhe\\Tvshowsapi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2a9eac3282291ba55d59d33fdfd22544::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2a9eac3282291ba55d59d33fdfd22544::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2a9eac3282291ba55d59d33fdfd22544::$classMap;

        }, null, ClassLoader::class);
    }
}
