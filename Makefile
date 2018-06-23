-include ./tests/docker/.env

WPDIR=WP_INSTALL_DIR=${WP_INSTALL_DIR}
WPVER=WP_VERSION=${WP_VERSION}
WPTEST=WP_TESTS_DIR=${WP_TESTS_DIR}
WPPLUGIN=WP_PLUGIN_FILE=${WP_PLUGIN_FILE}
PHPUNITARGS=PHPUNIT_ARGS="${PHPUNIT_ARGS}"
WPENV=${WPDIR} ${WPVER} ${WPTEST} ${WPPLUGIN} ${PHPUNITARGS}

usage:
	@echo hello

test:
	echo "Updating WordPress Test Suite..."
	# svn co https://develop.svn.wordpress.org/tags/${WP_VERSION}/tests/phpunit/includes/ ./tests/includes --trust-server-cert --non-interactive -q
	# svn co https://develop.svn.wordpress.org/tags/${WP_VERSION}/tests/phpunit/data/ ./tests/data --trust-server-cert --non-interactive -q
	@${WPENV} docker-compose -f tests/docker/docker-compose.yml up -d tests-mysql
	@${WPENV} docker-compose -f tests/docker/docker-compose.yml up tests-php
	# @${WPENV} docker-compose -f tests/docker/docker-compose.yml run --rm tests-php sh

	# @${WPENV} docker-compose -f tests/docker/docker-compose.yml run --rm tests-php sh
	@${WPENV} docker-compose -f tests/docker/docker-compose.yml down