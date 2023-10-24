# linux Notes
common commands usage




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
