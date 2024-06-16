<?php


namespace YmPhp\YmAdmin\Components\Grid;


use YmPhp\YmAdmin\Components\Component;

class Boole extends Component
{
    protected $componentName = "Boole";


    public static function make($value = null)
    {
        return new Boole($value);
    }

}
