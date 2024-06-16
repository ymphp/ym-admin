<?php


namespace YmPhp\YmAdmin\Grid\Actions;


use YmPhp\YmAdmin\Actions\BaseRowAction;

class EditAction extends BaseRowAction
{


    protected $componentName = "EditAction";

    protected $type = "text";

    protected $content = "编辑";

    protected $isDialog = false;

    /**
     * @param bool $isDialog
     * @return EditAction
     */
    public function isDialog(bool $isDialog=true)
    {
        $this->isDialog = $isDialog;
        return $this;
    }



}
