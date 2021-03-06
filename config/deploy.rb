# INITIAL CONFIGURATION
set :application, "provider.com"
set :export, :remote_cache
set :keep_releases, 5
set :cakephp_app_path, "app"
set :cakephp_core_path, "cake"
#default_run_options[:pty] = true # Para pedir la contraseña de la llave publica de github via consola, sino sale error de llave publica.

# DEPLOYMENT DIRECTORY STRUCTURE
set :deploy_to, "/home/embalao/provider.bloomweb.co"

# USER & PASSWORD
set :user, 'embalao'
set :password, 'rr40r900343'

# ROLES
role :app, "provider.com"
role :web, "provider.com"
role :db, "provider.com", :primary => true

# VERSION TRACKER INFORMATION
set :scm, :git
set :use_sudo, false
set :repository,  "git@github.com:bloomtec/provider.git"
set :branch, "master"

# TASKS
namespace :deploy do
  
  task :start do ; end
  
  task :stop do ; end
  
  task :restart, :roles => :app, :except => { :no_release => true } do
    run "cp /home/embalao/provider.bloomweb.co/current/. /home/embalao/provider.bloomweb.co/ -R"
    run "chmod 666 /home/embalao/provider.bloomweb.co/app/config/database.php"
    run "cp /home/embalao/provider.bloomweb.co/app/config/database.php.srvr /home/embalao/provider.bloomweb.co/app/config/database.php"
    run "chmod 777 /home/embalao/provider.bloomweb.co/app/tmp/ -R"
    run "chmod 777 /home/embalao/provider.bloomweb.co/app/webroot/img/uploads/ -R"
  end
  
end