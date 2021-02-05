## Configuration

Required extensions:

    sudo apt-get install php-mbstring php7.0-mbstring php-gettext libapache2-mod-php7.0
    sudo apt-get install php-xml php7.0-xml
    sudo apt-get install php7.0-mcrypt
    sudo apt-get install php7.0-sqlite3
    sudo apt-get install php7.0-xdebug
    sudo apt-get install php7.0-gd
    sudo apt-get install php7.0-curl
    sudo apt-get install php-mysql

    Ubuntu                | CentOs
    -------------         | -------------
    sudo a2enmod deflate  | mod_deflate.so
    sudo a2enmod expires  | mod_expires.so
    sudo a2enmod headers  | mod_headers.so
    sudo a2enmod setenvif | mod_setenvif.so

## Folder Permission Command

sudo chmod -R 777 storage/
sudo chmod -R 777 bootstrap/cache/

## Artisan Commands

php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan module:optimize
php artisan optimize
composer dump-autoload

php artisan migrate
php artisan db:seed
php artisan migrate:refresh --seed (Re-run all the migrations and seeds(*dev only))

## Update document root for virtual host

DocumentRoot <path_to_project>/public

## Other configurations

Rename .env.example to .env and update credentials
Run php artisan key:generate


## Tests
To run full test suit
    "./vendor/bin/phpunit"

## Setup domain

Add subdomain to Hosts file(The IP address should be same as the main site)
   127.0.0.17      www.ervapp.local


## Deployment
This project can be deployed in 2 ways.

    1 ) deployment script
        This will only transfer files to the hosting server.All the configurations have to be done manually.
    2 ) Using Jenkis admin
        This project is already configured in jenkins. So use that admin will simplify the deployment.

## Deployment Steps
    1 ) Login to the jenkins portal. http://www.phpjenkins.net
    2 ) select the project.
    3 ) Update the .env details in "Configure" (If any). This will only available to admin users.
    4 ) Select "Build with Parameters" and select the git branch you want to deploy.
    5 ) Press "Build". The build will automatically run the tests and decide is the current build stable.

That's it.....

## Installation docker
First, update your existing list of packages:<br>
`sudo apt update` <br>

Next, install a few prerequisite packages which let apt use packages over HTTPS:<br>
`sudo apt install apt-transport-https ca-certificates curl software-properties-common` <br>

Then add the GPG key for the official Docker repository to your system: <br>
`curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -` <br>

Add the Docker repository to APT sources: <br>
`sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu bionic stable"` <br>

Next, update the package database with the Docker packages from the newly added repo:<br>
`sudo apt update`

Make sure you are about to install from the Docker repo instead of the default Ubuntu repo:<br>
`apt-cache policy docker-ce` <br>

You'll see output like this, although the version number for Docker may be different: <br>
`docker-ce:`<br>
   `Installed: (none)`<br>
   `Candidate: 18.03.1~ce~3-0~ubuntu`<br>
   `Version table:`<br>
      `18.03.1~ce~3-0~ubuntu 500`<br>
         `500 https://download.docker.com/linux/ubuntu bionic/stable amd64 Packages`<br>

Notice that `docker-ce` is not installed, but the candidate for installation is from the Docker repository for `Ubuntu 18.04 (bionic)`.<br>

Finally, install Docker:<br>
`sudo apt install docker-ce`<br>

Docker should now be installed, the daemon started, and the process enabled to start on boot. Check that it's running:<br>
`sudo systemctl status docker`<br>

#####Executing the Docker Command Without Sudo (Optional):<br>
By default, the `docker` command can only be run the `root` user or by a user in the `docker` group, which is automatically created during Docker's installation process. If you attempt to run the docker command without prefixing it with `sudo` or without being in the docker group, you'll get an output like this.<br>
`docker: Cannot connect to the Docker daemon. Is the docker daemon running on this host?.
 See 'docker run --help'.`

If you want to avoid typing `sudo` whenever you run the `docker` command, add your username to the `docker` group.<br>
`sudo usermod -aG docker ${USER}`

To apply the new group membership, log out of the server and back in, or type the following:<br>
`su - ${USER}`

Now you have succssfully installed the docker.To view all available subcommands, type:<br>
`docker`.

Then install the docker-compose:<br>
`sudo apt install docker-compose`

Test the docker-compose installation.<br>
`docker-compose --version`


#####Now you can up your site on docker containers by:<br>
Stop all other proceses running on port 80.<br>
Ex: If apache is running on port 80, you have to stop it before run the below command.<br>
`docker-compose up -d`

When you want run artisan command in project, do like below.<br>
`docker-compose exec app php artisan migrate`.

You have to add following entry to `/etc/hosts` file to load the laravel site and phpmyadmin. <br>
`127.0.0.1 ervapp.local pma.ervapp.local`


To stop the containers you can run `docker-compose kill`. If you'd like to remove them all together, after stopping run `docker-compose rm`.
