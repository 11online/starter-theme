# Starter Theme
11 Online Genesis Starter Theme

# Gulp Tasks
### 1) gulp sass
Compiles the css
### 2) gulp serve
Watches local changes, runs the sass task, and uses browserSync to dynamically reload your browser
### 3) gulp deploy
Deploys theme, based on config.json

# Setting up Gulp Deploy for Windows

This all has to happen in git bash

## 1) Add your key to ssh-agent
List the keys that have been added to ssh-agent, if your key is not list it, then add it. List again to double check.
```
ssh-add -L
eval `ssh-agent -s`
ssh-add ~/.ssh/id_rsa
ssh-add -L
```
The location of your key file may be different than the default location, so adjust accordingly.

## 2) Test connection from Vagrant
SSH into vagrant and test your connection to Github. If you are successful, then your ssh-agent-forwarding works!
```
vagrant ssh
ssh -v -T git@github.com
```
Make sure the key you added in step 1 is also added to your Github account.

## 3) Run NPM install on the directory your want to deploy from
Go to the plugin or theme path and npm install.
```
cd /to/path/of/plugin/or/theme
npm install --no-bin-links
```
The --no-bin-links argument will prevent npm from creating symlinks for any binaries the package might contain.

## 4) Install Gulp
```
npm install -g gulp
```

## 5) Create a symlink
```
sudo ln -s node_modules/gulp/bin/gulp.js /usr/bin/gulp
```
A symbolic link (also symlink or soft link) is the nickname for any file that contains a reference to another file or directory in the form of an absolute or relative path and that affects pathname resolution.

## 6) Gulp Deloy!!
You may have to add the RSA fingerprint to your known hosts file, just say yes.
```
gulp deploy
```
You should see a list of the files that are being synced between your VM and the server.
