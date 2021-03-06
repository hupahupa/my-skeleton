#
# Cookbook Name:: main
# Recipe:: default
#
# Copyright 2012, Cogini
#
# All rights reserved - Do Not Redistribute
#

include_recipe 'apt'
include_recipe 'php::fpm'
include_recipe 'php::module_pgsql'
include_recipe 'nginx'
include_recipe 'postgresql::client'
include_recipe 'git'

include_recipe 'python'


yii_version = node[:myskeleton][:yii_version]
app_user = node[:myskeleton][:app_user]
db = node[:myskeleton][:db]
site_dir = node[:myskeleton][:site_dir]


yii_framework yii_version do
    symlink "#{site_dir}/../yii"
end


if db[:host] == 'localhost'

    include_recipe 'postgresql::server'
    db_user = db[:user]

    pgsql_user db_user do
        password db[:password]
    end

    pgsql_db db[:database] do
        owner db_user
    end
end


user app_user do
    home "/home/#{app_user}"
    shell '/bin/bash'
    supports :manage_home => true
    action :create
end


directory node[:myskeleton][:log_dir] do
    action :create
    recursive true
end


template "#{site_dir}/protected/config/local.php" do
    source 'yii-local.php.erb'
    mode '0644'
end

template "#{site_dir}/protected/config/db.json" do
    source 'yii-db.json.erb'
    mode '0644'
end

template "#{site_dir}/protected/scripts/set_env.sh" do
    source 'set_env.sh.erb'
    mode '0644'
end


%w{ protected/runtime assets images/uploads }.each do |component|

    the_dir = "#{site_dir}/#{component}"

    bash 'setup permissions' do
        code <<-EOH
            mkdir -p #{the_dir}
            chgrp -R www-data #{the_dir}
            chmod -R g+rw #{the_dir}
            find #{the_dir} -type d | xargs chmod g+x
        EOH
    end
end


site_name = 'myskeleton'

template "/etc/nginx/sites-available/#{site_name}" do
    source 'nginx-myskeleton.erb'
    mode '0644'
end

nginx_site 'default' do
    action :disable
end

nginx_site site_name do
    action :enable
end

# Schemup
%w{libpq-dev}.each do |pkg|
    package pkg do
        action :install
    end
end

python_env = node[:myskeleton][:python][:virtualenv]
build_dir = node[:myskeleton][:python][:build_dir]

[build_dir, python_env].each do |dir|
    directory dir do
        action :create
        recursive true
    end
end

python_virtualenv python_env do
    action :create
end

# Other dependencies
bash 'install python dependencies' do
    code <<-EOH
        . #{python_env}/bin/activate
        pip install -r #{site_dir}/protected/schema/requirements.txt
    EOH
end
