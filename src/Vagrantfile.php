<?php

namespace Smalot\Vagrant\Generator;

use Smalot\Vagrant\Generator\Component\Bloc;
use Smalot\Vagrant\Generator\Machine\Network\NetworkInterface;

/**
 * Class Vagrantfile
 * @package Smalot\Vagrant\Generator
 */
class Vagrantfile extends Bloc
{
    /**
     * @var int
     */
    protected $version;

    /**
     * Vagrantfile constructor.
     * @param int $version
     */
    public function __construct($version = 2)
    {
        $this->version = intval($version);

        parent::__construct($version);
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param NetworkInterface $network
     */
    public function addNetworkEntry(NetworkInterface $network)
    {
        $this->addChildren($network);
    }

    /**
     * @inheritDoc
     */
    public function getBlocName()
    {
        return 'Vagrant.configure("'.$this->getVersion().'") do |config|';
    }
}
