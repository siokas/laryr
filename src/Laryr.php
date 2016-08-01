<?php

namespace Siokas\Laryr;

use Symfony\Component\Yaml\Yaml;

class Laryr
{
    protected $routesFromYaml;
    /**
     * Create a new Laryr Instance
     */
    public function __construct()
    {
        $this->routesFromYaml = Yaml::parse(file_get_contents(base_path('routes.yml')));
    }

    public function getRoutesFromYaml()
    {

        return $this->routesFromYaml;
    }

}
