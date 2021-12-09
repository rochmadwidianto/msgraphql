<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit210c9f38d2f511ec2ccc64554d4cd4e8
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'GraphQL\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'GraphQL\\' => 
        array (
            0 => __DIR__ . '/..' . '/webonyx/graphql-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit210c9f38d2f511ec2ccc64554d4cd4e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit210c9f38d2f511ec2ccc64554d4cd4e8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit210c9f38d2f511ec2ccc64554d4cd4e8::$classMap;

        }, null, ClassLoader::class);
    }
}