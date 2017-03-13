<?php

namespace Smalot\Vagrant\Generator\Machine;

use Smalot\Vagrant\Generator\Component\BaseInterface;

/**
 * Class SyncedFolder
 * @package Smalot\Vagrant\Generator\Machine
 */
class SyncedFolder implements BaseInterface
{
    /**
     * SyncedFolder constructor.
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
