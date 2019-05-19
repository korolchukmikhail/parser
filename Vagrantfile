
Vagrant.configure("2") do |config|
    config.vm.box = "ubuntu/xenial64"
    config.vm.network "private_network", ip: "10.0.0.50"
    config.vm.synced_folder ".", "/vagrant", type: "nfs"
    ENV['LC_ALL']="en_US.UTF-8"

    config.vm.provider "virtualbox" do |vb|
        vb.name = "ubuntu_parser"
        vb.memory = 6100
        vb.cpus = 4
    end

    config.vm.provision "shell", inline: <<-SHELL
        cd /vagrant
        /vagrant/tools/setup.bash
    SHELL
end
