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
yum search gitlab-ce --showduplicates
gitlab-ctl reconfigure
gitlab-ctl status
gitlab-ctl stop
gitlab-ctl start
gitlab-rake gitlab:doctor:secrets
gitlab-rake gitlab:artifacts:check
gitlab-rake gitlab:check SANITIZE=true
gitlab-rake gitlab:lfs:check
gitlab-rake gitlab:uploads:check
```
# Migration
Commands to migrate from old server to new server
### Old Server
```
gitlab-ctl stop unicorn
gitlab-ctl stop sidekiq
gitlab-ctl stop puma
mkdir gitlab-migration
cp /etc/gitlab/gitlab.rb gitlab-migration
cp /etc/gitlab/gitlab-secrets.json gitlab-migration
cp -R /etc/gitlab/ssl gitlab-migration
gitlab-rake gitlab:backup:create
cp /var/opt/gitlab/backups/<backupreference>_gitlab_backup.tar gitlab-migration
```
Copy the backups from the old server to the new server
### New Server
```
cd gitlab-migration
cp -R ssl /etc/gitLab/
cp gitlab.rb /etc/gitlab/
cp gitlab-secrets.json /etc/gitlab
gitlab-ctl reconfigure
cp <backupreference>_gitlab_backup.tar /var/opt/gitlab/backups/
chown git:git /var/opt/gitlab/backups/<backupreference>_gitlab_backup.tar
gitlab-ctl stop unicorn
gitlab-ctl stop sidekiq
gitlab-rake gitlab:backup:restore BACKUP=<backupreference>
gitlab-ctl start
gitlab-rake gitlab:check SANITIZE=true
```
Test by setting the old URL to the new servers IP in local hosts file then migrate the real URL in DNS. Ensure things like Postfix and other services that are integrated on the old server are functioning on the new server.

