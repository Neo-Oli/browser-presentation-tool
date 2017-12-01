index.html: slides.html styles.css config.html template/presentation.js template/system.css template/template.php
	php -d include_path=$(pwd) ./template/template.php > index.html
clean:
	rm -f index.html

.PHONY: install uninstall
