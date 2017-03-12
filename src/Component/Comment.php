<?php

namespace Smalot\Vagrant\Generator\Component;

/**
 * Class Comment
 * @package Smalot\Vagrant\Generator\Component
 */
class Comment implements BaseInterface
{
    /**
     * @var string
     */
    protected $comment;

    /**
     * Value constructor.
     * @param string $comment
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $content = '';

        if ($this->comment) {
            $content = str_repeat(' ', $level * 4);
            $content .= '# '.wordwrap($this->comment, 76, PHP_EOL.str_repeat(' ', $level * 4).'# ').PHP_EOL;
        }

        return $content;
    }
}
