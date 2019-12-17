#!/bin/bash
#
db="$1"
user="$2"
pass="$3"
#
echo $db $user $pass
## connect to mysql and executes new Tables
mysql -u $user --password=$pass $db -e "source existing_tables.sql;"
mysql -u $user --password=$pass $db -e "source new_tables.sql;"


##using author in mysql cretae mongo collection
mysql -u $user --password=$pass $db -e "select _id,fname,lname,email from AUTHOR;" | sed "s/'/\'/;s/\t/\",\"/g;s/^/\"/;s/$/\"/;s/\n//g" > author.csv

mongo --eval 'db.author.drop()' $db -u $user --password $pass
##import author to mongo collection
mongoimport -d $db -p $pass -u $user -c author --type csv --file author.csv --headerline

##create article.json
mongo --eval 'db.articles.drop()' $db -u $user --password $pass
mongo --eval '
db.createCollection("articles", {
   validator: {
      $and: [
			{
               "mdate" :{$type:"string"}
            },
            {
               "author" :{$exists: true}
            },
            {
               "url" :{$type:"string"}
            },
            {
               "journal" :{$type:"string"}
            },
			{
               "title" :{$type:"string"}
            },
			{
               "number" :{$type:"string"}
            },
			{
               "volume" :{$type:"string"}
            },
			{
               "key" :{$type:"string"}
            },
			{
               "year" :{$type:"string"}
            },
			{
               "pages" :{$type:"string"}
            }
      ]
   }
});' $user -u $db --password $pass
mongoimport -d $db -p $pass -u $user -c articles --file articles.json --jsonArray
