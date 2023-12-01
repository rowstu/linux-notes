Check SSHD before restart
```
sshd -t
```
Print ssh settings for a host
```
ssh -G <hostname>
```
Generate or amend a passphrase to an existing key
```
ssh-keygen -p -f ~/.ssh/id_rsa
```
