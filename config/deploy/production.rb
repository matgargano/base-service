set :stage, :staging
set :deploy_to, -> { "/home/ubuntu/#{fetch(:application)}/public" }

server 'qa.statenweb.com', user: 'ubuntu', roles: %w{web app db}


fetch(:default_env).merge!(wp_env: :production)