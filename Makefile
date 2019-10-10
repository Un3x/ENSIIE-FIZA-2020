start:
	php -S localhost:8081 -t public/

db.init:
	createdb iinstagrame
	psql -U iinstagrame -f ./data/db.sql iinstagrame

db.reset: db.drop db.init

db.drop:
	dropdb iinstagrame