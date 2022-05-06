Yikyak inspired social media copy  
  
Login into local mysql via terminal. `mysql -u root`  
Create a database called `create database yikyak;`  
Run the migrations `php artisan migrate`  
Add `--seed` to the end of the migration command to seed some data at the same time. Or `php artisan db:seed` to seed separately.  