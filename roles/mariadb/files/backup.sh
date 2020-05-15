#!/bin/bash
## Variables
DATE=$(date +%d-%m-%Y)
BACKUP_DIR="/backup/test-backup"
MYSQL_USER="admin_1"
MYSQL_PASSWORD="Admin12345"

# VER COMO ENCRIPTAR SOLO ESTE VALOR O TODO EL FICHERO

mkdir -p /etc/mysql/$BACKUP_DIR/$DATE

## Generate a list with the name of the databases and cut the ones that you do not want to back up
databases=`mysql -u$MYSQL_USER -p$MYSQL_PASSWORD -e "SHOW DATABASES;" | grep -Ev "(information_schema|perfomance_schema)"`

## Backup for each database
for db in $databases; do
mysqldump --force --opt --skip-lock-tables -u $MYSQL_USER -p$MYSQL_PASSWORD --databases $db > "/etc/mysql/$BACKUP_DIR/$DATE/$db.sql"
done

# Delete files older than 15 days
find /etc/mysql/$BACKUP_DIR/* -mtime +15 -exec rm {} \;
