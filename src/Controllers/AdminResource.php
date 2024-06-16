<?php


namespace YmPhp\YmAdmin\Controllers;


interface AdminResource
{
    public function grid();

    public function form($isEdit = false);

}
