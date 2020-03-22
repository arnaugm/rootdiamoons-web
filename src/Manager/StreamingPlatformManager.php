<?php

namespace App\Manager;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class StreamingPlatformManager
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    public function getPlatforms()
    {
        $configDirectories = array(__DIR__);

        $locator = new FileLocator($configDirectories);
        $yamlPlatformsFile = $locator->locate('streaming_platforms.yml', null, true);

        return Yaml::parse(file_get_contents($yamlPlatformsFile));
    }
} 