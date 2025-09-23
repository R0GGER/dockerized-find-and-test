# iPERF3 SERVER LIST - DOCKERIZED FIND & TEST 

This project packages the `findtest.sh` script into a Docker container, providing a simple web interface to find and test public iPerf3 servers.

It is based on the `findtest.sh` script from [R0GGER/public-iperf3-servers](https://github.com/R0GGER/public-iperf3-servers/blob/main/findtest.sh).

### Prerequisites
- [Docker](https://www.docker.com/get-started) must be installed and running.

### 1. Build and Start
To build the Docker image and start the container in detached mode, run:
```bash
docker compose up --build -d
```

### 2. Access the Application
Open your browser and navigate to `http://localhost:8080`.

### Stop and remove
To stop and remove the container, run:
```bash
docker compose down
```


