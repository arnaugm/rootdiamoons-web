<?php

namespace App\Manager;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class RecopManager
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    public function getRecops()
    {
        $configDirectories = array(__DIR__);

        $locator = new FileLocator($configDirectories);
        $yamlRecopsFile = $locator->locate('recops.yml', null, true);

        return Yaml::parse(file_get_contents($yamlRecopsFile));
    }
} 