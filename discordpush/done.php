<?php

$req = new rXMLRPCRequest([
    rTorrentSettings::get()->getOnInsertCommand(['tdiscord'.getUser(), getCmd('cat=')]),
    rTorrentSettings::get()->getOnFinishedCommand(['tdiscord'.getUser(), getCmd('cat=')]),
    rTorrentSettings::get()->getOnEraseCommand(['tdiscord'.getUser(), getCmd('cat=')]),
]);
$req->run();
