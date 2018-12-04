#!/bin/bash

echo "mount storage=$1 | bconsole" | at now +$2 $3
