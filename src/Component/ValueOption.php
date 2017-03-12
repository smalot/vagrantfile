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
     */
    public function __construct($name, $value = null, $options = [])
    {
        parent::__construct($name, $value);

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
        $content = parent::dump($level);

        foreach ($this->options as $name => $value) {
            if (is_null($value)) {
                continue;
            }

            $content .= ', '.$name.': '.$this->prepareValue($value);
        }

        return $content;
    }
}
