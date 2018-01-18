index.html: slides.php styles.css config.php template/presentation.js template/system.css template/template.php
	php -d include_path=$(pwd) ./template/template.php > index.html
clean:
	rm -f index.html

.PHONY: install uninstall
