

Copy .env.example and rename to .env

Create database in mysql or other database and don't forget include TMDB_TOKEN

my example .env file

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=yourDbName

DB_USERNAME=root

DB_PASSWORD=

TMDB_TOKEN=eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwMmIzZjQwNmU0ZWJkNzQ1MzBkN2JlY2ViZDFjYWFlZiIsInN1YiI6IjYwNTRiZjk2NDJmMTlmMDA1MjM2OTI2ZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.0ApbkS0vPnYokNE0FPFUUfac85WcO5Y-gFT0ZCFG42g

L5_SWAGGER_GENERATE_ALWAYS=true
SWAGGER_VERSION=2.0
L5_SWAGGER_CONST_HOST=http://127.0.0.1:8000

After creating db, in terminal run this commands

For creating tables: $ php artisan migrate

Seeding data: $ php artisan db:seed

Run server: $ php artisan ser

127.0.0.1:8000/api/documentation
