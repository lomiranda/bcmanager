#!/bin/bash


echo "Ejetando o drive da regional $1 <br>"

if [[ -z "$(ssh -C -n -o StrictHostKeyChecking=no -i /var/www/.ssh/ssh_id_rsa -l root mp-$1-slave.intra.planejamento 'mt -f /dev/nst0 eject')" ]]
#if [[ -z $OUTPUT ]]
then
	echo "Drive ejetado com sucesso!<br>"
else
	echo "Erro ao ejetar o drive da regional!<br>"
fi

#if [[ -z "$OUTPUT" ]]
#then
#  echo "Erro ao ejetar o drive da regional!"
#  echo ""
#else
#  echo "Drive ejetado com sucesso!"
#  echo ""
#fi
