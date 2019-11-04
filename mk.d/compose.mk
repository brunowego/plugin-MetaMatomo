SHELL := /bin/sh

DOCKER ?= docker
DOCKER_COMPOSE := docker-compose

.DEFAULT_GOAL := compose/status

.PHONY: compose/init
compose/init: compose/nuke compose/up

.PHONY: compose/up
compose/up:
	@$(DOCKER) network create --subnet=${DOCKER_NETWORK_SUBNET} workbench || true
	@$(DOCKER) volume create --name=matomo-data || true
	@$(DOCKER_COMPOSE) up -d $(service)

.PHONY: compose/start
compose/start:
	@$(DOCKER_COMPOSE) start $(service)

.PHONY: compose/stop
compose/stop:
	@$(DOCKER_COMPOSE) stop $(service)

.PHONY: compose/restart
compose/restart:
	@$(DOCKER_COMPOSE) restart $(service)

.PHONY: compose/down
compose/down:
	@$(DOCKER_COMPOSE) down
	@$(DOCKER) volume rm matomo-data || true
	@$(DOCKER) network rm workbench || true

.PHONY: compose/kill
compose/kill:
	@$(DOCKER_COMPOSE) kill $(service)

.PHONY: compose/nuke
compose/nuke:
	@$(DOCKER_COMPOSE) rm --force --stop $(service)

.PHONY: compose/status
compose/status:
	@$(DOCKER_COMPOSE) ps $(service)
