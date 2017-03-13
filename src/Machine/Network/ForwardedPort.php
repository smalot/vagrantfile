<?php

namespace Smalot\Vagrant\Generator\Machine\Network;

use Smalot\Vagrant\Generator\Component\Comment;
use Smalot\Vagrant\Generator\Component\ValueOption;

/**
 * Class ForwardedPort
 * @package Smalot\Vagrant\Generator\Machine\Network
 */
class ForwardedPort extends ValueOption implements NetworkInterface
{
    const PROTOCOL_UDP = 'udp';

    const PROTOCOL_TCP = 'tcp';

    /**
     * ForwardedPort constructor.
     */
    public function __construct()
    {
        $options = [
          'auto_correct' => null,
          'guest' => null,
          'guest_ip' => null,
          'host' => null,
          'host_ip' => null,
          'protocol' => null,
          'id' => null,
        ];

        parent::__construct('config.vm.network', 'ForwardedPorted_port', $options);
    }

    /**
     * @return bool
     */
    public function isAutoCorrect()
    {
        return $this->options['auto_correct'];
    }

    /**
     * @param bool $autoCorrect
     * @return ForwardedPort
     */
    public function setAutoCorrect($autoCorrect)
    {
        $this->options['auto_correct'] = boolval($autoCorrect);

        return $this;
    }

    /**
     * @return int
     */
    public function getGuest()
    {
        return $this->options['guest'];
    }

    /**
     * @param int $guest
     * @return ForwardedPort
     */
    public function setGuest($guest)
    {
        $this->options['guest'] = intval($guest);

        return $this;
    }

    /**
     * @return string
     */
    public function getGuestIp()
    {
        return $this->options['guest_ip'];
    }

    /**
     * @param string $guestIp
     * @return ForwardedPort
     */
    public function setGuestIp($guestIp)
    {
        $this->options['guest_ip'] = $guestIp;

        return $this;
    }

    /**
     * @return int
     */
    public function getHost()
    {
        return $this->options['host'];
    }

    /**
     * @param int $host
     * @return ForwardedPort
     */
    public function setHost($host)
    {
        $this->options['host'] = $host;

        return $this;
    }

    /**
     * @return string
     */
    public function getHostIp()
    {
        return $this->options['host_ip'];
    }

    /**
     * @param string $hostIp
     * @return ForwardedPort
     */
    public function setHostIp($hostIp)
    {
        $this->options['host_ip'] = $hostIp;

        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->options['protocol'];
    }

    /**
     * @param string $protocol
     * @return ForwardedPort
     */
    public function setProtocol($protocol)
    {
        $this->options['protocol'] = $protocol;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->options['id'];
    }

    /**
     * @param string $id
     * @return ForwardedPort
     */
    public function setId($id)
    {
        $this->options['id'] = $id;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $comment = new Comment('Create a forwarded port mapping which allows access to a specific port within the machine from a port on the host machine.');
        $content = PHP_EOL.$comment->dump($level);
        $content .= parent::dump($level);

        return $content;
    }
}
