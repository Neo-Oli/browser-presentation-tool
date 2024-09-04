index.html: slides.php styles.css config.php template/presentation.js template/system.css template/template.php Makefile vendor/autoload.php
	mkdir -p dist
	cd template;\
	BPT_BUILDING=true php ./template.php > ../dist/index.html

vendor/autoload.php: composer.json composer.lock
	composer install
clean:
	rm -rf dist node_modules vendor

node_modules:
	pnpm install

lint: vendor/autoload.php node_modules
	pnpm eslint . --cache --color --fix
	pnpm stylelint --fix "**/*.{css,scss,sass}"
	PHP_CS_FIXER_IGNORE_ENV=1 $(PHP) vendor/bin/php-cs-fixer fix --show-progress=dots -vv
.PHONY: install uninstall lint
