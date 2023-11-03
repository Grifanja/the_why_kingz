# Docker required to deploy test environment

Download the repository

https://github.com/Grifanja/the_why_kingz

---
# Run these commands in root app folder to start app

docker-compose -f ./docker/docker-compose.yml up -d

docker-compose -f ./docker/docker-compose.yml exec -u www-data php-fpm bash

php artisan migrate --seed

npm install vue@next

npm run build

---



# Endpoints will be available

GET http://localhost:888/api/posts/

GET http://localhost:888/api/posts/2

PUT http://localhost:888/api/posts/212 
Body { "active": 0 }


---

# Work links

http://localhost:888 - List of news

http://localhost:888/news/4 - specific news

---
