<?php

namespace Smalot\Vagrant\Generator\Machine\Network;

use Smalot\Vagrant\Generator\Component\ValueOption;

/**
 * Class PublicNetwork
 * @package Smalot\Vagrant\Generator\Machine\Network
 */
class PublicNetwork extends ValueOption implements NetworkInterface
{
    /**
     * PublicNetwork constructor.
     * @param array $options
     */
    public function __construct($options)
    {
        $options += [
          'dhcp' => null,
          'ip' => null,
          'bridge' => null,
          'auto_config' => null,
        ];

        parent::__construct('config.vm.network', 'public_network', $options);
    }

    /**
     * @return string
     */
    public function isDhcp()
    {
        return $this->options['dhcp'];
    }

    /**
     * @param bool $dhcp
     * @return PublicNetwork
     */
    public function setDhcp($dhcp)
    {
        $this->options['dhcp'] = boolval($dhcp);

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->options['ip'];
    }

    /**
     * @param string $ip
     * @return PublicNetwork
     */
    public function setIp($ip)
    {
        $this->options['ip'] = $ip;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBridge()
    {
        return $this->options['bridge'];
    }

    /**
     * @param mixed $bridge
     * @return PublicNetwork
     */
    public function setBridge($bridge)
    {
        $this->options['bridge'] = $bridge;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAutoConfig()
    {
        return $this->options['auto_config'];
    }

    /**
     * @param bool $autoConfig
     * @return PublicNetwork
     */
    public function setAutoConfig($autoConfig)
    {
        $this->options['auto_config'] = boolval($autoConfig);

        return $this;
    }
}
