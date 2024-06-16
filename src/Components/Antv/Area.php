<?php

namespace YmPhp\YmAdmin\Components\Antv;

use Illuminate\Support\Str;
use YmPhp\YmAdmin\Components\Component;

class Area extends Line
{
    protected $componentName = "AntvArea";
    protected $canvasId;
    protected $data;
    protected $config;


    public static function make()
    {
        return new Area();
    }


}
