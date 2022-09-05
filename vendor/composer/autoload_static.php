<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit470a04c20ffb3bced06e7c160e399d88
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Controller\\' => 11,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controller',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit470a04c20ffb3bced06e7c160e399d88::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit470a04c20ffb3bced06e7c160e399d88::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit470a04c20ffb3bced06e7c160e399d88::$classMap;

        }, null, ClassLoader::class);
    }
}