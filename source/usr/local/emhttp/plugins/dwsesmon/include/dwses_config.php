<?
/* Copyright Derek Macias (parts of code from NUT package)
 * Copyright macester (parts of code from NUT package)
 * Copyright gfjardim (parts of code from NUT package)
 * Copyright SimonF (parts of code from NUT package)
 * Copyright Dan Landon (parts of code from Web GUI)
 * Copyright Bergware International (parts of code from Web GUI)
 * Copyright Lime Technology (any and all other parts of Unraid)
 *
 * Copyright desertwitch (as author and maintainer of this file)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 */
$dwses_cfg = file_exists("/boot/config/plugins/dwsesmon/dwsesmon.cfg") ? parse_ini_file("/boot/config/plugins/dwsesmon/dwsesmon.cfg") : [];

$dwses_service = trim(isset($dwses_cfg['SERVICE']) ? htmlspecialchars($dwses_cfg['SERVICE']) : 'disable');

$dwses_running = !empty(shell_exec("pgrep -x sesmon 2>/dev/null"));
$dwses_backend = htmlspecialchars(trim(shell_exec("find /var/log/packages/ -type f -iname 'sesmon-*' -printf '%f\n' 2> /dev/null") ?? "n/a"));
?>
