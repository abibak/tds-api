# Backend

[API Documentation](http://localhost:9090/api/documentation)

Переход в папку backend
```
cd ./backend
```

Установка зависимотей
```
composer install
```

Выполнение миграций и заполнение БД
```
php artisan migrate --seed
```

Установка ключей laravel passport
```
php artisan passport:install
```

Запуск сервера
```
php artisan serve --port=9090
```

# Frontend

Переход в папку frontend
```
cd ./frontend
```

Установка зависимостей
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```