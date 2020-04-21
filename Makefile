index.html: slides.php styles.css config.php template/presentation.js template/system.css template/template.php Makefile
	mkdir dist
	cd template;\
	BPT_BUILDING=true php ./template.php > ../dist/index.html
clean:
	rm -rf dist
.PHONY: install uninstall
