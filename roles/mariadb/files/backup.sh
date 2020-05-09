#!/bin/bash
#Variables
DATE=$(date +%d-%m-%Y)
BACKUP_DIR="/backup/test-backup"
MYSQL_USER="admin_1"
MYSQL_PASSWORD="Admin12345"

#Crear el directorio en base a la fecha
mkdir -p /etc/mysql/$BACKUP_DIR/$DATE

# Generar lista de las bases de datos y recortar las que no necesite 
databases=`mysql -u$MYSQL_USER -p$MYSQL_PASSWORD -e "SHOW DATABASES;" | grep -Ev "(information_schema|perfomance_schema)"`

#Hacer copia de seguridad por separado de cada base de datos
for db in $databases; do
#echo $db
mysqldump --force --opt --skip-lock-tables -u $MYSQL_USER -p$MYSQL_PASSWORD --databases $db > "/etc/mysql/$BACKUP_DIR/$DATE/$db.sql"
done

# Borrar los archivos anteriores a 15 días
find /etc/mysql/$BACKUP_DIR/* -mtime +15 -exec rm {} \;


