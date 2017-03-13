<?php

namespace Smalot\Vagrant\Generator\Provision;

use Smalot\Vagrant\Generator\Component\Bloc;
use Smalot\Vagrant\Generator\Component\Value;

/**
 * Class Ansible
 * @package Smalot\Vagrant\Generator\Provision
 */
class Ansible extends Bloc implements ProvisionInterface
{
    const CONFIG_NAMESPACE = 'ansible';

    /**
     * @var string
     */
    protected $verbose;

    /**
     * @var string
     */
    protected $playbook;

    /**
     * Ansible constructor.
     */
    public function __construct()
    {
        parent::__construct('config.vm.provision "ansible" do |ansible|');
    }

    /**
     * @return string
     */
    public function getVerbose()
    {
        return $this->verbose;
    }

    /**
     * @param string $verbose
     * @return Ansible
     */
    public function setVerbose($verbose)
    {
        $this->verbose = $verbose;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlaybook()
    {
        return $this->playbook;
    }

    /**
     * @param string $playbook
     * @return Ansible
     */
    public function setPlaybook($playbook)
    {
        $this->playbook = $playbook;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $this->childs = [];

        if ($this->verbose) {
            $this->addChildren(new Value(self::CONFIG_NAMESPACE.'.verbose', $this->verbose));
        }

        if ($this->playbook) {
            $this->addChildren(new Value(self::CONFIG_NAMESPACE.'.playbook', $this->playbook));
        }

        return parent::dump($level);
    }
}
