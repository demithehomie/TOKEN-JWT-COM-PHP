<?php 

//Criação de token JWT (que será usado em futuras aulas)

function base64UrlEncode($data){
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
}

$header = base64UrlEncode('{"alg": "HS256", "typ": "JWT"}');
$payload = base64UrlEncode('{"sub": "'.md5(time()).'", "name": "Demetrius Ferreira", "iat": '.time().'}');
$signature = base64UrlEncode(
    hash_hmac('sha256', $header.'.'.$payload, 'confirma', true)
);

echo $header.'.'.$payload.'.'.$signature;

?>