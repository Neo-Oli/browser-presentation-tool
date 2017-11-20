SRC_FILES := $(wildcard *)
SRC_FILES := $(filter-out index.html, $(SRC_FILES))
index.html: $(SRC_FILES)
	php -d include_path=$(pwd) ./template/template.php > index.html
clean:
	rm -f index.html

.PHONY: install uninstall
