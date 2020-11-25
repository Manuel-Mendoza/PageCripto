<?php

require("inc/JsonRpc.php");

define("RPC_USER", "rpc_user");
define("RPC_PASSWORD", "8cde5e64e7297b1cb4c495d1a");
define("RPC_HOST", "3.15.169.15");
define("RPC_PORT", "36600");

function RpcLoad()
{
    $rpc = new jsonRPCClient('http://' . RPC_USER . ':' . RPC_PASSWORD . '@' . RPC_HOST . ':' . RPC_PORT . '/');
    return $rpc;
}

#Modo de invocacion global
#$rpc = RpcLoad();
