<?php

namespace Safe;

use Safe\Exceptions\ShmopException;

/**
 * shmop_delete is used to delete a shared memory block.
 *
 * @param resource $shmop The shared memory block resource created by
 * shmop_open
 * @throws ShmopException
 *
 */
function shmop_delete($shmop): void
{
    error_clear_last();
    $result = \shmop_delete($shmop);
    if ($result === false) {
        throw ShmopException::createFromPhpError();
    }
}


/**
 * shmop_open can create or open a shared memory block.
 *
 * @param int $key System's id for the shared memory block.
 * Can be passed as a decimal or hex.
 * @param int $mode The flags that you can use:
 *
 *
 *
 * "a" for access (sets SHM_RDONLY for shmat)
 * use this flag when you need to open an existing shared memory
 * segment for read only
 *
 *
 *
 *
 * "c" for create (sets IPC_CREATE)
 * use this flag when you need to create a new shared memory segment
 * or if a segment with the same key exists, try to open it for read
 * and write
 *
 *
 *
 *
 * "w" for read &amp; write access
 * use this flag when you need to read and write to a shared memory
 * segment, use this flag in most cases.
 *
 *
 *
 *
 * "n" create a new memory segment (sets IPC_CREATE|IPC_EXCL)
 * use this flag when you want to create a new shared memory segment
 * but if one already exists with the same flag, fail. This is useful
 * for security purposes, using this you can prevent race condition
 * exploits.
 *
 *
 *
 * @param int $permissions The permissions that you wish to assign to your memory segment, those
 * are the same as permission for a file. Permissions need to be passed
 * in octal form, like for example 0644
 * @param int $size The size of the shared memory block you wish to create in bytes
 * @return resource On success shmop_open will return a Shmop instance that you can
 * use to access the shared memory segment you've created. FALSE is
 * returned on failure.
 * @throws ShmopException
 *
 */
function shmop_open(int $key, int $mode, int $permissions, int $size)
{
    error_clear_last();
    $result = \shmop_open($key, $mode, $permissions, $size);
    if ($result === false) {
        throw ShmopException::createFromPhpError();
    }
    return $result;
}


/**
 * shmop_read will read a string from shared memory block.
 *
 * @param resource $shmop The shared memory block identifier created by
 * shmop_open
 * @param int $offset Offset from which to start reading
 * @param int $size The number of bytes to read.
 * 0 reads shmop_size($shmid) - $start bytes.
 * @return string Returns the data.
 * @throws ShmopException
 *
 */
function shmop_read($shmop, int $offset, int $size): string
{
    error_clear_last();
    $result = \shmop_read($shmop, $offset, $size);
    if ($result === false) {
        throw ShmopException::createFromPhpError();
    }
    return $result;
}
