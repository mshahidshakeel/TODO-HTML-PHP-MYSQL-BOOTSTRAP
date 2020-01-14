<?php

class Todo
{
    private $id = null;
    private $title = null;
    private $descrip = null;
    private $time_added = null;

    /**
     * Todo constructor.
     * @param null $id
     * @param null $title
     * @param null $descrip
     * @param null $time_added
     */
    public function __construct($id, $title, $descrip, $time_added)
    {
        $this->id = $id;
        $this->title = $title;
        $this->descrip = $descrip;
        $this->time_added = $time_added;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * @param null $descrip
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;
    }

    /**
     * @return null
     */
    public function getTimeAdded()
    {
        return $this->time_added;
    }

    /**
     * @param null $time_added
     */
    public function setTimeAdded($time_added)
    {
        $this->time_added = $time_added;
    }

}