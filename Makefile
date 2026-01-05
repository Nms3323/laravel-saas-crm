# Quick targets for local development
.PHONY: install migrate seed serve demo docker-up test analyse psalm

install:
	composer install

migrate:
	php artisan migrate

seed:
	php artisan db:seed

serve:
	php artisan serve --host=0.0.0.0 --port=8000

demo: install migrate seed serve

docker-up:
	docker-compose up -d --build

test:
	vendor/bin/phpunit

analyse:
	vendor/bin/phpstan analyse

psalm:
	vendor/bin/psalm

# Static analysis baseline targets
baseline-phpstan:
	vendor/bin/phpstan analyse --generate-baseline=phpstan-baseline.neon --memory-limit=1G || true

baseline-psalm:
	vendor/bin/psalm --set-baseline=psalm-baseline.xml || true

# Attempt auto-fixes (Psalm, PHP-CS-Fixer, Rector)
fix-static:
	vendor/bin/psalm --alter --issues=UndefinedClass,UndefinedMethod,PossiblyUndefinedMethod || true
	vendor/bin/php-cs-fixer fix --allow-risky=yes || true
	vendor/bin/rector process --dry-run || true
