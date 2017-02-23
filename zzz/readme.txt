Source:
untar openaudit.tar.gz into /var/www/html
other source will locate in /usr/local/open-audit

Customization:
## remark line 66 to remove the error in audit domain
/usr/local/open-audit/other/audit_windows.vbs

64: ' optional - query this Active Directory attribute to determine the users work unit
65: ' if attribute #1 produces nothing, then try attribute #2
66: ' windows_user_work_1 = "physicalDeliveryOfficeName"
67: windows_user_work_2 = "company"


## modify login page
/usr/local/open-audit/code_igniter/application/views/v_login.php
oae_message: application/controllers/login.php 
image: /var/www/html/open-audit/images

## first page
/usr/local/open-audit/www/index.html

## edit "Audit my PC" function
/usr/local/open-audit/code_igniter/application/controllers/login.php
line 189: public function audit_my_pc()

