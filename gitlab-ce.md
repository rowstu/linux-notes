# Install on RHEL9
### Commands
```
dnf update -y 
dnf -y install curl vim policycoreutils python3-policycoreutils git
cat <<EOF > /etc/yum.repos.d/gitlab_gitlab-ce.repo
[gitlab_gitlab-ce]
name=gitlab_gitlab-ce
baseurl=https://packages.gitlab.com/gitlab/gitlab-ce/el/9/$basearch
repo_gpgcheck=1
gpgcheck=1
enabled=1
gpgkey=https://packages.gitlab.com/gitlab/gitlab-ce/gpgkey
       https://packages.gitlab.com/gitlab/gitlab-ce/gpgkey/gitlab-gitlab-ce-3D645A26AB9FBD22.pub.gpg
sslverify=1
sslcacert=/etc/pki/tls/certs/ca-bundle.crt
metadata_expire=300
EOF
dnf install gitlab-ce -y
firewall-cmd --permanent --zone=public --add-service=http
firewall-cmd --permanent --zone=public --add-service=https
firewall-cmd --reload
cat /etc/gitlab/initial_root_password
```
### Updates
edit `/etc/gitlab/gitlab.rb` with specific settings

### Useful Commands
```
gitlab-ctl reconfigure
gitlab-ctl status
gitlab-ctl stop
gitlab-ctl start
```
