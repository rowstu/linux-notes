Large files in current directory
```
find . -type f -size +100M
```
10 largest files on the whole system
```
du -aBm / 2>/dev/null | sort -nr | head -n 10
```
