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

FROM centos:7
# Inspiration: https://alexpearce.me/2014/10/setting-up-flask-with-apache-and-shibboleth/

COPY shibboleth_centos7.repo /etc/yum.repos.d/shibboleth_centos7.repo
RUN yum install -y shibboleth

# Copy config files and set environment
COPY shibboleth2.xml /etc/shibboleth/shibboleth2.xml
COPY test-fed.arnes.si.crt /etc/shibboleth/test-fed.arnes.si.crt
COPY arnesaai-metadata-signing.crt /etc/shibboleth/arnesaai-metadata-signing.crt
COPY sp-cert.pem /etc/shibboleth/sp-cert.pem
COPY sp-key.pem /etc/shibboleth/sp-key.pem
COPY attribute-map.xml /etc/shibboleth/attribute-map.xml
COPY attribute-policy.xml /etc/shibboleth/attribute-policy.xml
# Set environment for shibboleth
ENV LD_LIBRARY_PATH /opt/shibboleth/lib64:$LD_LIBRARY_PATH

EXPOSE 12345

CMD ["/usr/sbin/shibd", "-F", "-c", "/etc/shibboleth/shibboleth2.xml"]
