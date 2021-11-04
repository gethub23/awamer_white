# cross team dashboard 
dashboard works with InterFace/Repository Design Pattern , read more about design pattern [here](https://asperbrothers.com/blog/implement-repository-pattern-in-laravel)
## Usage 
-- create empty dataBase , change database data in .env file 
-- first run commands 

```bash
php artisan migrate --seed
```
to migrate base tables of dashboard and create new users , roles and permissions to use dashboard 
email    : aait@info.com
password : 123456

## Usage for create new section in dashboard

```bash
php artisan make:fullsection SectionName arabicSingleName arabicPluralName 
```
## tips 
- SectionName It must be singular, not plural, and begins with the capital letter 
- arabicSingleName The name of the section in Arabic singular
- arabicPluralName The name of the section in Arabic plural
- this command create for you meny files (New Repository , Interface , Controller in Admin Folder , Model in Models folder , DataBase Migrate , Blade Folder in admin folder And Blade File , basic [index - store - update - delete] routes in web.php file for dashboard use )
- you can use ( --seed ) optional with command to create new Seeder for this section 
- you can use ( --ob ) optional with command to create new Observer for this section 
- you can use ( --request ) optional with command to create new form request file and folder in Request/Admin  for this section 
- you can use ( --resource ) optional with command to create new resource for this section in Resources/Api Folder



## Example
- for create new section for banks in dashboard run command  
```bash 
php artisan make:section Bank بنوك بنك --seed --ob --request --resource 
```
--- command create new files to use 

-- new repository (BankRepository.php)  , new (IBank.php) interfacec and connect files with ($this->app->bind(IBank::class, BankRepository::class); in app/Providers/RepositoryServiceProvider file

-- new Controller (BankController.php) with 4 main functions (index - store - update - delete ) 

-- new model (Bank.php) with its database migration

-- new folder (banks) in resources/Admin folder and new blade file (index.blade.php) in this folder contains base structer of file edit it as you need 

-- new seeder file (BanksTableSeeder) if you use (--seed) with command 

-- new observer file (BankObserver) if you use (--ob) with command 

-- new form Request folder (Banks) and request File (Store.php) in Requests/Admin

-- new Resource for Api use in Resources/APi

--  new [show - store - update -delete ] routes in web.php to use in dashboard 

```bash
php artisan make:semisection SectionName 
```
## tips 
- SectionName It must be singular, not plural, and begins with the capital letter 
- this command create for you meny files (New Repository , Interface , Model in Models folder , DataBase Migrate)
- you can use ( --seed ) optional with command to create new Seeder for this section 
- you can use ( --ob ) optional with command to create new Observer for this section 
- you can use ( --resource ) optional with command to create new resource for this section in Resources/Api Folder



## Example
- for create new section for banks in dashboard run command  
```bash 
php artisan make:semisection Bank  --seed --ob --request --resource 
```
--- command create new files to use 

-- new repository (BankRepository.php)  , new (IBank.php) interfacec and connect files with ($this->app->bind(IBank::class, BankRepository::class); in app/Providers/RepositoryServiceProvider file

-- new model (Bank.php) with its database migration

-- new seeder file (BanksTableSeeder) if you use (--seed) with command 

-- new observer file (BankObserver) if you use (--ob) with command 

-- new Resource for Api use in Resources/APi


## Dashboard components 

read more about laravel 7 components [here](https://laravel.com/docs/7.x/blade#components)
- (x-admin.breadcrumb) component have requird slot singleName and optional slots ('addbutton' => if use it and write any letter in it disable add button , 'more buttons" => it used as slot to add new buttons next to add button )
- (x-admin.table) component of data table contain tow required slots ('x-slot name="tableHead"  and x-slot name="tableBody" )
- x-admin.editButton contains required slot (<x-slot name="data"> )
- x-admin.delete contains required slot (url)
- x-admin.AddModel contains three slots (url , singleName , inputs )
- x-admin.editModel contains three slots (url , singleName , inputs ) 
- scripts component contais slot (<x-slot name='moreScript'>) if it was a need to write more js scripts in page , this file has some scripts for handle add , edit , show and delete forms sumbit , show , handle errors show with ajax  
  
