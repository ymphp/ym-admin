<?php


namespace YmPhp\YmAdmin\Components\Widgets;


use YmPhp\YmAdmin\Components\Attrs\ElDialog;
use YmPhp\YmAdmin\Components\Component;

class Dialog extends Component
{
    use ElDialog;

    protected $componentName = "Dialog";


    public static function make()
    {
        return new Dialog();
    }

}
