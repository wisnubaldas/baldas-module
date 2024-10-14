
# Pakage Generate CRUD API Laravel

Pakage ini mempermudah pembuatan costum Model, Controller, Request, Repository. ini hanya bisa
dijalankan ketika dalam pembuatan aplikasi sudah ada database nya, atau aplikasi yg akan dimigrasi menggunakan laravel, misalnya. 

Ada beberapa tambahan perintah artisan jika menginstal package ini,

```make:custom-model``` perintah ini akan membuat file custom model, api controller, request dan repository

```make:domain``` perintah ini akan membuat file dalam folder domain, 

```make:use-case``` perintah ini akan membuat file dalam folder usecase,

```make:route``` perintah ini akan membuat file routing terpisah

dengan begitu aplikasi dapat kita buat dengan memnentukan model arsitektur yang kita inginkan
ditambah dengan package tambahan dari [andersao/l5-repository](https://github.com/andersao/l5-repository).

Package ini juga sudah include dengan 

[andersao/l5-repository](https://github.com/andersao/l5-repository) ini memungkinkan kita membuat reposirtory data model di laravel

[brick/varexporter](https://github.com/brick/varexporter) It is particularly useful to store data that can be cached by OPCache, just like your source code, and later retrieved very fast, much faster than unserializing data using unserialize() or json_decode().

[codedredd/laravel-soap](https://github.com/CodeDredd/laravel-soap) This package provides an expressive, minimal API around the Soap Client from Phpro, allowing you to quickly make outgoing SOAP requests to communicate with other web applications.

[ovac/idoc](https://github.com/ovac/idoc) Automatically generate an interactive API documentation from your existing Laravel routes. Take a look at the example documentation. Inspired by Laravel Api Documentation Generator

[bennett-treptow/laravel-migration-generator](https://github.com/bennett-treptow/laravel-migration-generator) Generate migrations from existing database structures, an alternative to the schema dump provided by Laravel. A primary use case for this package would be a project that has many migrations that alter tables using ->change() from doctrine/dbal that SQLite doesn't support and need a way to get table structures updated for SQLite to use in tests. Another use case would be taking a project with a database and no migrations and turning that database into base migrations.

### require system

```json
        "require": {
                "php": "^8.2",
                "prettus/l5-repository": "^2.9",
                "brick/varexporter": "^0.5.0",
                "codedredd/laravel-soap": "^3.0",
                "ovac/idoc": "^1.7"
        },
        "require-dev": {
                "laravel/prompts": "^0.3.0",
                "prettus/l5-repository": "^2.9",
                "brick/varexporter": "^0.5.0",
                "codedredd/laravel-soap": "^3.0",
                "ovac/idoc": "^1.7",
                "bennett-treptow/laravel-migration-generator": "^4.4"
        },
```

### Install

```composer require wisnubaldas/baldas-module```


### Membuat multiple koneksi di laravel

Tambahkan koneksi pada file .env 

```bash
MULTIPLE_CONNECTION=4
```

buat koneksi nya

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ctos_api_v2
DB_USERNAME=root
DB_PASSWORD=

DB_DRIVER_1=mysql
DB_CONN_1=rdwarehouse_jkt
DB_HOST_W_1=127.0.0.1
DB_HOST_R_1=127.0.0.1
DB_PORT_1=3306
DB_NAME_1=rdwarehouse_jkt
DB_USER_1=root
DB_PASS_1=


DB_CONN_2=rdlogin
DB_HOST_W_2=127.0.0.1
DB_HOST_R_2=127.0.0.1
DB_PORT_2=3306
DB_NAME_2=rdlogin
DB_USER_2=root
DB_PASS_2=

DB_CONN_3=tps_online
DB_HOST_W_3=127.0.0.1
DB_HOST_R_3=127.0.0.1
DB_PORT_3=3306
DB_NAME_3=db_tpsonline
DB_USER_3=root
DB_PASS_3=
```

koneksi mendukung failover

### minimum stability ```composer require --dev wisnubaldas/baldas-module:dev-master```