#!/bin/bash

echo "Apagando o drive da regional $1"

#OUTPUT="$(ssh -C -n -o StrictHostKeyChecking=no -i /var/www/.ssh/ssh_id_rsa -l root mp-$1-slave.intra.planejamento 'mt -f /dev/nst0 rewind; mt -f /dev/nst0 weof')"
ssh -C -n -o StrictHostKeyChecking=no -i /var/www/.ssh/ssh_id_rsa -l root mp-$1-slave.intra.planejamento 'mt -f /dev/nst0 rewind; mt -f /dev/nst0 weof'
