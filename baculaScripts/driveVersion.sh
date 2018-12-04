#!/bin/bash

echo '<html>
<div class="col-md-12">
<ul class="media-list">'

REGIONAIS="/etc/bacula/lista-regionais.txt"

for HOST in $(cat $REGIONAIS)
do 
	echo '<ul class="media-list">
	<li class="media">'

	if [[ -z $(ping -w 2 $HOST.intra.planejamento  | grep "ttl") ]]
	then
		echo '<a class="pull-left" href="#"><i class="fa fa-3x fa-desktop fa-fw text-danger"></i></a>
		<div class="media-body">
		<h4 class="media-heading">'
		echo $HOST
		echo '</h4>'
		echo "<p>"
		echo "<font class='text-danger'>Falha ao se conectar ao host.</font>"
	else
		DATA=$(ssh -C -n -o StrictHostKeyChecking=no -i /var/www/.ssh/ssh_id_rsa -l root $HOST.intra.planejamento "cat /proc/scsi/scsi | grep -i 'ultrium\|dat' | sed 's/$/<br>/'")
		echo '<a class="pull-left" href="#"><i class="fa fa-3x fa-desktop fa-fw text-primary"></i></a>
		<div class="media-body">
		<h4 class="media-heading">'
		echo $HOST
		echo '</h4>'
		echo "<p>"
		echo $DATA
	fi
	
	echo '</p>
	</div>
	</li>
	<hr>'
done

echo '</ul>
</div>
</html>'
