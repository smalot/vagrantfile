<?php

namespace Smalot\Vagrant\Generator\Machine;

use Smalot\Vagrant\Generator\Component\BaseInterface;
use Smalot\Vagrant\Generator\Component\Comment;
use Smalot\Vagrant\Generator\Provision\ProvisionInterface;

/**
 * Class Provision
 * @package Smalot\Vagrant\Generator\Machine
 */
class Provision implements BaseInterface
{
    /**
     * @var ProvisionInterface[]
     */
    protected $provisions;

    /**
     * Provision constructor.
     */
    public function __construct()
    {
        $this->provisions = [];
    }

    /**
     * @param ProvisionInterface $provision
     */
    public function add(ProvisionInterface $provision)
    {
        $this->provisions[] = $provision;
    }

    /**
     * @return ProvisionInterface[]
     */
    public function getList()
    {
        return $this->provisions;
    }

    /**
     * @inheritDoc
     */
    public function dump($level = 0)
    {
        $content = '';

        $comment = new Comment('View the documentation for the provider you are using for more information on available options.');
        $content .= PHP_EOL.$comment->dump($level);

        foreach ($this->provisions as $provision) {
            $content .= $provision->dump($level).PHP_EOL;
        }

        return $content;
    }
}
