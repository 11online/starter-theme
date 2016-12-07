# Starter Theme
11 Online Genesis Starter Theme

# Gulp Tasks
### 1) gulp sass
Compiles the css
### 2) gulp serve
Watches local changes, runs the sass task, and uses browserSync to dynamically reload your browser
### 3) gulp deploy
Deploys theme, based on config.json. Note: this deploy task is ssh based, so your server needs to allow you to connect over ssh. If you are not on the 11 online team, you'll also need to change the username in gulpfile.js

# Setting up Gulp Deploy for OSX
The deploy task uses rsync, which should already be installed. Just set up config.json and run
```
gulp deploy
```

# Setting up Gulp Deploy for Windows (first time per vagrant box)

This all has to happen in git bash. If your vagrant box has already been set up with these steps, you can just use steps 3, 6 and 7.

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

## 6) Set up config.json if it is not already set up
You need the server hostname and the destination is the path on the server for deployment

## 7) Gulp Deloy!!
You may have to add the RSA fingerprint to your known hosts file, just say yes.
```
gulp deploy
```
You should see a list of the files that are being synced between your VM and the server.
