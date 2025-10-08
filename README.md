# File-upload-web

A lightweight web app to upload files over local network, powered by Docker.  
Still sending assets via WhatsApp to your PC? **NOOB move.** Use this instead.

## 🚀 Features
- Upload files to your PC via browser on the same network
- Runs using Docker (Nginx + PHP)
- Files saved directly to your custom folder

## 🔧 Installation:
```bash
git clone https://github.com/limmmw/file-upload-web.git
cd file-upload-web
```
1. 📁 Create the Upload Directory:
   ```bash
   mkdir -p /home/yourusername/Server
   sudo chown -R yourusername:www-data /home/yourusername/Server
   sudo chmod -R 775 /home/yourusername/Server

Replace ``yourusername`` with your actual Linux username.

2. 🛠 Edit ``docker-compose.yml``
   ```bash
   nano docker-compose.yml

Change this line:
```bash
  web:
    image: nginx:latest
    ports:
      - "8080:80"
  volumes:
      - ./src:/var/www/html
      - /home/yourusername/Server:/var/www/html/uploads #Replace ``yourusername`` with your actual Linux username.
      - ./nginx.conf:/etc/nginx/conf.d/default.conf
```
And:
  ```bash
   php:
    build: .
    volumes:
      - ./src:/var/www/html
      - /home/yourusername/Server:/var/www/html/uploads #Replace ``yourusername`` with your actual Linux username.
```
Make sure the path /home/yourusername/Server matches what you created earlier.

3. ▶️ Start the App:
   ```bash
   docker-compose up -d

## 🛠️ Troubleshooting
If file uploads fail with a "Permission denied" error, run:
```bash
docker-compose down -v
sudo chown -R yourusername:www-data /home/yourusername/Server
sudo chmod -R 775 /home/yourusername/Server
sudo chmod -R 775 src/
sudo chown -R yourusername:www-data src/
docker-compose up -d
```
If still failing, try temporarily with full access:
```bash
sudo chmod -R 777 /home/yourusername/Server
```

## 📂 Uploaded File Location
Uploaded files are saved directly to:
```bash
/home/yourusername/Server
```
This allows you to access uploaded files without entering the project folder.

## 🌐 Accessing the Web Interface
```http://localhost:8080```


## ✅ Requirements
- Docker & Docker Compose
- Linux (tested on Ubuntu)


