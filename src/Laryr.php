<?php

namespace Siokas\Laryr;

use Symfony\Component\Yaml\Yaml;

class Laryr
{
    protected $path;

    /**
     * Create a new Laryr Instance.
     * Parse the contents of the routes.yml file
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Get the array of routes that are parsed from the yaml file.
     *
     * @return array
     */
    public function getRoutesFromYaml()
    {
        $routesFromYaml = Yaml::parse(file_get_contents($this->path));

        return $routesFromYaml;
    }
}
