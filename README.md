# iAdopt: How to use
#### by Piolo Barleta, Mark Barraquias @nandarionndr1, Jason Deichmann @JasonDeichmann, Jennifer Ibay, Justine Singca @justinyoungie, Fred Purisima
####
## 1. install the following dependencies

- [x] mongoDB
- [x] XAMPP
- [x] restHeart.zip

## 2. clone project
- $ git clone https://www.github.com/nandarionndr1/iAdopt.git 

## 3.  Load the database
- cd into the directory folder on the terminal
- run “start mongod -—dbpath /db”
- run “java -jar restheart.jar”
- open new terminal and type commands to create database collection for the system

 >curl -H “PUT” http://localhost:8080/db 
 
 >curl -H “PUT” http://localhost:8080/db/accounts  
 
 >curl -H “PUT” http://localhost:8080/db/pets

## 4. Run Apache server and type “http://localhost/iAdopt/home” in the browser



