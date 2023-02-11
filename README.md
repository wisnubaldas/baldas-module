
# Pakage Laravel

Pakage ini buat nambahin kalo mau pake pakage nya repository, kalo sudah menggunakan pakage ini pembuatan laravel sudah menggunakan patern clean arsitektur. Tapi boleh juga bikin sembarangan terserah itumah.

### credit

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
