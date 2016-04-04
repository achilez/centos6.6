1. Environment Setup Test
    - Setup LAMP Environment in VirtualBox
        CentOS - 6.6 or higher
        Apache - 2.2.X or higher
        MySQL - 5.6.X
        PHP - 5.5.X or higher

    You can choose on how you will setup:
    a. Using chef or ansible
    b. Manual installation from an image /home/bibo-cebu/Desktop/CentOS-6.6-x86_64-minimal.iso
Note: If you prefer manual installation, please print the history of your commands into text file and commit it to the repository.

//////////////////////////////////////////////////////////////////////////
///////////////////// START ENVIRONMENT SETUP TEST ///////////////////////
//////////////////////////////////////////////////////////////////////////

* Open Virtual Box and createD a new REDHAT SERVER 64bit (CENTOS)
* Language selection: English
* Keyboard: us
* System clock: Asia/Manila
* root password: root123


CentOS installation success: see screenshot
/images/centos-installed-success.png

* Run the newly installed CENTOS and login as 'root'

Lets create a new user so we can secure the root account
# adduser mercader

Lets create a new password
# passwd mercader
New Password: mercader

Lets add root privilege on the new user
# visudo
Lets add the new user to have root privilege below 
root    ALL=(ALL)       ALL
mercader    ALL=(ALL)       ALL

Save the file [esc]:wq

Lets configure SSH to secure the server
# vi /etc/ssh/sshd_config

Port 22 (you can change any port to secure SSH access)
Protocol 2
PermitRootLogin no (this will disable root access and you will only login as new user)

AllowUsers mercader
Save the file

Reload the sshd server by running
# service sshd reload

You can now run SSH via new user created

Now lets setup a bridge network so our centos server has IP address

Lets install the latest Apache server
# sudo yum install httpd

start the apache server after installation 
# sudo service httpd start

Now, lets install latest MySQL server
# sudo yum install mysql-server
After installation lets start the mysql server
# sudo service mysqld start

Lets set a root MySQL password:
# sudo mysql_secure_installation
New root password: root

Now lets install latest PHP version
# sudo yum install php php-mysql

Lets set the apache to start automatically after boot:
# sudo chkconfig httpd on
Lets set mysql to start automatically after boot:
# sudo chkconfig mysqld on

Restart apache so that all of the changes take effect on your virtual server:
# sudo service httpd restart


SUMMARY:

CENTOS ROOT ACCESS:
Username: root
Password: root123

Username: mercader
Password: mercader

MYSQL SERVER:
Username: root
Password: root
HOST: localhost

GITHUB URL:
https://github.com/achilez/centos6.6

//////////////////////////////////////////////////////////////////////////
///////////////////// END ENVIRONMENT SETUP TEST /////////////////////////
//////////////////////////////////////////////////////////////////////////
