<?php

namespace Smalot\Vagrant\Generator\Machine;

use Smalot\Vagrant\Generator\Component\BaseInterface;

/**
 * Class Provision
 * @package Smalot\Vagrant\Generator\Machine
 */
class Provision implements BaseInterface
{
    /**
     * Provision constructor.
     */
    public function __construct()
    {
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        return '';
    }
}
