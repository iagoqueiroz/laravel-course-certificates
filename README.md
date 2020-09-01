# Installation steps

```bash
composer install
npm install
npm run dev
chmod -R 775 storage
chmod -R 775 bootstrap/cache
php artisan storage:link
php artisan migrate --seed
```

# Authentication

```
Login: alamo@test.com
Password: secret
```
