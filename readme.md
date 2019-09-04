RSS Task
=====
# Requirments
* PHP 7.2
* Composer
* Laravel related extensions like: BCMath Ctype JSON Mbstring OpenSSL PDO XML

# Setup
1. Run `touch database/database.sqlite` to create empty sqlite database (make file readable and writable by webserver if you are using it) or configure different DB source
2. (Optional) Copy file `.env.example` to `.env` and change configuration if you need it  
3. Run `composer install`
4. Run `php artisan migrate`
5. Run `php artisan serve` or use Apache or Nginx as server with default Laravel configuration

# Notable files

* Fronted email verification - [library](resources/js/email-verification.js), [usage](resources/js/app.js) 
* [Backend email verification](app/Http/Controllers/VerifyController.php)
* [RSS Reader controller](app/Http/Controllers/HomeController.php)
* [RSS Reader view](resources/views/home.blade.php)
* [RSS Reader TopWordsExtractor](app/Service/TopWordsExtractor.php) 


# Task

Your task is to create simple RSS reader web application with following views:
1) User registration - form with e-mail and password fields + e-mail verification using ajax.
Existence of already registered e-mail should be checked “on the fly” via ajax call when writing e-mail
address and before submitting form.
2) Login form with e-mail address and password
3) RSS feed view (Feed source: https://www.theregister.co.uk/software/headlines.atom)
*) After successful login in top section display 10 most frequent words with their respective counts in
the whole feed excluding top 50 English common words (taken from here
https://en.wikipedia.org/wiki/Most_common_words_in_English)
*)Underneath create list of feed items.
There are no restrictions on frameworks (PHP and/or JS) used.
When doing this task please apply the best practices in software development. Add commits with your
code separately from framework code
Please send the code (archive or link to github) and instructions how to set it up once completed.
