# Cat eCommerce

Stable: v1.0

Cat-ecomm – Single Ecommerce System with Physical Product Marketplace.

This CMS Includes everything you need to make an ecommerce business.

### SET UP

- Requirements (Already covered with Docker deployment)

  1.  Apache/2.4.27 or greater.
  2.  MySQL 5.7 or greater.
  3.  PHP/7.0.0 or greater.

  1. Add host `cat-ecomm.localhost`,
     see [Edit hosts](https://dinahosting.com/ayuda/como-modificar-el-fichero-hosts).
  2. Create `.env` file from `example.env` and set it.
  3. Set `db` instead `localhost` in `.env` while usign Docker.
  4. Give Folder permissions if needed.
  5. Set `APP_KEY=base64:JRMQuAgGC/ItPcqMGpasVBCvErvz0gHVUEMriID+aW8=` at `.env`.
  6. Run `composer install`.
  7. Run `php artisan migrate`.
  8. Run `php artisan passport:keys`.
  9. Run

  ```
    php artisan db:seed --class=AdminSeeder
    php artisan db:seed --class=ProducSeeder
    php artisan db:seed --class=UserSeeder

  ```

- Browse at [cat-ecomm.localhost](http://cat-ecomm.localhost).


```

### CONTRIBUTION: Guidelines & Documentation

- Database Key Fields, tables and or values:
  1.  `users.email`: Users email.
  2.  `admins.email`: Admins email = 'admin@gmail.com' password = 'password'.


- Back End: [Laravel 8.64.0](https://laravel.com/docs/8.x/installationphp artisan --version).
- Front End: [Tailwind](https://tailwindcss.com/docs).

---

2021 [Lum Labs]
