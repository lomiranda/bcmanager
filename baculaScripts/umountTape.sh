#!/bin/bash

echo "umount storage=$1 | bconsole" | at now +$2 $3
