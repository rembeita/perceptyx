# Perceptyx Test

## Installation Guide Ubuntu 16.04
######Package installation

Install docker service and Git package in Ubuntu 16.04 Host

```
$ sudo apt-get update
$ sudo apt-get install docker.io git

```

Clone repository
```
$ git clone https://github.com/rembeita/perceptyx.git
```

Build image
```
$ cd perceptyx
$ sudo docker build -t perceptyx .
```

Run Image with port forwarding for the Nginx port
```
$ sudo docker run -p 80:80 perceptyx
```

Access site with the browser
