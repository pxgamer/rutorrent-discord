<?php

$path = dirname(realpath($argv[0]));
if (chdir($path)) {
    if (count($argv) > 13) {
        $_SERVER['REMOTE_USER'] = $argv[13];
    }
    require_once './discord.php';
    $discord = Discord::load();
    $action = intval($argv[1]);
    $actions = [
        1 => 'addition',
        2 => 'finish',
        3 => 'deletion',
    ];
    $tracker = '';
    $pos = strpos($argv[10], '#');
    if ($pos !== false) {
        $tracker = substr($argv[10], 0, $pos);
    }
    $data = [
        'action'=>$action,
        'name'=>$argv[2],
        'size'=>floatval($argv[3]),
        'downloaded'=>floatval($argv[4]),
        'uploaded'=>floatval($argv[5]),
        'ratio'=>floatval($argv[6]),
        'creation'=>intval($argv[7]),
        'added'=>intval($argv[8]),
        'finished'=>intval($argv[9]),
        'tracker'=>$tracker,
        'label'=>rawurldecode($argv[11]),
    ];
    if ($discord->log['discord_enabled'] && $discord->log['discord_'.$actions[$action]] && ! $argv[12]) {
        $discord->pushNotify($data);
    }
}
