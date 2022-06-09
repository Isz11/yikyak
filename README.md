Yikyak inspired social media copy

![](img/homepage.png)

Login into local mysql via terminal. `mysql -u root`  
Create a database called `create database yikyak;`  
Run the migrations `php artisan migrate`  
Add `--seed` to the end of the migration command to seed some data at the same time. Or `php artisan db:seed` to seed separately.
Note - seems the seeders need to be ran in a specific order or one doesn't work.

Notes for later
- requires livewire
