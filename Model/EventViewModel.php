<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 03.12.2015
 * Time: 21:17
 */
namespace Model;

class EventViewModel extends BaseEntity
{
    public $id;
    public $title;
    public $backgroundColor;
    public $start;
    public $end;

    public function __construct($id,$title,$backgroundColor,$start,$end)
    {
        $this->id = $id;
        $this->backgroundColor = $backgroundColor;
        $this->end = $end;
        $this->start = $start;
        $this->title=$title;
    }
}