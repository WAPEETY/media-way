# media-way
A simple client server application to manage reservations about short range frequencies for microphones or wireless cameras in big events brought by TV broadcasters

# HOW TO MAKE IT RUN

1. If you want to use the domains you need a GNU/linux machine, it works by editing /etc/hosts
   just add this below your config **DO NOT DELETE THE OTHER LINES**, otherwise see the IPs in the docker-compose.yaml
```
172.16.1.5 api.mediaway.com
172.16.3.10 mediaway.com
```

2. Install **docker** and **docker-compose**

3. Move to the cluster folder and type
```
docker-compose up
```

4. Install yarn

5. move to media-admin folder and type

```
yarn install
yarn start
```
