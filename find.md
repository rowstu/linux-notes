Large files in current directory
```
find . -type f -size +100M
```
10 largest files on the whole system
```
du -aBm / 2>/dev/null | sort -nr | head -n 10
```
Find filename but hide errors
```
find . -type f -name <filename> 2>/dev/null
```
Use ncdu to scan through the current directory and visually show you large files
```
pacman -S ncdu # install it first
ncdu
```
