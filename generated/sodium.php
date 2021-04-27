<?php

namespace Safe;

use Safe\Exceptions\SodiumException;

/**
 *
 *
 * @param string $ciphertext
 * @param string $additional_data
 * @param string $nonce
 * @param string $key
 * @return string
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_aes256gcm_decrypt(string $ciphertext, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $result = \sodium_crypto_aead_aes256gcm_decrypt($ciphertext, $additional_data, $nonce, $key);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $ciphertext
 * @param string $additional_data
 * @param string $nonce
 * @param string $key
 * @return string
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_chacha20poly1305_decrypt(string $ciphertext, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $result = \sodium_crypto_aead_chacha20poly1305_decrypt($ciphertext, $additional_data, $nonce, $key);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $ciphertext
 * @param string $additional_data
 * @param string $nonce
 * @param string $key
 * @return string
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_chacha20poly1305_ietf_decrypt(string $ciphertext, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $result = \sodium_crypto_aead_chacha20poly1305_ietf_decrypt($ciphertext, $additional_data, $nonce, $key);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $ciphertext
 * @param string $additional_data
 * @param string $nonce
 * @param string $key
 * @return string
 * @throws SodiumException
 *
 */
function sodium_crypto_aead_xchacha20poly1305_ietf_decrypt(string $ciphertext, string $additional_data, string $nonce, string $key): string
{
    error_clear_last();
    $result = \sodium_crypto_aead_xchacha20poly1305_ietf_decrypt($ciphertext, $additional_data, $nonce, $key);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $ciphertext
 * @param string $nonce
 * @param string $key_pair
 * @return string
 * @throws SodiumException
 *
 */
function sodium_crypto_box_open(string $ciphertext, string $nonce, string $key_pair): string
{
    error_clear_last();
    $result = \sodium_crypto_box_open($ciphertext, $nonce, $key_pair);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $ciphertext
 * @param string $key_pair
 * @return string
 * @throws SodiumException
 *
 */
function sodium_crypto_box_seal_open(string $ciphertext, string $key_pair): string
{
    error_clear_last();
    $result = \sodium_crypto_box_seal_open($ciphertext, $key_pair);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $ciphertext
 * @param string $nonce
 * @param string $key
 * @return string
 * @throws SodiumException
 *
 */
function sodium_crypto_secretbox_open(string $ciphertext, string $nonce, string $key): string
{
    error_clear_last();
    $result = \sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $state
 * @param string $ciphertext
 * @param string $additional_data
 * @return array
 * @throws SodiumException
 *
 */
function sodium_crypto_secretstream_xchacha20poly1305_pull(string &$state, string $ciphertext, string $additional_data = ""): array
{
    error_clear_last();
    $result = \sodium_crypto_secretstream_xchacha20poly1305_pull($state, $ciphertext, $additional_data);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $ciphertext
 * @param string $public_key
 * @return string
 * @throws SodiumException
 *
 */
function sodium_crypto_sign_open(string $ciphertext, string $public_key): string
{
    error_clear_last();
    $result = \sodium_crypto_sign_open($ciphertext, $public_key);
    if ($result === false) {
        throw SodiumException::createFromPhpError();
    }
    return $result;
}
