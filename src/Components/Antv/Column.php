<?php

namespace YmPhp\YmAdmin\Components\Antv;

class Column extends Line
{
    protected $componentName = "AntvColumn";
    protected $canvasId;
    protected $data;
    protected $config;


    public static function make()
    {
        return new Column();
    }


}
