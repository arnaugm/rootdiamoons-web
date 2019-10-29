# Root Diamoons Website

This is the website of the catalan jamaican music band Root Diamoons. The content is available in Catalan, Spanish and English.

## Technologies

The site uses the full stack version of the **Symfony** framework and JavaScript libraries to help in the font-end. The concerts section of the site is constantly updated with scheduled shows. To manage that, **Easy Admin Bundle** provides a password protected administration panel.

### Back-end

* **Symfony**: http://symfony.com/
* **Easy Admin Bundle**: https://github.com/javiereguiluz/EasyAdminBundle

### Front-end

* **jQuery**: https://jquery.com/
* **jQuery UI**: http://jqueryui.com/
* **prettyPhoto**: http://www.no-margin-for-errors.com/projects/prettyPhoto-jquery-lightbox-clone/

## Communication

Subscription to the band's mailing list is available through contact section, and the newsletters, together with their web version, are stored in the repository.

## Monitoring

Log level is set to ERROR and an email is sent to the administrator in case of CRITICAL errors or above.
Google Analytics code is present in the templates with configurable user id.

## Configuration

The following aspects are configurable through the *parameters.yml* file:

* Database parameters
* Mailer parameters
* Default and available locales
* Security secret key
* Google Analytics user id
* Administrator email address
* Mailing list email address
* Mailing list subscription email address 
* Mailing list unsubscription email address

## Development setup

* Manage PHP version using [PHPBrew](https://github.com/phpbrew/phpbrew)
```bash
phpbrew use php56
```
* Install dependencies
```bash
composer install
```
* Fill *parameters.yml* file
* Create database
```bash
app/console doctrine:database:create
app/console doctrine:schema:create
```
* Create admin user (admin/admin)
```bash
app/console doctrine:fixtures:load
```
* Install web assets
```bash
app/console assets:install --symlink www
```
* Clear cache
```bash
app/console cache:clear
```
* Start development server
```bash
app/console server:start --docroot=www
```

# Administration

Access the administration section in /admin