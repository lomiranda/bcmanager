#!/bin/bash
#

echo '<html>
<table class="table table-bordered table-hover table-striped">
  <tr>
    <td><b>Storage</b></td>
    <td><b>Status</b></td>
  </tr>'

listaRegionais="/etc/bacula/_listaStorageRegionais.txt"

for storage in $(cut -d';' -f1 ${listaRegionais} | grep -v '#')
do 
	echo "<tr>"
	DATA=$(echo "status storage=$storage" | bconsole | grep -A2 mounted | grep -v unmounted)
#	echo ""
	if [[ $(echo "status storage=$storage" | bconsole | grep mounted | grep -v "unmounted\|no Bacula volume") ]]
	then
		echo "<td>${storage}</td>"
		echo "<td>"
		echo $DATA | awk '{ print $9 }'
		echo "</td>"
	else
		echo "<td>${storage}</td>"
		echo "<td><font color="red">NAO MONTADA</font></td>"
	fi
	echo "</tr>"
done

echo '</table>
</html>'
