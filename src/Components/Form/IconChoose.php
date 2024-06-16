<?php

namespace YmPhp\YmAdmin\Components\Form;

use YmPhp\YmAdmin\Components\Component;

class IconChoose extends Component
{
    protected $componentName = "IconChoose";

    public static function make($value = null)
    {
        return new IconChoose($value);
    }

}
