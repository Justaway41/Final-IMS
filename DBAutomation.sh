password="sakardota2"
username="97797"
Ip="192.168.102.136"

docker exec bc595c8f81e7 mysqldump -u root intern_manager > IMS-DDL-database-$(date +"%Y-%m-%d").sql
sshpass -p "$password" scp IMS-DDL-database-$(date +"%Y-%m-%d").sql $username@$Ip:/testing/IMS_DDL/


rm -rf *.sql
