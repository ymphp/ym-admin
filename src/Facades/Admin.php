<?php

namespace YmPhp\YmAdmin\Facades;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \YmPhp\YmAdmin\Admin::class;
    }
}
