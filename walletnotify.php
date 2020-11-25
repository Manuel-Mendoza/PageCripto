<?php
$host_url = $_SERVER['HTTP_HOST'];

require_once("inc/config.php");


if (
    isset($_POST["txid"]) &&
    !empty($_POST["txid"])
) {
    $txid = $_POST["txid"];

    $rpc = RpcLoad();
    $info_txid = $rpc->gettransaction($txid);
    if ($info_txid["confirmations"] == 0) {
        if (isset($info_txid["details"]) && !empty($info_txid["details"])) {
            $info_txid_detalles = $info_txid["details"];

            foreach ($info_txid_detalles as $value_txid) {
                if ($value_txid["category"] == "receive") {
                    $wallet = $value_txid["address"];
                    $buscar_id = mysqli_query($db, "SELECT * FROM `wallets` WHERE `wallet` = '$wallet'");
                    if (mysqli_num_rows($buscar_id) > 0) {
                        $dato_wallet = mysqli_fetch_array($buscar_id);
                        $user_id = $dato_wallet["user_id"];
                        $all_data = getAllDataUser($user_id);

                        $monto_Recibido = $all_data["balance"] + $value_txid["amount"];
                        ActualizarBalance($user_id, $monto_Recibido);
                        exit;
                    }
                }
            }
        }
    }
}
