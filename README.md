# Handle an incoming call to your Sinch number using Laravel

This project will run a Laravel Server that can handle ICE Callbacks from the Sinch Platform @ POST `/api/incoming-call`

## Requirements

* [Docker](https://www.docker.com)
* [ngrok](http://ngrok.com)
* [WSL2](https://docs.microsoft.com/en-us/windows/wsl/) (for Windows Users)

## Instructions

In order to bootstrap the project, you first have to `git clone` it locally. Then `cd laravel-handle-incoming-call-sinch`. We're now going to install the project's dependencies using a PHP container with Composer preinstalled, therefore run:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

After installing the dependencies we can bootstrap the project using `vendor/bin/sail up`. This command will take a while when running it the first time. See the [Laravel Sail](https://laravel.com/docs/9.x/sail) for documentation for more.

## Run ngrok and set the Sinch App Callback URL

Using ngrok, `ngrok http 8081` set the [Sinch Callback URL](https://dashboard.sinch.com/voice/overview) to the generated ngrok URL `http:{ngrok-path}/api/incoming-call`.

## Congratulations

You can call your Sinch owned number that has been configured with your App. You will hear the message defined in `routes/api.php` file.
