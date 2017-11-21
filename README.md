# iAdopt: How to use
#### by Piolo Barleta, Mark Barraquias, Jason Deichmann, Jennifer Ibay, Justine Singca, Fred Purisima
####
## 1. install the following dependencies

### - mongoDB
### - XAMPP
### - restHeart.zip

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

- [x] @mentions, #refs, [links](), **formatting**, and <del>tags</del> supported
- [x] list syntax required (any unordered or ordered list supported)
- [x] this is a complete item
- [ ] this is an incomplete item

