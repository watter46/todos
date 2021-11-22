build:
				docker compose build --no-cache --force-rm
up:
				@make build
				docker compose up -d
laravel-install:
				docker compose exec app composer create-project --prefer-dist laravel/laravel .  "6.*"
create-project:
				mkdir -p backend
				@make env
				@make up
				@make laravel-install
				docker compose exec app php artisan key:generate
				docker compose exec app php artisan storage:link
				docker compose exec app chmod -R 777 storage bootstrap/cache
down:
				docker compose down
logs:
				docker compose logs
app:
				docker compose exec app bash
web:
				docker compose exec web bash
ps:
				docker ps -a --no-trunc
env:
				bash make_env.sh
destroy:
	docker compose down --rmi all --volumes --remove-orphans
