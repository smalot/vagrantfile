<?php

namespace Smalot\Vagrant\Generator\Component;

/**
 * Class Value
 * @package Smalot\Vagrant\Generator\Component
 */
class Value implements BaseInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * Value constructor.
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
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
     * @return Value
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Value
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $content = str_repeat(' ', $level * 4);
        $content .= $this->name.' ';

        if (!is_null($this->value)) {
            $content .= $this->prepareValue($this->value);
        }

        return $content;
    }

    /**
     * @param mixed $value
     * @return string
     */
    protected function prepareValue($value)
    {
        if (is_array($value)) {
            $values = [];

            foreach ($value as $subvalue) {
                $values[] = $this->prepareValue($subvalue);
            }

            return '[' . implode(', ', $values) . ']';
        } elseif (is_bool($value)) {
            return ($value ? 'true' : 'false');
        } elseif (is_numeric($value)) {
            return $value;
        } else {
            return '"'.addcslashes($value, '"').'"';
        }
    }
}
