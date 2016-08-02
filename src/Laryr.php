<?php

namespace Siokas\Laryr;

use Symfony\Component\Yaml\Yaml;

class Laryr
{
    protected $routesFromYaml;

    /**
     * Create a new Laryr Instance.
     * Parse the contents of the routes.yml file
     */
    public function __construct($path)
    {
        $this->routesFromYaml = Yaml::parse(file_get_contents($path));
    }

    /**
     * Get the array of routes that are parsed from the yaml file.
     *
     * @return array
     */
    public function getRoutesFromYaml()
    {
        return $this->routesFromYaml;
    }
}
