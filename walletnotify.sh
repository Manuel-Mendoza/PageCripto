#!/bin/sh
curl -d "txid=$1" https://test.loremdiv.com/walletnotify.php >/dev/null 2>&1