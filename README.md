# Vagrantfile generator

Helper to easily create `Vagrantfile`.





# Implements

````php
include 'vendor/autoload.php';

use Smalot\Vagrant\Generator\Machine\Network\ForwardedPort;
use Smalot\Vagrant\Generator\Machine\Network\PrivateNetwork;
use Smalot\Vagrant\Generator\Machine\Network\PublicNetwork;
use Smalot\Vagrant\Generator\Vagrantfile;

$vagrantfile = new Vagrantfile();

$forwardedPort = new ForwardedPort(['guest' => 80, 'host' => 8081]);
$vagrantfile->addChildren($forwardedPort);

$privateNetwork = new PrivateNetwork(['dhcp' => true]);
$vagrantfile->addNetworkEntry($privateNetwork);

$publicNetwork = new PublicNetwork(
  [
    'bridge' => [
      'en1: Wi-Fi (AirPort)',
      'en6: Broadcom NetXtreme Gigabit Ethernet Controller',
    ],
  ]
);
$vagrantfile->addNetworkEntry($publicNetwork);

echo $vagrantfile->dump();

````

This sample code will generate this:

````
Vagrant.configure("2") do |config|
    config.vm.network "ForwardedPorted_port", guest: 80, host: 8081
    config.vm.network "private_network", dhcp: true
    config.vm.network "public_network", bridge: ["en1: Wi-Fi (AirPort)", "en6: Broadcom NetXtreme Gigabit Ethernet Controller"]
end
````
