# linux Notes
common commands usage


Check SSHD before restart
```
sshd -t
```
Print ssh settings for a host
```
ssh -G <hostname>
```

vim make all text lower case
```
:%s/.*/\L&/
```
Convert to uppercase
```
tr '[:lower:]' '[:upper:]' < input.txt > output.txt
```
Convert to lowercase
```
tr '[:upper:]' '[:lower:]' < input.txt > output.txt
```
Remove whitespace
```
tr -d ' ' < input.file > output.file
```
