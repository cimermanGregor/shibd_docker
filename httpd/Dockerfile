# shibd_docker
# Copyright (C) 2017 Gregor Cimerman
# 
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
# 
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# 
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

FROM shibd

RUN yum install -y httpd mod_ssl mod_shib mod_php
RUN sed -i '/TCPListener/c\<TCPListener clientAddress="172.17.0.1" clientPort="12345"/>' /etc/shibboleth/shibboleth2.xml

#COPY test.arnes.si.conf /etc/httpd/conf.d/test.arnes.si.conf
RUN mkdir /var/www/html/secure
COPY www/index.html /var/www/html/
COPY www/info.php /var/www/html/
COPY www/secure/index.php /var/www/html/secure/
COPY vhost.conf /etc/httpd/conf.d/vhost.conf

EXPOSE 80 443
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
