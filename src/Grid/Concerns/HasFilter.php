<?php


namespace YmPhp\YmAdmin\Grid\Concerns;


use Closure;
use YmPhp\YmAdmin\Grid\Filter;

trait HasFilter
{
    /**
     * @var Filter
     */
    protected $filter;



    public function applyFilter($toArray = true)
    {

        return $this->filter->execute($toArray);
    }


    public function filter(Closure $callback)
    {
        call_user_func($callback, $this->filter);
    }
}
