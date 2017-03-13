<?php

namespace Smalot\Vagrant\Generator;

use Smalot\Vagrant\Generator\Component\BaseInterface;
use Smalot\Vagrant\Generator\Component\Value;

/**
 * Class Ssh
 * @package Smalot\Vagrant\Generator
 */
class Ssh implements BaseInterface
{
    const CONFIG_NAMESPACE = 'config.ssh';

    /**
     * @var array
     */
    protected $options;

    /**
     * Ssh constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $options += [
          'username' => null,
          'password' => null,
          'host' => null,
          'port' => null,
          'guest_port' => null,
          'private_key_path' => null,
          'keys_only' => null,
          'paranoid' => null,
          'forward_agent' => null,
          'forward_x11' => null,
          'forward_env' => null,
          'insert_key' => null,
          'proxy_command' => null,
          'pty' => null,
          'keep_alive' => null,
          'shell' => null,
          'export_command_template' => null,
          'sudo_command' => null,
        ];

        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->options['username'];
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->options['username'] = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->options['password'];
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->options['password'] = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->options['host'];
    }

    /**
     * @param string $host
     * @return $this
     */
    public function setHost($host)
    {
        $this->options['host'] = $host;

        return $this;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->options['port'];
    }

    /**
     * @param int $port
     * @return $this
     */
    public function setPort($port)
    {
        $this->options['port'] = $port;

        return $this;
    }

    /**
     * @return int
     */
    public function getGuestPort()
    {
        return $this->options['guest_port'];
    }

    /**
     * @param int $guestPort
     * @return $this
     */
    public function setGuestPort($guestPort)
    {
        $this->options['guest_port'] = $guestPort;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateKeyPath()
    {
        return $this->options['private_key_path'];
    }

    /**
     * @param string $privateKeyPath
     * @return $this
     */
    public function setPrivateKeyPath($privateKeyPath)
    {
        $this->options['private_key_path'] = $privateKeyPath;

        return $this;
    }

    /**
     * @return bool
     */
    public function isKeysOnly()
    {
        return $this->options['keys_only'];
    }

    /**
     * @param bool $keysOnly
     * @return $this
     */
    public function setKeysOnly($keysOnly)
    {
        $this->options['keys_only'] = $keysOnly;

        return $this;
    }

    /**
     * @return bool
     */
    public function isParanoid()
    {
        return $this->options['paranoid'];
    }

    /**
     * @param bool $paranoid
     * @return $this
     */
    public function setParanoid($paranoid)
    {
        $this->options['paranoid'] = $paranoid;

        return $this;
    }

    /**
     * @return bool
     */
    public function isForwardAgent()
    {
        return $this->options['forward_agent'];
    }

    /**
     * @param bool $forwardAgent
     * @return $this
     */
    public function setForwardAgent($forwardAgent)
    {
        $this->options['forward_agent'] = $forwardAgent;

        return $this;
    }

    /**
     * @return bool
     */
    public function isForwardX11()
    {
        return $this->options['forward_x11'];
    }

    /**
     * @param bool $forwardX11
     * @return $this
     */
    public function setForwardX11($forwardX11)
    {
        $this->options['forward_x11'] = $forwardX11;

        return $this;
    }

    /**
     * @return array
     */
    public function getForwardEnv()
    {
        return $this->options['forward_env'];
    }

    /**
     * @param array $forwardEnv
     * @return $this
     */
    public function setForwardEnv($forwardEnv)
    {
        $this->options['forward_env'] = $forwardEnv;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInsertKey()
    {
        return $this->options['insert_key'];
    }

    /**
     * @param bool $insertKey
     * @return $this
     */
    public function setInsertKey($insertKey)
    {
        $this->options['insert_key'] = $insertKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxyCommand()
    {
        return $this->options['proxy_command'];
    }

    /**
     * @param string $proxyCommand
     * @return $this
     */
    public function setProxyCommand($proxyCommand)
    {
        $this->options['proxy_command'] = $proxyCommand;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPty()
    {
        return $this->options['pty'];
    }

    /**
     * @param bool $pty
     * @return $this
     */
    public function setPty($pty)
    {
        $this->options['pty'] = $pty;

        return $this;
    }

    /**
     * @return bool
     */
    public function isKeepAlive()
    {
        return $this->options['keep_alive'];
    }

    /**
     * @param bool $keepAlive
     * @return $this
     */
    public function setKeepAlive($keepAlive)
    {
        $this->options['keep_alive'] = $keepAlive;

        return $this;
    }

    /**
     * @return string
     */
    public function getShell()
    {
        return $this->options['shell'];
    }

    /**
     * @param string $shell
     * @return $this
     */
    public function setShell($shell)
    {
        $this->options['shell'] = $shell;

        return $this;
    }

    /**
     * @return string
     */
    public function getExportCommandTemplate()
    {
        return $this->options['export_command_template'];
    }

    /**
     * @param string $exportCommandTemplate
     * @return $this
     */
    public function setExportCommandTemplate($exportCommandTemplate)
    {
        $this->options['export_command_template'] = $exportCommandTemplate;

        return $this;
    }

    /**
     * @return string
     */
    public function getSudoCommand()
    {
        return $this->options['sudo_command'];
    }

    /**
     * @param string $sudoCommand
     * @return $this
     */
    public function setSudoCommand($sudoCommand)
    {
        $this->options['sudo_command'] = $sudoCommand;

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

        return $content;
    }
}
