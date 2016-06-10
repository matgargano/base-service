# config valid only for current version of Capistrano


set :application, 'service.statenweb.com'
set :repo_url, 'git@github.com:matgargano/base-service.git'
set :log_level, :info
set :branch, `git rev-parse --abbrev-ref HEAD`.chomp

set :linked_files, fetch(:linked_files, []).push('.env')




namespace :deploy do
  desc 'Restart application'
  task :restart do
    on roles(:app) do
    	within release_path do
	        execute :composer, :install
	        execute :composer, :dumpautoload :-o

	  end
    end
  end
end

after 'deploy:publishing', 'deploy:restart'
