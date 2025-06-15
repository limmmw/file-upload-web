# File-upload-web

For uploading file on a local network, built by docker container. You still send your assets to the computer via whatsapp? NOOB. Use this program.

1. Installation:
   ```bash
   git clone https://github.com/limmmw/file-upload-web.git
   cd file-upload-web
   docker-compose up -d

2. If the web fails as uploading file, do this commands:
   ```bash
   docker-compose down -v
   sudo chown -R yourusername:www-data file-upload-web
   sudo chmod -R 755 file-upload-web
   docker-compose up -d

## ⚠️ WARNING
This web is very **Vulnerable** (RCE), do not hosting on public networks. This web just for local network usage **(For Safety)**.