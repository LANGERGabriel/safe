<?php

namespace Safe;

use Safe\Exceptions\Bzip2Exception;

/**
 * Closes the given bzip2 file pointer.
 *
 * @param resource $bz The file pointer. It must be valid and must point to a file
 * successfully opened by bzopen.
 * @throws Bzip2Exception
 *
 */
function bzclose($bz): void
{
    error_clear_last();
    $result = \bzclose($bz);
    if ($result === false) {
        throw Bzip2Exception::createFromPhpError();
    }
}


/**
 * This function is supposed to force a write of all buffered bzip2 data for the file pointer
 * bz,
 * but is implemented as null function in libbz2, and as such does nothing.
 *
 * @param resource $bz The file pointer. It must be valid and must point to a file
 * successfully opened by bzopen.
 * @throws Bzip2Exception
 *
 */
function bzflush($bz): void
{
    error_clear_last();
    $result = \bzflush($bz);
    if ($result === false) {
        throw Bzip2Exception::createFromPhpError();
    }
}


/**
 * bzopen opens a bzip2 (.bz2) file for reading or
 * writing.
 *
 * @param string|resource $file The name of the file to open, or an existing stream resource.
 * @param string $mode The modes 'r' (read), and 'w' (write) are supported.
 * Everything else will cause bzopen to return FALSE.
 * @return resource If the open fails, bzopen returns FALSE, otherwise
 * it returns a pointer to the newly opened file.
 * @throws Bzip2Exception
 *
 */
function bzopen($file, string $mode)
{
    error_clear_last();
    $result = \bzopen($file, $mode);
    if ($result === false) {
        throw Bzip2Exception::createFromPhpError();
    }
    return $result;
}


/**
 * bzread reads from the given bzip2 file pointer.
 *
 * Reading stops when length (uncompressed) bytes have
 * been read or EOF is reached, whichever comes first.
 *
 * @param resource $bz The file pointer. It must be valid and must point to a file
 * successfully opened by bzopen.
 * @param int $length If not specified, bzread will read 1024
 * (uncompressed) bytes at a time. A maximum of 8192
 * uncompressed bytes will be read at a time.
 * @return string Returns the uncompressed data.
 * @throws Bzip2Exception
 *
 */
function bzread($bz, int $length = 1024): string
{
    error_clear_last();
    $result = \bzread($bz, $length);
    if ($result === false) {
        throw Bzip2Exception::createFromPhpError();
    }
    return $result;
}


/**
 * bzwrite writes a string into the given bzip2 file
 * stream.
 *
 * @param resource $bz The file pointer. It must be valid and must point to a file
 * successfully opened by bzopen.
 * @param string $data The written data.
 * @param int $length If supplied, writing will stop after length
 * (uncompressed) bytes have been written or the end of
 * data is reached, whichever comes first.
 * @return int Returns the number of bytes written.
 * @throws Bzip2Exception
 *
 */
function bzwrite($bz, string $data, int $length = null): int
{
    error_clear_last();
    if ($length !== null) {
        $result = \bzwrite($bz, $data, $length);
    } else {
        $result = \bzwrite($bz, $data);
    }
    if ($result === false) {
        throw Bzip2Exception::createFromPhpError();
    }
    return $result;
}
