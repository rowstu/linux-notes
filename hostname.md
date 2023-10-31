Commands to change hostname
```
hostnamectl set-hostname <fqdn>
hostnamectl set-hostname <fqdn> --static
echo <fqdn> > /proc/sys/kernel/hostname
```
Editing the /etc/hosts file also trigger a systemd update of the hostname after a timeout
