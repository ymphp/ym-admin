<?php


namespace YmPhp\YmAdmin\Components\Widgets;


use YmPhp\YmAdmin\Components\Attrs\Button;
use YmPhp\YmAdmin\Components\Component;

class DialogButton extends Component
{

    use Button;

    protected $componentName = 'DialogButton';


    public static function make()
    {
        return new DialogButton();
    }

}
