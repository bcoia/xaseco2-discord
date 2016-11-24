<?php
/*
xaseco2-discord v0.1 by bcoia

https://github.com/bcoia/xaseco2-discord
*/

Aseco::registerEvent('onMainLoop', 'discord_loop');
Aseco::registerEvent('onStartup', 'discord_startup');
Aseco::registerEvent('onChat', 'discord_chat');
Aseco::registerEvent('onNewChallenge', 'discord_start_race');
Aseco::registerEvent('onEndRace', 'discord_end_race');
Aseco::registerEvent('onPlayerConnect', 'discord_player_join');
Aseco::registerEvent('onPlayerDisconnect', 'discord_player_leave');
Aseco::addChatCommand('discordinfo', 'Get Discord information');

?>
