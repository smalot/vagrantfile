<?php

namespace Smalot\Vagrant\Generator\Component;

/**
 * Class ValueOption
 * @package Smalot\Vagrant\Generator\Component
 */
class ValueOption extends Value
{
    /**
     * @var array
     */
    protected $options;

    /**
     * ValueOption constructor.
     * @param string $name
     * @param string $value
     * @param array $options
     * @param string $comment
     */
    public function __construct($name, $value = null, $options = [], $comment)
    {
        parent::__construct($name, $value, $comment);

        $this->options = $options;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return ValueOption
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $content = '';

        if ($this->comment) {
            $comment = new Comment($this->comment);
            $content .= PHP_EOL.$comment->dump($level);
        }

        $content .= str_repeat(' ', $level * 4);
        $content .= $this->name;

        if (!is_null($this->value)) {
            $content .= ' '.$this->prepareValue($this->value);
        }

        foreach ($this->options as $name => $value) {
            if (is_null($value)) {
                continue;
            }

            $content .= ', '.$name.': '.$this->prepareValue($value);
        }

        return $content;
    }
}
