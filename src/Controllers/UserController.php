<?php

namespace YmPhp\YmAdmin\Controllers;

use YmPhp\YmAdmin\Components\Attrs\SelectOption;
use YmPhp\YmAdmin\Components\Form\Input;
use YmPhp\YmAdmin\Components\Form\Select;
use YmPhp\YmAdmin\Components\Form\Upload;
use YmPhp\YmAdmin\Components\Grid\Avatar;
use YmPhp\YmAdmin\Components\Grid\Tag;
use YmPhp\YmAdmin\Form;
use YmPhp\YmAdmin\Grid;
use YmPhp\YmAdmin\Layout\Column;
use YmPhp\YmAdmin\Layout\Row;

class UserController extends AdminController
{

    protected function grid()
    {

        $userModel = config('admin.database.users_model');
        $grid = new Grid(new $userModel());
        $grid
            ->quickSearch(['name', 'username'])
            ->quickSearchPlaceholder("用户名 / 名称")
            ->pageBackground()
            ->defaultSort('id', 'asc')
            ->selection()
            ->stripe(true)->emptyText("暂无用户")
            ->perPage(10)
            ->autoHeight();

        $grid->column('id', "ID")->width(80);
        $grid->column('avatar', '头像')->width(80)->align('center')->component(Avatar::make());
        $grid->column('username', "用户名");
        $grid->column('name', '用户昵称');
        $grid->column('roles.name', "角色")->component(Tag::make()->effect('dark'));
        $grid->column('created_at');
        $grid->column('updated_at');

        return $grid;
    }

    protected function form()
    {

        $userModel = config('admin.database.users_model');
        $permissionModel = config('admin.database.permissions_model');
        $roleModel = config('admin.database.roles_model');
        $form = new Form(new $userModel());

        $userTable = config('admin.database.users_table');
        $connection = config('admin.database.connection');


        $form->item('avatar', '头像')->component(Upload::make()->avatar()->path('avatar')->uniqueName());
        $form->row(function (Row $row, Form $form) use ($userTable, $connection) {
            $row->column(8, $form->rowItem('username', '用户名')
                ->serveCreationRules(['required', "unique:{$connection}.{$userTable}"])
                ->serveUpdateRules(['required', "unique:{$connection}.{$userTable},username,{{id}}"])
                ->component(Input::make())->required());
            $row->column(8, $form->rowItem('name', '名称')->component(Input::make()->showWordLimit()->maxlength(20))->required());
        });

        $form->row(function (Row $row, Form $form) {
            $row->column(8, $form->rowItem('password', '密码')->serveCreationRules(['required', 'string', 'confirmed'])->serveUpdateRules(['confirmed'])->ignoreEmpty()
                ->component(function () {
                    return Input::make()->password()->showPassword();
                }));

            $row->column(8, $form->rowItem('password_confirmation', '确认密码')
                ->copyValue('password')->ignoreEmpty()
                ->component(function () {
                    return Input::make()->password()->showPassword();
                }));
        });
        $form->item('roles', '角色')->component(Select::make()->block()->multiple()->options($roleModel::all()->map(function ($role) {
            return SelectOption::make($role->id, $role->name);
        })->toArray()));
        $form->item('permissions', '权限')->component(Select::make()->clearable()->block()->multiple()->options($permissionModel::all()->map(function ($role) {
            return SelectOption::make($role->id, $role->name);
        })->toArray()));

        $form->saving(function (Form $form) {
            if ($form->password) {
                $form->password = bcrypt($form->password);
            }
        });

        $form->deleting(function (Form $form, $id) {
            if (\Admin::user()->id == $id || $id == 1) {
                return \Admin::responseError("删除失败");
            }
        });
        return $form;
    }
}
