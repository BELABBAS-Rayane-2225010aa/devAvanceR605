Belabbas Rayane - Crespin Alexandre - De Angeli Adam - Rousset Antonin

# Développement Avancé R6.05

## QCM

# Table of Contents
1. [Version](#version)
2. [Install](#install)
3. [Launch](#launch)

### Version
Projet Symfony version= 6.4


### Install

the api is in this repository: https://github.com/CRESPIN-Alexandre-2225022aa/API_DevAvance.git

To install dependencies, you need to run this commande: `composer install`,
if you don't want to have the developpement dependencies run: `composer install --no-dev`

To install the database you need to execute:`symfony console doctrine:database:create` then `bin/console doctrine:migrations:migrate` or `symfony console doctrine:migrations:migrate` then press enter after the warning.


### Launch

To use the api you will need to launch a local server: `symfony serve --port=8001` in the api's folder, by default the server run on the link write in the end of the execution. 

To use the app you will need to launch a local server: `symfony serve`, by default the server run on the link write in the end of the execution. 

