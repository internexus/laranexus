# Laranexus
A PHP CLI to run local Laravel projects on Docker.
## Install
```
php -r "copy('https://raw.githubusercontent.com/internexus/laranexus/main/laranexus-setup.php');"
php laranexus-setup.php
```

```
chmod +x laranexus.phar
sudo mv laranexus.phar /usr/local/bin/laranexus
```
## Create new project
```
laranexus create my-project
```

## Install
To install a newly cloned repository:

```
laranexus install
```

## Server
Start nginx server
```
laranexus server
```
