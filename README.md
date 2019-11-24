TUD_WEB
=============

This is our pair **web** project that have some requirements.

We made a web page for **selling second-hand items**.

Loads of files and functions it would provide.

Table of contents:

* Usage instructions

* Requirements

* Contributing



Usage
=============
### step 1 : Download TUD file

```git clone https://github.com/yunobro/TUD_WEB```

### step 2 : Add two files to access

#### 1.TUD/public/.htaccess 

```Options -Multiviews``` 

```RewriteEngine on```

```RewriteBase /TUD/public```

```RewriteCond %{REQUEST_FILENAME} !-d```

```RewriteCond %{REQUEST_FILENAME} !-f```

```RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]```

#### 2.TUD/app/.htaccess

```Options -Indexes```



### step 3 : Run XAMPP

Run XAMPP sever and mount that memory 

you should move the file TUD to server

For example

```mv ./TUD nfs://192.168.64.2/opt/lampp/htdocs```


### step 4 : Make database tables

#### 1.Enter phpmyadmin

#### 2.Make schema named **Second_market**

#### 3.Make tables

* member

```DROP TABLE IF EXISTS `member`;```

```CREATE TABLE `member` ( `id` varchar(45) NOT NULL, `pw` varchar(45) NOT NULL, `mail` varchar(30) NOT NULL, `addr` varchar(20) NOT NULL, `city` varchar(45) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;```

* board

```DROP TABLE IF EXISTS `board`;```

```CREATE TABLE `board` ( `board_id` int(11) NOT NULL, `title` varchar(50) NOT NULL, `content` varchar(300) NOT NULL, `author` varchar(10) NOT NULL, `date` date NOT NULL, `hit` int(11) NOT NULL, `file` varchar(100) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;```

* reply

```DROP TABLE IF EXISTS `reply`;```

```CREATE TABLE `reply` ( `reply_id` int(11) NOT NULL, `board_id` int(11) NOT NULL, `author` varchar(10) NOT NULL, `content` varchar(300) NOT NULL, `date` datetime NOT NULL DEFAULT current_timestamp() ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;```

### step 5 : Access to web page we made

Type the web site 

http://localhost:8080/TUD/public/

Requirements
=============


Contributing
=============

If you want to contribute to TUD_WEB, you can find more information by sending email to us

Yunhyeong Seo

D19123743@mytudublin.ie

Sanghyun Byun

D19123706@mytudublin.ie
