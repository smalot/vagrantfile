<?php

namespace Smalot\Vagrant\Generator\Machine\Network;

use Smalot\Vagrant\Generator\Component\ValueOption;

/**
 * Class PrivateNetwork
 * @package Smalot\Vagrant\Generator\Machine\Network
 */
class PrivateNetwork extends ValueOption implements NetworkInterface
{
    /**
     * PrivateNetwork constructor.
     * @param array $options
     */
    public function __construct($options)
    {
        $options += [
          'dhcp' => null,
          'ip' => null,
          'netmask' => null,
          'auto_config' => null,
        ];

        parent::__construct('config.vm.network', 'private_network', $options);
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
     * @return PrivateNetwork
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
     * @return PrivateNetwork
     */
    public function setIp($ip)
    {
        $this->options['ip'] = $ip;

        return $this;
    }

    /**
     * @return int
     */
    public function getNetmask()
    {
        return $this->options['netmask'];
    }

    /**
     * @param int $netmask
     * @return PrivateNetwork
     */
    public function setNetmask($netmask)
    {
        $this->options['netmask'] = intval($netmask);

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
     * @return PrivateNetwork
     */
    public function setAutoConfig($autoConfig)
    {
        $this->options['auto_config'] = boolval($autoConfig);

        return $this;
    }
}
