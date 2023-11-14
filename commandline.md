# CLI Notes

When you want the full path, a shortcut would be:
```
command $(realpath <filename>)
```
e.g.
```
file $(realpath forbidden_paths.txt)
```
output:
/home/$USER/code/picoctf/forbidden_paths.txt: ASCII text
