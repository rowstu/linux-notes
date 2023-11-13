# Add VNCServer to Kali

Add to crontab
```
@reboot USER=pat /usr/bin/vncserver :1
```

Add to `/home/$USER/.vnc/xstartup`
```
unset SESSION_MANAGER
unset DBUS_SESSION_BUS_ADDRESS
startxfce4 &
```

Install this for clipboard
```
sudo apt-get install autocutsel
```
Add to `/home/$USER/.vnc/xstartup`
```
export XKL_XMODMAP_DISABLE=1
autocutsel -fork
```
Kill existing vnc sessions and restart
```
vncserver -kill :1 && vncserver :1
```
