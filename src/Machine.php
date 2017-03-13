<?php

namespace Smalot\Vagrant\Generator;

use Smalot\Vagrant\Generator\Component\BaseInterface;
use Smalot\Vagrant\Generator\Component\Value;
use Smalot\Vagrant\Generator\Machine\Network;
use Smalot\Vagrant\Generator\Machine\Provision;
use Smalot\Vagrant\Generator\Machine\SyncedFolder;

/**
 * Class Machine
 * @package Smalot\Vagrant\Generator
 */
class Machine implements BaseInterface
{
    const CONFIG_NAMESPACE = 'config.vm';

    /**
     * @var array
     */
    protected $options;

    /**
     * @var Network
     */
    protected $network;

    /**
     * @var Provision
     */
    protected $provision;

    /**
     * @var SyncedFolder
     */
    protected $syncedFolder;

    /**
     * Ssh constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $options += [
          'boot_timeout' => null,
          'box' => null,
          'box_check_update' => null,
          'box_download_checksum' => null,
          'box_download_checksum_type' => null,
          'box_download_client_cert' => null,
          'box_download_ca_cert' => null,
          'box_download_ca_path' => null,
          'box_download_insecure' => null,
          'box_download_location_trusted' => null,
          'box_url' => null,
          'box_version' => null,
          'communicator' => null,
          'graceful_halt_timeout' => null,
          'guest' => null,
          'hostname' => null,
          'post_up_message' => null,
          'provider' => null,
          'usable_port_range' => null,
        ];

        $this->options = $options;

        $this->network = new Network();
        $this->provision = new Provision();
        $this->syncedFolder = new SyncedFolder();
    }

    /**
     * @return int
     */
    public function getBootTimeout()
    {
        return $this->options['boot_timeout'];
    }

    /**
     * @param int $bootTimeout
     * @return $this
     */
    public function setBootTimeout($bootTimeout)
    {
        $this->options['boot_timeout'] = $bootTimeout;

        return $this;
    }

    /**
     * @return string
     */
    public function getBox()
    {
        return $this->options['box'];
    }

    /**
     * @param string $box
     * @return $this
     */
    public function setBox($box)
    {
        $this->options['box'] = $box;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBoxCheckUpdate()
    {
        return $this->options['box_check_update'];
    }

    /**
     * @param bool $boxCheckUpdate
     * @return $this
     */
    public function setBoxCheckUpdate($boxCheckUpdate)
    {
        $this->options['box_check_update'] = $boxCheckUpdate;

        return $this;
    }

    /**
     * @return string
     */
    public function getBoxDownloadChecksum()
    {
        return $this->options['box_download_checksum'];
    }

    /**
     * @param string $boxDownloadChecksum
     * @return $this
     */
    public function setBoxDownloadChecksum($boxDownloadChecksum)
    {
        $this->options['box_download_checksum'] = $boxDownloadChecksum;

        return $this;
    }

    /**
     * @return string
     */
    public function getBoxDownloadChecksumType()
    {
        return $this->options['box_download_checksum_type'];
    }

    /**
     * @param string $boxDownloadChecksumType
     * @return $this
     */
    public function setBoxDownloadChecksumType($boxDownloadChecksumType)
    {
        $this->options['box_download_checksum_type'] = $boxDownloadChecksumType;

        return $this;
    }

    /**
     * @return string
     */
    public function getBoxDownloadClientCert()
    {
        return $this->options['box_download_client_cert'];
    }

    /**
     * @param string $boxDownloadClientCert
     * @return $this
     */
    public function setBoxDownloadClientCert($boxDownloadClientCert)
    {
        $this->options['box_download_client_cert'] = $boxDownloadClientCert;

        return $this;
    }

    /**
     * @return string
     */
    public function getBoxDownloadCaCert()
    {
        return $this->options['box_download_ca_cert'];
    }

    /**
     * @param string $boxDownloadCaCert
     * @return $this
     */
    public function setBoxDownloadCaCert($boxDownloadCaCert)
    {
        $this->options['box_download_ca_cert'] = $boxDownloadCaCert;

        return $this;
    }

    /**
     * @return string
     */
    public function getBoxDownloadCaPath()
    {
        return $this->options['box_download_ca_path'];
    }

    /**
     * @param string $boxDownloadCaPath
     * @return $this
     */
    public function setBoxDownloadCaPath($boxDownloadCaPath)
    {
        $this->options['box_download_ca_path'] = $boxDownloadCaPath;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBoxDownloadInsecure()
    {
        return $this->options['box_download_insecure'];
    }

    /**
     * @param bool $boxDownloadInsecure
     * @return $this
     */
    public function setBoxDownloadInsecure($boxDownloadInsecure)
    {
        $this->options['box_download_insecure'] = $boxDownloadInsecure;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBoxDownloadLocationTrusted()
    {
        return $this->options['box_download_location_trusted'];
    }

    /**
     * @param bool $boxDownloadLocationTrusted
     * @return $this
     */
    public function setBoxDownloadLocationTrusted($boxDownloadLocationTrusted)
    {
        $this->options['box_download_location_trusted'] = $boxDownloadLocationTrusted;

        return $this;
    }

    /**
     * @return string
     */
    public function getBoxUrl()
    {
        return $this->options['box_url'];
    }

    /**
     * @param string $boxUrl
     * @return $this
     */
    public function setBoxUrl($boxUrl)
    {
        $this->options['box_url'] = $boxUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getBoxVersion()
    {
        return $this->options['box_version'];
    }

    /**
     * @param string $boxVersion
     * @return $this
     */
    public function setBoxVersion($boxVersion)
    {
        $this->options['box_version'] = $boxVersion;

        return $this;
    }

    /**
     * @return string
     */
    public function getCommunicator()
    {
        return $this->options['communicator'];
    }

    /**
     * @param string $communicator
     * @return $this
     */
    public function setCommunicator($communicator)
    {
        $this->options['communicator'] = $communicator;

        return $this;
    }

    /**
     * @return int
     */
    public function getGracefulHaltTimeout()
    {
        return $this->options['graceful_halt_timeout'];
    }

    /**
     * @param int $gracefulHaltTimeout
     * @return $this
     */
    public function setGracefulHaltTimeout($gracefulHaltTimeout)
    {
        $this->options['graceful_halt_timeout'] = $gracefulHaltTimeout;

        return $this;
    }

    /**
     * @return string
     */
    public function getGuest()
    {
        return $this->options['guest'];
    }

    /**
     * @param string $guest
     * @return $this
     */
    public function setGuest($guest)
    {
        $this->options['guest'] = $guest;

        return $this;
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->options['hostname'];
    }

    /**
     * @param string $hostname
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->options['hostname'] = $hostname;

        return $this;
    }

    /**
     * @return Network
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @return string
     */
    public function getPostUpMessage()
    {
        return $this->options['post_up_message'];
    }

    /**
     * @param string $postUpMessage
     * @return $this
     */
    public function setPostUpMessage($postUpMessage)
    {
        $this->options['post_up_message'] = $postUpMessage;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->options['provider'];
    }

    /**
     * @param string $provider
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->options['provider'] = $provider;

        return $this;
    }

    /**
     * @return Provision
     */
    public function getProvision()
    {
        return $this->provision;
    }

    /**
     * @return SyncedFolder
     */
    public function getSyncedFolder()
    {
        return $this->syncedFolder;
    }

    /**
     * @return string
     */
    public function getUsablePortRange()
    {
        return $this->options['usable_port_range'];
    }

    /**
     * @param string $usablePortRange
     * @return $this
     */
    public function setUsablePortRange($usablePortRange)
    {
        $this->options['usable_port_range'] = $usablePortRange;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $content = '';

        foreach ($this->options as $name => $value) {
            if (!is_null($value)) {
                $option = new Value(self::CONFIG_NAMESPACE.'.'.$name, $value);
                $content .= $option->dump($level).PHP_EOL;
            }
        }

        $content .= $this->network->dump($level);
        $content .= $this->provision->dump($level);
        $content .= $this->syncedFolder->dump($level);

        return $content;
    }
}
