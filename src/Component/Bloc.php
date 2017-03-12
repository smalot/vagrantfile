<?php

namespace Smalot\Vagrant\Generator\Component;

/**
 * Class Bloc
 * @package Smalot\Vagrant\Generator\Component
 */
class Bloc implements BaseInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Comment
     */
    protected $comment;

    /**
     * @var BaseInterface[]
     */
    protected $childs;

    /**
     * Bloc constructor.
     * @param string $name
     * @param Comment $comment
     * @param BaseInterface[] $childs
     */
    public function __construct($name, Comment $comment = null, $childs = [])
    {
        $this->name = $name;
        $this->comment = $comment;
        $this->childs = $childs;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Bloc
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param Comment $comment
     * @return Bloc
     */
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return \Smalot\Vagrant\Generator\Component\BaseInterface[]
     */
    public function getChilds()
    {
        return $this->childs;
    }

    /**
     * @param \Smalot\Vagrant\Generator\Component\BaseInterface[] $childs
     * @return Bloc
     */
    public function setChilds($childs)
    {
        $this->childs = $childs;

        return $this;
    }

    /**
     * @param BaseInterface $children
     * @param string $name
     * @return Bloc
     */
    public function addChildren(BaseInterface $children, $name = null)
    {
        if (!is_null($name)) {
            $this->childs[$name] = $children;
        } else {
            $this->childs[] = $children;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getBlocName()
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $content = '';

        if (!is_null($this->comment)) {
            $content .= $this->comment->dump($level);
        }

        $content .= str_repeat(' ', 4 * $level);
        $content .= $this->getBlocName().PHP_EOL;

        foreach ($this->childs as $child) {
            $content .= $child->dump($level + 1).PHP_EOL;
        }

        $content .= str_repeat(' ', 4 * $level).'end';

        return $content;
    }
}
