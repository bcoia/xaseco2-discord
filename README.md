# xaseco2-discord
TrackMania 2 XAseco2 plugin for connecting Discord to server chat.

## Features
- Outputs ManiaPlanet chat into a Discord channel, and outputs Discord chat into ManiaPlanet chat
- [soon] Optionally posts when players join or leave the server
- [soon] Optionally posts leaderboards in Discord upon the end of a race

## Installation

1. Copy the `plugins` and `includes` directories into your XAseco2 base directory
2. Edit XAseco2's `plugins.xml` to include the following line:
```php
<plugin>plugin.discord.php</plugin>
```
3. Edit `includes/discord.settings.php` to set your [Discord bot token](https://discordapp.com/developers/applications/me) and channel
4. Restart XAseco2
