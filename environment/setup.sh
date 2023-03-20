#!/bin/bash
 
sudo yum-config-manager --save --setopt=hashicorp.skip_if_unavailable=true
 
# PHP 7.2 を削除
sudo yum -y remove php*
 
# lamp-mariadb10.2-php7.2 を無効化
sudo amazon-linux-extras  disable lamp-mariadb10.2-php7.2
 
# 利用するphpのバージョンを7.4に切り替え
sudo amazon-linux-extras disable php7.2
sudo amazon-linux-extras install -y php7.4
sudo yum clean metadata && sudo yum -y install php-mbstring php-devel php-xml php-gd php-intl php-opcache php-xmlrpc
 
# タイムゾーンの設定
sudo timedatectl set-timezone Asia/Tokyo
# ロケールの設定
sudo localectl set-locale LANG=ja_JP.utf8
 
# PHPの設定ファイルを追加
sudo echo "date.timezone = Asia/Tokyo" |sudo tee /etc/php.d/999-php-codecamp.ini
sudo echo "display_errors = On" |sudo tee -a /etc/php.d/999-php-codecamp.ini
sudo echo "mbstring.internal_encoding = UTF-8" |sudo tee -a /etc/php.d/999-php-codecamp.ini
 
# xdebug の指定をコメントアウト
sudo sed -i -e "s/^zend_extension=/;zend_extension=/" /etc/php.d/30-xdebug.ini
 
# MariaDB をインストール
sudo amazon-linux-extras install -y  mariadb10.5
 
# mariadb を起動
sudo systemctl start mariadb
# 自動起動設定
sudo systemctl enable mariadb
 
# rootユーザーのパスワード変更
echo "grant all privileges on *.* to root@localhost identified by 'secret' with grant option;" > ~/environment/setup.sql
echo "flush privileges;" >> ~/environment/setup.sql
 
# phpmyadmin のインストール
wget https://files.phpmyadmin.net/phpMyAdmin/5.2.0/phpMyAdmin-5.2.0-all-languages.zip
unzip ~/environment/phpMyAdmin-5.2.0-all-languages.zip
mv ~/environment/phpMyAdmin-5.2.0-all-languages ~/environment/phpmyadmin
rm ~/environment/phpMyAdmin-5.2.0-all-languages.zip
 
cp ~/environment/phpmyadmin/config.sample.inc.php ~/environment/phpmyadmin/config.inc.php
sed -i -e "s/^\$cfg\['blowfish_secret'\] = '';/\$cfg\['blowfish_secret'\] = 'pasfdoiajepasfdoiajepasfdoiajemq';/" ~/environment/phpmyadmin/config.inc.php