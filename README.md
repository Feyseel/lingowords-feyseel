# Lingowords by Feyseel

## 1.Populate the database with validated words

`curl --location  http://lingo.com/read-file`

## 2. Get all words without specific lengths.

`curl --location http://lingo.com/api/words`

## 3. Get words with specific lengths. Length can be 5, 6, 7.

`curl --location http://lingo.com/api/words/{length}`


## 4.Get a random word.

`curl --location http://lingo.com/api/randomWord`

## 5.Get a random word with a specific lenth.

`curl --location http://lingo.com/api/randomWord/{length}`


### Installation

Clone repository.

run 'composer update'

copy .env.example to .env
run 'php artisan key:generate'

Create database and populate database credentials in .env file.
Populate the database by following step 1

