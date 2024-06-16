<?php
namespace YmPhp\YmAdmin\Components\Form;

use YmPhp\YmAdmin\Components\Component;

class ItemSelect extends Component
{
    protected $componentName = "ItemSelect";

    public static function make()
    {
        return new ItemSelect();
    }

}
