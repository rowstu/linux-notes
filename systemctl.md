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
