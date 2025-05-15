My own blog.
Maiden for self-studying and testing new fetures.
For installing via docker or server with debian/ubuntu.

I use here:

* php 8.1
* laravel 10
* sql (mariadb)
* vite
* html5+css3
* ddev (docker framework)

### To install locally with Make and DDEV:

* install from repo
* then run
*
	* `make start`
*
	* `make composer`
*
	* `make npm-install`
*
	* `make migrate`
*
	* `ddev launch`

### to install on test server:

* install from repo
* then run
*
	* `composer install`
*
	* `npm install`
*
	* `php artisan migrate`
*
	* don't forget to prepare server for using website (apache or nginx)

Also you can use Makefile as roadmap 'how to run'. Very useful comands there.

https://ws.ddev.site/laravel-websockets - for websockets UI
