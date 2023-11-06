List startup services
```
systemctl list-unit-files --type=service --state=enabled
```
List disabled services
```
systemctl list-unit-files --type=service --state=disabled
```
List running services
```
systemctl --state=active
```
List unit files
```
systemctl list-unit-files --state=enabled
```
Check a service is enabled
```
systemctl is-enabled <service>
```
Like the old `chkconfig --list`
```
systemctl list-unit-files --type=service
ls /etc/systemd/system/*.wants/
```
Reload systemd after creating new unit file
```
systemctl daemon-reload
```
Switch to different runlevel
```
systemctl isolate runlevel1.target
systemctl isolate multiuser.target
systemctl isolate graphical.target
```
Change default run-level
```
systemctl get-default # check what it's currently set to
systemctl set-default multiuser.target # nongraphical
```
Check boot messages
```
journalctl -b
journalctl -b -p err # show priority errors
```
Show all warning and higher level errors since date
```
journalctl -p warning --since=2023-11-01 00:00:00
```
Show log from a particular unit
```
journalctl -u httpd.service
```
Show failed services
```
systemctl --state=failed
```
Show what other units a unit depends on
```
systemctl show -p "Wants" multi-user.target
```
Check for stuck jons
```
systemctl list-jobs
```





