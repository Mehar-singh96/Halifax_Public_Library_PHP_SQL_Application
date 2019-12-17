#!/bin/bash
#
db="$1"
user="$2"
pass="$3"
#
java -jar loadSQL.jar
mysql -u $user --password=$pass $db -e "source insert_authors.sql;"
mysql -u $user --password=$pass $db -e "source insert_mag.sql;"
mysql -u $user --password=$pass $db -e "source insert_vol.sql;"
mysql -u $user --password=$pass $db -e "source insert_article.sql;"
mysql -u $user --password=$pass $db -e "source insert_published.sql;"

