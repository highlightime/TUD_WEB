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

1. TUD/public/.htaccess 

```Options -Multiviews``` 

```RewriteEngine on```

```RewriteBase /TUD/public```

```RewriteCond %{REQUEST_FILENAME} !-d```

```RewriteCond %{REQUEST_FILENAME} !-f```

```RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]```

2. TUD/app/.htaccess

```Options -Indexes```



### step 3 : Run XAMPP


### step 4 : Make database tables

Enter phpmyadmin

1. Make schema named **Second_market**

2. Make tables

* board

* member

* reply

### step 5 : Access to web page we made

Requirements
=============


Contributing
=============

If you want to contribute to TUD_WEB, you can find more information by sending email to us

Yunhyeong Seo

D19123743@mytudublin.ie

Sanghyun Byun

D19123124@mytudublin.ie
