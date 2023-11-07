Add the following line to the Grub boot config
```
rd.break enforcing=0
```
Mount the root volume
```
mount -o rw,remount /sysroot
```
Chroot into system
```
chroot /sysroot
```
Reset the root password
```
passwd root
```
Set the SELinux context on next boot
```
touch  /.autorelabel
```
exit from chroot and reboot
