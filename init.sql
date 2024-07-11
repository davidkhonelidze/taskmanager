-- Create databases
CREATE DATABASE IF NOT EXISTS redmine;

-- Create user and grant privileges
CREATE USER 'redmine_user'@'%' IDENTIFIED BY '712477';
GRANT ALL PRIVILEGES ON redmine.* TO 'redmine_user'@'%';
FLUSH PRIVILEGES;
