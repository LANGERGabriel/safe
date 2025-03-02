<?php

namespace Safe;

use Safe\Exceptions\HashException;

/**
 *
 *
 * @param string $algo Name of selected hashing algorithm (i.e. "md5", "sha256", "haval160,4", etc..). For a list of supported algorithms see hash_algos.
 * @param string $filename URL describing location of file to be hashed; Supports fopen wrappers.
 * @param bool $binary When set to TRUE, outputs raw binary data.
 * FALSE outputs lowercase hexits.
 * @return string Returns a string containing the calculated message digest as lowercase hexits
 * unless binary is set to true in which case the raw
 * binary representation of the message digest is returned.
 * @throws HashException
 *
 */
function hash_file(string $algo, string $filename, bool $binary = false): string
{
    error_clear_last();
    $result = \hash_file($algo, $filename, $binary);
    if ($result === false) {
        throw HashException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $algo Name of selected hashing algorithm (i.e. "sha256", "sha512", "haval160,4", etc..)
 * See hash_algos for a list of supported algorithms.
 *
 *
 * Non-cryptographic hash functions are not allowed.
 *
 *
 *
 * Non-cryptographic hash functions are not allowed.
 * @param string $key Input keying material (raw binary). Cannot be empty.
 * @param int $length Desired output length in bytes.
 * Cannot be greater than 255 times the chosen hash function size.
 *
 * If length is 0, the output length
 * will default to the chosen hash function size.
 * @param string $info Application/context-specific info string.
 * @param string $salt Salt to use during derivation.
 *
 * While optional, adding random salt significantly improves the strength of HKDF.
 * @return string Returns a string containing a raw binary representation of the derived key
 * (also known as output keying material - OKM);.
 * @throws HashException
 *
 */
function hash_hkdf(string $algo, string $key, int $length = 0, string $info = "", string $salt = ""): string
{
    error_clear_last();
    $result = \hash_hkdf($algo, $key, $length, $info, $salt);
    if ($result === false) {
        throw HashException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $algo Name of selected hashing algorithm (i.e. "md5", "sha256", "haval160,4", etc..) See hash_hmac_algos for a list of supported algorithms.
 * @param string $data URL describing location of file to be hashed; Supports fopen wrappers.
 * @param string $key Shared secret key used for generating the HMAC variant of the message digest.
 * @param bool $binary When set to TRUE, outputs raw binary data.
 * FALSE outputs lowercase hexits.
 * @return string Returns a string containing the calculated message digest as lowercase hexits
 * unless binary is set to true in which case the raw
 * binary representation of the message digest is returned.
 * Returns FALSE when algo is unknown or is a
 * non-cryptographic hash function, or if the file
 * data cannot be read.
 * @throws HashException
 *
 */
function hash_hmac_file(string $algo, string $data, string $key, bool $binary = false): string
{
    error_clear_last();
    $result = \hash_hmac_file($algo, $data, $key, $binary);
    if ($result === false) {
        throw HashException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $algo Name of selected hashing algorithm (i.e. "md5", "sha256", "haval160,4", etc..) See hash_hmac_algos for a list of supported algorithms.
 * @param string $data Message to be hashed.
 * @param string $key Shared secret key used for generating the HMAC variant of the message digest.
 * @param bool $binary When set to TRUE, outputs raw binary data.
 * FALSE outputs lowercase hexits.
 * @return string Returns a string containing the calculated message digest as lowercase hexits
 * unless binary is set to true in which case the raw
 * binary representation of the message digest is returned.
 * Returns FALSE when algo is unknown or is a
 * non-cryptographic hash function.
 * @throws HashException
 *
 */
function hash_hmac(string $algo, string $data, string $key, bool $binary = false): string
{
    error_clear_last();
    $result = \hash_hmac($algo, $data, $key, $binary);
    if ($result === false) {
        throw HashException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param \HashContext $context Hashing context returned by hash_init.
 * @param string $filename URL describing location of file to be hashed; Supports fopen wrappers.
 * @param \HashContext|null $stream_context Stream context as returned by stream_context_create.
 * @throws HashException
 *
 */
function hash_update_file(\HashContext $context, string $filename, ?\HashContext $stream_context = null): void
{
    error_clear_last();
    if ($stream_context !== null) {
        $result = \hash_update_file($context, $filename, $stream_context);
    } else {
        $result = \hash_update_file($context, $filename);
    }
    if ($result === false) {
        throw HashException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $algo Name of selected hashing algorithm (i.e. "md5", "sha256", "haval160,4", etc..). For a list of supported algorithms see hash_algos.
 * @param string $data Message to be hashed.
 * @param bool $binary When set to TRUE, outputs raw binary data.
 * FALSE outputs lowercase hexits.
 * @return string Returns a string containing the calculated message digest as lowercase hexits
 * unless binary is set to true in which case the raw
 * binary representation of the message digest is returned.
 * @throws HashException
 *
 */
function hash(string $algo, string $data, bool $binary = false): string
{
    error_clear_last();
    $result = \hash($algo, $data, $binary);
    if ($result === false) {
        throw HashException::createFromPhpError();
    }
    return $result;
}
