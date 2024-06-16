<?php


namespace YmPhp\YmAdmin\Controllers;


use YmPhp\YmAdmin\Components\Attrs\TransferData;
use YmPhp\YmAdmin\Components\Form\Transfer;
use YmPhp\YmAdmin\Components\Grid\Tag;
use YmPhp\YmAdmin\Form;
use YmPhp\YmAdmin\Grid;

class RoleController extends AdminController
{


    protected function grid()
    {
        $roleModel = config('admin.database.roles_model');

        $grid = new Grid(new $roleModel());

        $grid->quickSearch(['slug', 'name']);

        $grid->column('id', 'ID')->width('80px')->sortable();
        $grid->column('slug', "标识");
        $grid->column('name', "名称");
        $grid->column('permissions.name', "权限")->component(Tag::make()->type('info'));
        $grid->column('created_at');
        $grid->column('updated_at');
        $grid->dialogForm($this->form()->isDialog()->labelWidth("auto")->className('p-15'), '700px', ['添加角色', '编辑角色']);
        return $grid;
    }

    public function form()
    {
        $permissionModel = config('admin.database.permissions_model');
        $roleModel = config('admin.database.roles_model');
        $form = new Form(new $roleModel());

        $form->item('slug', "标识")->required()->inputWidth(8);
        $form->item('name', "名称")->required()->inputWidth(8);
        $form->item('permissions', "权限", 'permissions.id')->component(
            Transfer::make()->data($permissionModel::get()->map(function ($item) {
                return TransferData::make($item->id, $item->name);
            }))->titles(['可授权', '已授权'])->filterable()
        );
        return $form;
    }
}
