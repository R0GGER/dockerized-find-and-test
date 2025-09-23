FROM php:apache
USER root

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
