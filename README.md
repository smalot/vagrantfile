# Vagrantfile generator

Helper to easily create `Vagrantfile`.





# Implements

````php
include 'vendor/autoload.php';

use Smalot\Vagrant\Generator\Machine\Network\ForwardedPort;
use Smalot\Vagrant\Generator\Machine\Network\PrivateNetwork;
use Smalot\Vagrant\Generator\Machine\Network\PublicNetwork;
use Smalot\Vagrant\Generator\Provision\Ansible;
use Smalot\Vagrant\Generator\Vagrantfile;

$vagrantfile = new Vagrantfile();

$vagrantfile->getMachine()->setBox('bento/ubuntu-16.04');
$vagrantfile->getMachine()->setBoxCheckUpdate(false);

$vagrantfile->getSsh()->setUsername('ubuntu');
$vagrantfile->getSsh()->setPassword('password');

$forwardedPort = new ForwardedPort();
$forwardedPort->setGuest(80);
$forwardedPort->setHost(8081);
$vagrantfile->getMachine()->getNetwork()->addForwardedPort($forwardedPort);

$privateNetwork = new PrivateNetwork();
$privateNetwork->setDhcp(true);
$vagrantfile->getMachine()->getNetwork()->addPrivateNetwork($privateNetwork);

$publicNetwork = new PublicNetwork();
$publicNetwork->addBridge('en1: Wi-Fi (AirPort)');
$publicNetwork->addBridge('en6: Broadcom NetXtreme Gigabit Ethernet Controller');
$vagrantfile->getMachine()->getNetwork()->addPublicNetwork($publicNetwork);

$ansible = new Ansible();
$ansible->setPlaybook('playbook.yml');
$ansible->setVerbose('v');
$vagrantfile->getMachine()->getProvisions()->add($ansible);

echo $vagrantfile->dump();


````

This sample code will generate this:

````
# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    # The most common configuration options are documented and commented below.
    # For a complete reference, please see the online documentation at
    # https://docs.vagrantup.com.

    config.vm.box = "bento/ubuntu-16.04"
    config.vm.box_check_update = false

    # Create a forwarded port mapping which allows access to a specific port
    # within the machine from a port on the host machine.
    config.vm.network "ForwardedPorted_port", guest: 80, host: 8081

    # Create a private network, which allows host-only access to the machine using
    # a specific IP.
    config.vm.network "private_network", dhcp: true

    # Create a public network, which generally matched to bridged network. Bridged
    # networks make the machine appear as another physical device on your network.
    config.vm.network "public_network", bridge: ["en1: Wi-Fi (AirPort)", "en6: Broadcom NetXtreme Gigabit Ethernet Controller"]

    # View the documentation for the provider you are using for more information
    # on available options.
    config.vm.provision "ansible" do |ansible|
        ansible.verbose = "v"
        ansible.playbook = "playbook.yml"
    end

    config.ssh.username = "ubuntu"
    config.ssh.password = "password"

end
````
