#!/bin/bash
# sesmon notification script

SES_DEV_PATH="$1"
SES_DEV_ADDR="$2"
SES_DEV_DESCR="$3"
SES_ALARM_MSG="$4"
SES_ALARM_JSON="$5"

NOTIFY="/usr/local/emhttp/plugins/dynamix/scripts/notify"
HOST="$(echo "$HOSTNAME" | awk '{print toupper($0)}')"
EVENT="SCSI Enclosure Alert"
SUBJECT="[${HOST}] SES: [${SES_DEV_PATH}:${SES_DEV_ADDR}] ${SES_DEV_DESCR}"

"$NOTIFY" -e "${EVENT}" -s "Alert ${SUBJECT}" -d "${SES_ALARM_MSG}" -i "alert"
