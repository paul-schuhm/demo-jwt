<?php

/**
 * Fonction utiles pour implémenter le protocole JWT Token
 */

/**
 * Retourne un JWT Token (RFC7519) signé par un secret
 */
function create_signed_jwt_token(array $header, array $payload, string $secret): string
{

    $encodedHeader = encodeBase64Url(json_encode($header));
    $encodedPayload = encodeBase64Url(json_encode($payload));

    //Signature créee à partir header, payload et d'un secret.
    $signature = create_signature($encodedHeader, $encodedPayload, SECRET);

    return sprintf(
        "%s.%s.%s",
        $encodedHeader,
        $encodedPayload,
        $signature
    );
}


/**
 * Retourne la signature d'un JWT Token
 * @param string $encodedHeader. Header du JWT, encodé en base 64
 * @param string $encodedPayload. Header du JWT, encodé en base 64
 * @param string $secret. Secret privé, conservé sur le serveur
 */
function create_signature(string $encodedHeader, string $encodedPayload, string $secret): string
{
    return hash_hmac('sha256', sprintf("%s%s", $encodedHeader, $encodedPayload), $secret);
}

/**
 * Encode une chaine de caractère en base 64 URL
 * @param string $data La chaîne à encoder
 * @return string La chaine encodée
 */
function encodeBase64Url(string $data): string
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

/**
 * Decode une chaine de caractère encodée en base 64 URL
 * @param string $data La chaîne encodée
 * @return string La chaine décodée
 */
function decodeBase64Url(string $data): string
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}
