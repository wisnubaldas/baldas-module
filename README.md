
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
