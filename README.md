# iPERF3 SERVER LIST - DOCKERIZED FIND & TEST 

This project packages the `findtest.sh` script into a Docker container, providing a simple web interface to find and test public iPerf3 servers. Screenshots: [1](https://raw.githubusercontent.com/R0GGER/dockerized-find-and-test/refs/heads/main/screenshots/screenshot_1.png) [2](https://raw.githubusercontent.com/R0GGER/dockerized-find-and-test/refs/heads/main/screenshots/screenshot_2.png)

It is based on the `findtest.sh` script from [R0GGER/public-iperf3-servers](https://github.com/R0GGER/public-iperf3-servers/blob/main/findtest.sh).

### Prerequisites
- [Docker](https://www.docker.com/get-started) must be installed and running.
  
  ```bash
  bash <(wget -qO- https://get.docker.com)
  ```

## How to Run
1.  **Clone the repository:**
    ```bash
    git clone https://github.com/R0GGER/dockerized-find-and-test.git
    cd dockerized-find-and-test
    ```
    
2.  **Build and start the container:**
    ```bash
    docker compose up --build -d
    ```

3.  **Open the application:**
    Navigate to [http://localhost:8080](http://localhost:8080) in your web browser.

## Stop and remove
To stop and remove the container, run:
```bash
docker compose down
```




