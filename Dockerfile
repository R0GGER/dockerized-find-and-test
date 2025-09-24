FROM php:apache
USER root

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    iperf3 \
    jq \
    curl \
    bc \
    sudo \
    dnsutils \
    grep \
    --no-install-recommends && \
    rm -rf /var/lib/apt/lists/*

COPY findtest.sh /usr/local/bin/findtest.sh
RUN chmod +x /usr/local/bin/findtest.sh
WORKDIR /var/www/html
COPY index.php .
EXPOSE 80

# CMD ["/usr/local/bin/findtest.sh"]

# The CMD instruction sets the default command to execute when running a container from this image.
# - Uncomment the line above to automatically run the iPerf3 test script (`findtest.sh`) when you start the container.
#   This is useful for direct command-line execution with results in the terminal 
#   Command: `docker compose build && docker run -it --rm --name=dockerize-find-test dockerize-find-test`

# - Keep it commented out to start the Apache web server, allowing you to run the test from the web interface.
#   This is the default behavior when using `docker compose up --build -d`.

