# Perceptyx Test

## Installation Guide Ubuntu 16.04
###### Packages installation

Install docker service and Git package in Ubuntu 16.04 Host

```
$ sudo apt-get update
$ sudo apt-get install docker.io git
$ sudo service docker start
```

Clone the repository
```
$ git clone https://github.com/rembeita/perceptyx.git
```

Build image
```
$ cd perceptyx
$ sudo docker build -t perceptyx .
```

Run Image with port forwarding for the Nginx port. You will need to wait a few minutes until the database is populated.
```
$ sudo docker run -p 80:80 perceptyx
```



Access site with the browser


![Alt text](/perceptyx.png?raw=true "Optional Title")
