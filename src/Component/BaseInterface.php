<?php

namespace Smalot\Vagrant\Generator\Component;

/**
 * Interface BaseInterface
 * @package Smalot\Vagrant\Generator\Component
 */
interface BaseInterface
{
    /**
     * @param int $level
     * @return string
     */
    public function dump($level = 0);
}
