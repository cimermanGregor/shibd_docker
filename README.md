# AAI Shibboleth in docker container

Shibbolet SP in a container form factor.

For running one must run docker-compose command which builds and sets up two containers; Shibboleth and Apache web server. Containers are based on CentOS 7 OS and configuration is done for Slovenian NREN; [Arnes](https://aai.arnes.si).

## Run
1. Start docker containers
```
docker-compose up -d
```

2. Set example.com resolving to localhost to use application over https. SSL is mendatory. Example entry in /etc/hosts
```
127.0.0.1 example.com
```

3. Register new application with the federation. Obtaining metadata can be done by pointing browser to standard Shibboleth metadata URL: [https://example.com/Shibboleth.sso/Metadata](https://example.com/Shibboleth.sso/Metadata). Login can be issued only when the Service Provider is registerd to the federation or manually added to IdP. 

4. Test the application with following URLs:
- https://example.com/
- https://example.com/secure

## Change & update
Configure following files:
- httpd/vhost.conf
- shibd/shibboleth2.xml
- shibd/sp-cert.pem
- shibd/sp-key.pem

Note that some browsers can create https loop due to SSL certificate change on every "docker-compose up -d --build". In this case restart the browser.

These docker containers were tested on OS X where containers run in 172.17.01 network. If this differs from your environment update parameter clientAddress="172.17.0.1" in httpd/Dockerfile file.

## Disclaimer
Do not run this in production! This can only be used for demonstration or testing purposes.

## License 
GPLv3

