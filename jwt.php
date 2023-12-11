<?php

/**
 * Fonction utiles pour implémenter le protocole JWT Token
 */

/**
 * Retourne un JWT Token (RFC7519)
 * @see https://www.rfc-editor.org/rfc/rfc7519
 */
function createSignedJWT(array $header, array $payload, string $secret): string
{

    $encodedHeader = encodeBase64Url(json_encode($header));
    $encodedPayload = encodeBase64Url(json_encode($payload));

    //Signature créée à partir header, payload et d'un secret.
    $signature = createSignature($encodedHeader, $encodedPayload, SECRET);

    return sprintf(
        "%s.%s.%s",
        $encodedHeader,
        $encodedPayload,
        $signature
    );
}


/**
 * Retourne la signature d'un JWT
 * @param string $encodedHeader. Header du JWT, encodé en base 64
 * @param string $encodedPayload. Header du JWT, encodé en base 64
 * @param string $secret. Secret privé, conservé sur le serveur
 */
function createSignature(string $encodedHeader, string $encodedPayload, string $secret): string
{
    return hash_hmac('sha256', sprintf("%s%s", $encodedHeader, $encodedPayload), $secret);
}

/**
 * Encode une chaîne de caractère en base 64 URL
 * @param string $data La chaîne à encoder
 * @return string La chaîne encodée
 */
function encodeBase64Url(string $data): string
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

/**
 * Decode une chaîne de caractère encodée en base 64 URL
 * @param string $data La chaîne encodée
 * @return string La chaîne décodée
 */
function decodeBase64Url(string $data): string
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}
