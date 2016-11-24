<?php
/*
xaseco2-discord v0.1 by bcoia

https://github.com/bcoia/xaseco2-discord
*/

Aseco::registerEvent('onMainLoop', 'discord_loop');
// Aseco::registerEvent('onStartup', 'discord_startup');
Aseco::registerEvent('onChat', 'discord_chat');
// Aseco::registerEvent('onNewChallenge', 'discord_start_race');
// Aseco::registerEvent('onEndRace', 'discord_end_race');
// Aseco::registerEvent('onPlayerConnect', 'discord_player_join');
// Aseco::registerEvent('onPlayerDisconnect', 'discord_player_leave');
// Aseco::addChatCommand('discordinfo', 'Get Discord information');

include __DIR__.'/vendor/autoload.php';

use Discord\Discord;

function discord_loop($aseco) {
    global $discord, $aseco;

    if (!ISSET($discord)){init_discord();}
}

function discord_chat($aseco, $chat) {
    global $discord, $channel, $aseco;

    $player_uid = $chat[0];
    $player_login = $chat[1];
    $message = $chat[2];
    $is_command = $chat[3];

    if (!$is_commmand and $channel) {
        $channel->sendMessage('{$player_login}: {$message}');
    }
}

function init_discord() {
    global $discord, $DISCORD_CONFIG, $channel, $aseco;

    $aseco->console_text(date('[m/d,H:i:s]').' ** Connecting to Discord... **');
    $discord = new Discord(['token' => $DISCORD_CONFIG['token']]);
    $discord->on('ready', function ($discord) {
        $aseco->console_text(date('[m/d,H:i:s]').' ** Connected to Discord! **');

        // Listen for messages
        $discord->on('message', function($message, $discord) {
            $aseco->console_text('{$message->author->username}: {$message->content}');
        });

        $guild = $discord->guilds->get('name', $DISCORD_CONFIG['guild']);
        $channel = $guild->channels->get('name', $DISCORD_CONFIG['channel']);
    });

    $discord->run();

    return $discord;
}

function player_count() {
    global $aseco;

    $players = 0;
    foreach ($aseco->server->players->player_list as $player) {
        if (!$player->isspectator) {
            $players++;
        }
    }

    return $players;
}

?>
