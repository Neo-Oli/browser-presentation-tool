index.html: slides.php styles.css config.php template/presentation.js template/system.css template/template.php Makefile
	cd template;\
	BPT_BUILDING=true php ./template.php > ../index.html
clean:
	rm -f index.html

example: example.html

example.html: index.html
	cp "$<" "$@"
.PHONY: install uninstall exmaple
