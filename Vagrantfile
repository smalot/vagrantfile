# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    # The most common configuration options are documented and commented below.
    # For a complete reference, please see the online documentation at
    # https://docs.vagrantup.com.


    # Every Vagrant development environment requires a box. You can search for
    # boxes at https://atlas.hashicorp.com/search.
    config.vm.box = "bento/ubuntu-16.04"

    # Disable automatic box update checking. If you disable this, then boxes will
    # only be checked for updates when the user runs `vagrant box outdated`. This
    # is not recommended.
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
end

