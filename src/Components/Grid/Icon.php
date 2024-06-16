<?php


namespace YmPhp\YmAdmin\Components\Grid;


use YmPhp\YmAdmin\Components\GridComponent;

class Icon extends GridComponent
{
    protected $componentName = "Icon";

    static public function make($value = null)
    {
        return new Icon($value);
    }

}
