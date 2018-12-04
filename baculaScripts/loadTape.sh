#!/bin/bash

echo "Carregando o drive da regional $1:"

ssh -C -n -o StrictHostKeyChecking=no -i /var/www/.ssh/ssh_id_rsa -l root mp-$1-slave.intra.planejamento 'mt -f /dev/nst0 load'

