#включть контейнеры в текущем каталоге (из фаила docker-compose.yml)
docker-up:
	sudo docker-compose up -d

#собрать/пересобрать контейнеры в текущем каталоге (из фаила docker-compose.yml)
docker-build:
	sudo docker-compose up --build -d

#остановить контейнеры в текущем каталоге (из фаила docker-compose.yml)
docker-down:
	sudo docker-compose down

#запустить тестовые тесты laravel
laravel-test:
	sudo docker-compose exec php-f vendor/bin/phpunit

#список всех контейнеров
docker-containers-list:
	sudo docker ps -a

#выключить все контейнеры, абсолютно все
docker-all-stop:
	sudo docker stop $$(sudo docker ps -a -q)

#удалить все контейнеры, абсолютно все
docker-all-destroy:
	sudo docker rm $$(sudo docker ps -a -q)

#накачать пакеты из ноды
node-install:
	sudo docker exec node npm install

#собрать пакеты под js и css без уменьшения
node-dev:
	sudo docker exec node yarn run dev

#собрать пакеты под js и css с уменьшением
node-production:
	sudo docker exec node yarn run production
node-watch:
	sudo docker exec node yarn run watch
#изменить права на каталоги
perm:
	
	sudo docker exec php-f chmod -R 777 storage
	sudo docker exec php-f chmod -R 777 bootstrap
	sudo chmod -R 777 app

#версия laravel
laravel-version:
	sudo docker exec php-f php -v
	sudo docker exec php-f php artisan -V

#laravel ссылка на папку storage
laravel-storage-link:
	sudo docker exec php-f php artisan storage:link

#laravel создать контролер, в controllerName передаётся имя контролера (можно с / для создания каталога)
laravel-controller:
	sudo docker exec php-f php artisan make:controller $(controllerName)

laravel-model:
	sudo docker exec php-f php artisan make:model $(modelName) $(param)

laravel-request:
	sudo docker exec php-f php artisan make:request $(requestName)

laravel-migration:
	sudo docker exec php-f php artisan make:migration $(name) --$(action)=$(table)

laravel-migrate:
	sudo docker exec php-f php artisan migrate

laravel-migrate-rollback:
	sudo docker exec php-f php artisan migrate:rollback

composer-update:
	sudo docker exec php-f composer update

#testtest