<?php

namespace Smalot\Vagrant\Generator\Machine;

use Smalot\Vagrant\Generator\Component\BaseInterface;
use Smalot\Vagrant\Generator\Machine\Network\ForwardedPort;
use Smalot\Vagrant\Generator\Machine\Network\PrivateNetwork;
use Smalot\Vagrant\Generator\Machine\Network\PublicNetwork;

/**
 * Class Network
 * @package Smalot\Vagrant\Generator\Machine
 */
class Network implements BaseInterface
{
    /**
     * @var ForwardedPort[]
     */
    protected $forwardedPorts;

    /**
     * @var PrivateNetwork[]
     */
    protected $privateNetworks;

    /**
     * @var PublicNetwork[]
     */
    protected $publicNetworks;

    /**
     * Network constructor.
     */
    public function __construct()
    {
        $this->forwardedPorts = [];
        $this->privateNetworks = [];
        $this->publicNetworks = [];
    }

    /**
     * @param ForwardedPort $forwardedPort
     * @return $this
     */
    public function addForwardedPort(ForwardedPort $forwardedPort)
    {
        $this->forwardedPorts[] = $forwardedPort;

        return $this;
    }

    /**
     * @param PrivateNetwork $privateNetwork
     * @return $this
     */
    public function addPrivateNetwork(PrivateNetwork $privateNetwork)
    {
        $this->privateNetworks[] = $privateNetwork;

        return $this;
    }

    /**
     * @param PublicNetwork $publicNetwork
     * @return $this
     */
    public function addPublicNetwork(PublicNetwork $publicNetwork)
    {
        $this->publicNetworks[] = $publicNetwork;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $content = '';
        $networks = ['forwardedPorts', 'privateNetworks', 'publicNetworks'];

        foreach ($networks as $network) {
            /** @var BaseInterface $entry */
            foreach ($this->$network as $entry) {
                $content .= $entry->dump($level).PHP_EOL;
            }
        }

        return $content;
    }
}
