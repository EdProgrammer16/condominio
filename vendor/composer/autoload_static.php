<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita32fdc4b96065863963d2e5d60dd2c9c
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tests\\' => 6,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'L' => 
        array (
            'League\\Uri\\' => 11,
            'League\\OAuth2\\Server\\' => 21,
            'League\\Event\\' => 13,
            'Lcobucci\\JWT\\' => 13,
            'Lcobucci\\Clock\\' => 15,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'D' => 
        array (
            'Defuse\\Crypto\\' => 14,
        ),
        'C' => 
        array (
            'Core\\' => 5,
            'Config\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'League\\Uri\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/uri/src',
            1 => __DIR__ . '/..' . '/league/uri-interfaces/src',
        ),
        'League\\OAuth2\\Server\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/oauth2-server/src',
        ),
        'League\\Event\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/event/src',
        ),
        'Lcobucci\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/jwt/src',
        ),
        'Lcobucci\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/clock/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Defuse\\Crypto\\' => 
        array (
            0 => __DIR__ . '/..' . '/defuse/php-encryption/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita32fdc4b96065863963d2e5d60dd2c9c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita32fdc4b96065863963d2e5d60dd2c9c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita32fdc4b96065863963d2e5d60dd2c9c::$classMap;

        }, null, ClassLoader::class);
    }
}
