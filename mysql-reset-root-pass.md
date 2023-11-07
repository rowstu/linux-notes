```
systemctl mysqld stop
mysqld_safe --skip-grant-tables &
mysql -e 'UPDATE mysql.user SET Password=PASSWORD('new-password') WHERE User='root';FLUSH PRIVILEGES;'
systemctl mysqld stop
systemctl mysqld start
```
