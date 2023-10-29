exclude diretory
```
rsync -avz --exclude '/smb/shares/lost+found' <source> <dest>
```

exclude locations in a file
```
rsync -avz --exclude-from='exclude-file.txt' <source> <dest>
```
