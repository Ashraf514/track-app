STEP:1  - run command composer create-project --prefer-dist laravel/laravel order-management
STEP:2  - run command php artisan migrate

#Install vue application
STEP:3  - run command "npm install -g @vue/cli"
STEP:4  - run command "vue create trackapp"

STEP:5  - choose "vue 2 [babel/eslint]" option
STEP:6  - run comman 'vue create trackapp' and switch to 'trackapp' directory
STEP:7  - run build using 'npm run build' and after build created successfully copy content from dist folder to laravel's
        root "/public" folder and paste content there which has js and css
STEP:8  - now change the route in web.php load a blade template and there import the js and css copied in previous step
STEP:9  - congratulations your project will run successfully
STEP:10 - add router via "vue add router" command


12732
2700
