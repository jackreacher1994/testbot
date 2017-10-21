<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\ApiAi;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->fallback(function($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Sorry, I did not understand these commands.');
});
$botman->hears('Hello, I\'m {name}', function ($bot, $name) {
    $bot->reply('Hello '.$name.', nice to meet you!');
});
$botman->hears('Tell me a joke', BotManController::class.'@tellJoke');