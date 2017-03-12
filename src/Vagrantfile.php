<?php

namespace Smalot\Vagrant\Generator;

use Smalot\Vagrant\Generator\Component\Bloc;
use Smalot\Vagrant\Generator\Component\Comment;
use Smalot\Vagrant\Generator\Component\Value;
use Smalot\Vagrant\Generator\Component\ValueOption;
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

        parent::__construct($this->version);

        $comment = new Comment('The most common configuration options are documented and commented below. For a complete reference, please see the online documentation at https://docs.vagrantup.com.');
        $this->addChildren($comment);
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
     * @param string $box
     */
    public function setBox($box)
    {
        $comment = new Comment('Every Vagrant development environment requires a box. You can search for boxes at https://atlas.hashicorp.com/search.');

        $this->addChildren(new Value('config.vm.box', $box, $comment), 'box');
    }

    /**
     * @param bool $update
     */
    public function setBoxCheckUpdate($update)
    {
        $comment = new Comment('Disable automatic box update checking. If you disable this, then boxes will only be checked for updates when the user runs `vagrant box outdated`. This is not recommended.');

        $this->addChildren(new Value('config.vm.box_check_update', boolval($update), $comment), 'box_check_update');
    }

    /**
     * @inheritDoc
     */
    public function getBlocName()
    {
        return 'Vagrant.configure("'.$this->getVersion().'") do |config|';
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $content = '# -*- mode: ruby -*-'.PHP_EOL.'# vi: set ft=ruby :'.PHP_EOL.PHP_EOL;
        $content .= parent::dump($level).PHP_EOL.PHP_EOL;

        return $content;
    }
}
