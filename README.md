Steps to start the Fleet Management System Project:
  **BACKEND**
  **first you have to create a .env file and configure your database**
  Open your terminal and run those commands in the same order:
    1) git clone https://github.com/marcmedhat6211/Fleet-management-system.git
    2) cd Fleet-management-system/Fleet-management-system-Backend
    3) composer install
    4) php artisan key:generate
    5) php artisan cache:clear
    6) php artisan route:cache
    7) php artisan config:cache
    8) php artisan view:clear
    9) php artisan jwt:secret
    10) php artisan migrate
    11) php artisan admin:install
    12) php artisan db:seed
    13) php artisan serve
    
    **Open your browser on http://localhost:8000/admin**
    Username: admin
    Password: admin
    **and now you are all set with backend admin part :)
   
   **FRONTEND**
   open your terminal and run those commands in the same order:
   1) cd Fleet-management-system/Fleet-management-system-Frontend
   2) npm install
   3) ng s
   
   **Open your browser and navigate to http://localhost:4200
   **That's it now you are all set :)**
   
   NOTE:
    I know that the layout is not very nice and that there is a lot of bugs and that there are a lot of requirements missing,
    but i can continue modifying the project as i just need more time for it that's all.
    And in all cases i just want to really thank you for being so professional and for this task, as i have really learned a lot from it.
    Thank you for your time and consideration! :)
