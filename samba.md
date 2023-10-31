Example working config
```
[global]

   workgroup = WORKGROUP
   dns proxy = no
   log file = /var/log/samba/log.%m
   max log size = 1000
   panic action = /usr/share/samba/panic-action %d
   server role = standalone server
   passdb backend = tdbsam
   obey pam restrictions = yes
   unix password sync = yes
   passwd program = /usr/bin/passwd %u
   passwd chat = *Enter\snew\s*\spassword:* %n\n *Retype\snew\s*\spassword:* %n\n *password\supdated\ssuccessfully* .
   pam password change = yes
   map to guest = bad user
   security = user
   guest account = guest 
   usershare allow guests = yes

[share1]
    comment = share1
    path = /share1
    public = yes
    writable = yes
    printable = no
    create mask = 0666
    directory mask = 2777
    force create mode = 0666
    force directory mode = 2777
    guest ok = yes
    force user = guest

[share2]
    comment = share2
    path = /share2
    public = yes
    writable = yes
    printable = no
    create mask = 0666
    directory mask = 2777
    force create mode = 0666
    force directory mode = 2777
    guest ok = yes
    force user = guest

```
