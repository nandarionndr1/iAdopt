# iAdopt: How to use

#1. install dependencies

## - mongoDB
## - XAMPP
## - restHeart.zip

#2. clone project
“ $ git clone https://www.github.com/repo/iAdopt.git ”

#3. Load the db
##3.1 cd into the directory folder on the terminal
##3.2 run “start mongod -—dbpath /db”
##3.3 run “java -jar restheart.jar”
##3.4 open new terminal and type commands
 ‘curl -H “PUT” http://localhost:8080/db'  
 ‘curl -H “PUT” http://localhost:8080/db/accounts'  
 ‘curl -H “PUT” http://localhost:8080/db/pets'
#4. Run Apache server and type “http://localhost/iAdopt/home” in the browser

