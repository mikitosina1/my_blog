.PHONY: setup start composer npm-install npm-dev npm-build clear-cache migrate serve clean
setup: start composer migrate npm-install npm-build

start: ## Starts ddev
	ddev start
	ddev auth ssh

composer: ## Install composer
	ddev exec composer install

npm-install: ## Install npm
	ddev exec npm install

npm-dev: ## Runs build for dev
	ddev exec npm run dev

npm-build: ## Runs build to prod
	ddev exec npm run build

clear-cache:
	ddev exec php artisan cache:clear
	ddev exec php artisan config:clear
	ddev exec php artisan route:clear
	ddev exec php artisan view:clear

migrate:
	ddev exec php artisan migrate

serve: ## Start local server
	ddev exec php artisan serve

clean: ## remove cache and local dependencies
	ddev exec rm -rf node_modules vendor
	ddev exec php artisan cache:clear
	ddev exec php artisan config:clear
	ddev exec php artisan route:clear
	ddev exec php artisan view:clear
