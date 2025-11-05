#!/bin/bash
#
# Copyright Derek Macias (parts of code from NUT package)
# Copyright macester (parts of code from NUT package)
# Copyright gfjardim (parts of code from NUT package)
# Copyright SimonF (parts of code from NUT package)
# Copyright Lime Technology (any and all other parts of Unraid)
#
# Copyright desertwitch (as author and maintainer of this file)
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License 2
# as published by the Free Software Foundation.
#
# The above copyright notice and this permission notice shall be
# included in all copies or substantial portions of the Software.
#
BOOT="/boot/config/plugins/dwsesmon"
DOCROOT="/usr/local/emhttp/plugins/dwsesmon"

chmod 755 /usr/bin/sesmon
chmod 755 /etc/rc.d/rc.sesmon
chmod 755 $DOCROOT/scripts/*
chmod 644 /etc/logrotate.d/sesmon

cp -n $DOCROOT/default.cfg $BOOT/dwsesmon.cfg

mkdir -p $BOOT/config
mkdir -p /etc/sesmon

mkdir -p /var/lib/sesmon
ln -sf /var/lib/sesmon $DOCROOT/json

cp -nr $DOCROOT/defaults/* $BOOT/config/
cp -rf $BOOT/config/* /etc/sesmon/

chmod 644 /etc/sesmon/*
chmod 755 /etc/sesmon/*.sh
