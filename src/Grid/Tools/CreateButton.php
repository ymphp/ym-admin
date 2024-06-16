<?php


namespace YmPhp\YmAdmin\Grid\Tools;


use YmPhp\YmAdmin\Actions\BaseAction;
use YmPhp\YmAdmin\Components\Attrs\Button;

class CreateButton extends BaseAction
{
    use Button;

    protected $componentName = "GridCreateButton";

    protected $isDialog = false;

    /**
     * @param bool $isDialog
     * @return CreateButton
     */
    public function isDialog(bool $isDialog)
    {
        $this->isDialog = $isDialog;
        return $this;
    }





}
