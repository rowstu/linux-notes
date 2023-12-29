Write floppy image
```
dd if=disk.img of=/dev/sdb bs=512 conv=sync; sync
```
Copy floppy to image
```
dd bs=512 count=2880 if=/dev/sdb of=disk.img
```
Format an 720k DD disk:
```
paru -S ufiformat
sudo ufiformat -f 1440 -v /dev/sdd
```
