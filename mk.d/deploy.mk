SHELL := /bin/sh

API_URL ?= https://api.github.com
UPLOAD_URL ?= https://uploads.github.com

ifndef VERSION_TAG
$(error VERSION_TAG is not set)
endif

.PHONY: deploy/package
deploy/package:
	@mkdir -p build/
	@tar -cvzf "build/plugin-SelfEsteem-${VERSION_TAG}.tar.gz" \
		javascripts plugin.json README.md SelfEsteem.php SystemSettings.php \
		--transform 's@^@plugin-SelfEsteem-${VERSION_TAG}/@g'

.PHONY: deploy/release
deploy/release: deploy/package
	@test -n "${REPO_SLUG}"
	@test -n "${GH_TOKEN}"
	@test -n "${GH_USER}"
	@curl -X POST -u "${GH_USER}:${GH_TOKEN}" \
		"${API_URL}/repos/${REPO_SLUG}/releases" \
		-d "{\"tag_name\": \"${VERSION_TAG}\", \"name\": \"${VERSION_TAG}\"}" \
		> build/release-info.txt
	@curl -X POST -u "${GH_USER}:${GH_TOKEN}" \
		"${UPLOAD_URL}/repos/${REPO_SLUG}/releases/`cat build/release-info.txt | jq -r .id`/assets?name=plugin-SelfEsteem-${VERSION_TAG}.tar.gz" \
		--data-binary "@build/plugin-SelfEsteem-${VERSION_TAG}.tar.gz" \
		-H 'Content-Type: application/gzip'
