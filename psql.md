show databases
```
\l
# or
\list
```
connect to db
```
\c <db name>
```
list all tables (in search path)
```
\dt
```
list all tables in database (regardless of search path)
```
\dt *.
```
show all tables, list and view
```
\d
```
from the command line
```
psql -h localhost --username=postgres --list
# or
psql -U postgres -l
```
show stuff in table
```
SELECT * FROM <tablename>;
```
