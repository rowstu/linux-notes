
# OpenSSL Commands for Apache


### Check cert and key match
```
KEY=<key name>
CERT=<certname>

# check end date of a cert
openssl x509 -inform pem -subject -enddate -noout -in $CERT

# calculate modulus of the cert
openssl x509 -modulus -noout -in $CERT | openssl sha256

# calculate the modulus of the private key
openssl rsa -modulus -noout -in $KEY | openssl sha256
```

### View relevant Apache config
```
grep SSLCertificateFile /etc/httpd/vhosts.d/*
grep ServerName /etc/httpd/vhosts.d/*
```

### Check the certificate chain
```
CHAIN=<full chain file>
openssl verify -CAfile $CHAIN $CERT
```

### Show full cert details
```
openssl x509 -text -noout -in $CERT
```

## High level steps for a successful certificate swap

The following steps assume the existing certificate chain and key have not changed.

1. Check the new cert is actually a new cert (see above).
2. Check the modulus of the cert and key (see above).
3. Check the certificate chain (see above).
4. Check the cert filename matches the name in the Apache config. This saves editing config files.
5. Check Apache is actually running and you can see the site in the browser without issues.
```
systemctl status httpd
```
6. Check the Apache config
```
apachectl configtest
Syntax OK
```
7. Check the Apache log files for anything out of the ordinary
```
tail /var/log/messages
journalctl -u httpd
```
8. Do an initial graceful restart of Apache. If there's an issue it's best solving the current issue rather than being led to believe it's your new cert causing the issue.
```
apachectl graceful
```
9. Backup the existing cert
```
cp <current cert> old/<backup.conf.date>
```
10. Copy the new cert overwriting the current cert
```
cp $CERT /path/to/existing/cert.crt
```
11. Do another graceful restart and then check everything is still running and the new cert is displayed in the browser.

Use open_ssl to get expiry date
```
echo | openssl s_client -connect www.linux.com:443 2>/dev/null | openssl x509 -noout -enddate
```
