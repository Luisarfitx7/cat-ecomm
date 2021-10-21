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
  5. Run command `php artisan db:seed`.
  6. Set `APP_KEY=base64:Jv+WvmI5e+wo4xbMQdLnmI3zjlFR6pFUY2Gv42ox8W8=` at `.env`.
  9. Run `composer install`.
  10. Run

  ```
  composer dump -o
    php artisan migrate --seed
    php artisan db:seed --class=StatesSeeder
    php artisan db:seed --class=CitiesSeeder
    php artisan db:seed --class=PromoCreatedTemplateSeeder
    php artisan db:seed --class=UpdateAttributeOptionsSeeder
    php artisan db:seed --class=UpdateAttributesSeeder
    php artisan db:seed --class=UpdateSubscriptionsSeeder
  ```

- Browse at [cat-ecomm.localhost](http://cat-ecomm.localhost).


```

### CONTRIBUTION: Guidelines & Documentation

- Database Key Fields, tables and or values:

  1.  `users.email`: Users and vendors email.
  2.  `admins.email`: Admins email.


- Back End: [Laravel 8.64.0](https://laravel.com/docs/8.x/installationphp artisan --version).
- Front End: [Tailwind](https://tailwindcss.com/docs).

---

2021 [Lum Labs]
