# file-upload-web

for uploading file, builded with docker container
    ```bash
    git clone https://github.com/limmmw/file-upload-web.git
    cd file-upload-web
    docker-compose up -d

if the web fails uploading file, do this commands:
    ```bash
    docker-compose down -v
    sudo chown -R yourusername:www-data file-upload-web
    sudo chmod -R 755 file-upload-web
    docker-compose up -d