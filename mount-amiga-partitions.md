Dump of useful commands for mounting Amiga partitions
```
parted /dev/sdb
u
p
b
# units, partitions, bytes
# yuse that information to populate the offset (starting position) and size when setting up the loop device
losetup -o 2080899072 --sizelimit 1932263424 /dev/loop1 /dev/sdb
mount -t affs /dev/loop1 /mnt
```

Unmount partitions
```
umount /mnt
losetup -d /dev/loop1
```
