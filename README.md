
# Pakage Laravel Clean Class Patern

Pakage ini buat nambahin kalo mau pake pakage nya repository, kalo sudah menggunakan pakage ini pembuatan laravel sudah menggunakan patern clean arsitektur. Tapi boleh juga bikin sembarangan terserah itumah.

### require system

```json
        "php": "^8.0.2",
        "prettus/l5-repository":"^2.8",
        "league/fractal": "^0.20.1",
        "laravel/sanctum": "^3.1"
```

### Install

```composer require wisnubaldas/baldas-module```



[andersao/l5-repository](https://github.com/andersao/l5-repository)

[league/fractal](https://fractal.thephpleague.com/)

### Command

Create route file
```bash
php artisan make:route {name}
``` 
perintah ini akan menggenerate file route di folder ``` routes/web/ ```

```bash
php artisan make:use-case {name}
```
perintah ini akan membuat file usecase class pada folder ``` app/UseCase/```

```bash
php artisan make:domain {name}
```

perintah ini akan membuat file domain pada folder ``` app\Domain ```

### Membuat multiple koneksi di laravel

Deklarasi berapa koneksi yang akan di buat 

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