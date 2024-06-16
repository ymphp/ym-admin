<?php


namespace YmPhp\YmAdmin\Grid\Actions;


use YmPhp\YmAdmin\Actions\BaseRowAction;

class DeleteAction extends BaseRowAction
{
    protected $componentName = "DeleteAction";

    protected $type = "text";

    protected $content = "删除";


    protected $message = "确定要删除此内容？";


}
