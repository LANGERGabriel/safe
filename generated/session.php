<?php

namespace Safe;

use Safe\Exceptions\SessionException;

/**
 * session_abort finishes session without saving
 * data. Thus the original values in session data are kept.
 *
 * @throws SessionException
 *
 */
function session_abort(): void
{
    error_clear_last();
    $result = \session_abort();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_cache_expire returns the current setting of
 * session.cache_expire.
 *
 * The cache expire is reset to the default value of 180 stored in
 * session.cache_expire
 * at request startup time. Thus,
 * you need to call session_cache_expire for every
 * request (and before session_start is called).
 *
 * @param int $value If value is given and not NULL, the current cache
 * expire is replaced with value.
 *
 *
 *
 * Setting value is of value only, if
 * session.cache_limiter is set to a value
 * different from nocache.
 *
 *
 * @return int Returns the current setting of session.cache_expire.
 * The value returned should be read in minutes, defaults to 180.
 * On failure to change the value, FALSE is returned.
 * @throws SessionException
 *
 */
function session_cache_expire(int $value = null): int
{
    error_clear_last();
    if ($value !== null) {
        $result = \session_cache_expire($value);
    } else {
        $result = \session_cache_expire();
    }
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * session_cache_limiter returns the name of the
 * current cache limiter.
 *
 * The cache limiter defines which cache control HTTP headers are sent to
 * the client.  These headers determine the rules by which the page content
 * may be cached by the client and intermediate proxies.  Setting the cache
 * limiter to nocache disallows any client/proxy caching.
 * A value of public permits caching by proxies and the
 * client, whereas private disallows caching by proxies
 * and permits the client to cache the contents.
 *
 * In private mode, the Expire header sent to the client
 * may cause confusion for some browsers, including Mozilla.
 * You can avoid this problem by using private_no_expire mode. The
 * Expire header is never sent to the client in this mode.
 *
 * Setting the cache limiter to '' will turn off automatic sending
 * of cache headers entirely.
 *
 * The cache limiter is reset to the default value stored in
 * session.cache_limiter
 * at request startup time. Thus, you need to call
 * session_cache_limiter for every
 * request (and before session_start is called).
 *
 * @param string $value If value is specified and not NULL, the name of the
 * current cache limiter is changed to the new value.
 * @return string Returns the name of the current cache limiter.
 * On failure to change the value, FALSE is returned.
 * @throws SessionException
 *
 */
function session_cache_limiter(string $value = null): string
{
    error_clear_last();
    if ($value !== null) {
        $result = \session_cache_limiter($value);
    } else {
        $result = \session_cache_limiter();
    }
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * session_create_id is used to create new
 * session id for the current session. It returns collision free
 * session id.
 *
 * If session is not active, collision check is omitted.
 *
 * Session ID is created according to php.ini settings.
 *
 * It is important to use the same user ID of your web server for GC
 * task script. Otherwise, you may have permission problems especially
 * with files save handler.
 *
 * @param string $prefix If prefix is specified, new session id
 * is prefixed by prefix. Not all
 * characters are allowed within the session id.  Characters in
 * the range a-z A-Z 0-9 , (comma) and -
 * (minus) are allowed.
 * @return string session_create_id returns new collision free
 * session id for the current session. If it is used without active
 * session, it omits collision check.
 * On failure, FALSE is returned.
 * @throws SessionException
 *
 */
function session_create_id(string $prefix = ""): string
{
    error_clear_last();
    $result = \session_create_id($prefix);
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * session_decode decodes the serialized session data provided in
 * $data, and populates the $_SESSION superglobal
 * with the result.
 *
 * By default, the unserialization method used is internal to PHP, and is not the same as unserialize.
 * The serialization method can be set using session.serialize_handler.
 *
 * @param string $data The encoded data to be stored.
 * @throws SessionException
 *
 */
function session_decode(string $data): void
{
    error_clear_last();
    $result = \session_decode($data);
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * In order to kill the session altogether, the
 * session ID must also be unset. If a cookie is used to propagate the
 * session ID (default behavior), then the session cookie must be deleted.
 * setcookie may be used for that.
 *
 * When session.use_strict_mode
 * is enabled. You do not have to remove obsolete session ID cookie because
 * session module will not accept session ID cookie when there is no
 * data associated to the session ID and set new session ID cookie.
 * Enabling session.use_strict_mode
 * is recommended for all sites.
 *
 * @throws SessionException
 *
 */
function session_destroy(): void
{
    error_clear_last();
    $result = \session_destroy();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_encode returns a serialized string of the
 * contents of the current session data stored in the $_SESSION superglobal.
 *
 * By default, the serialization method used is internal to PHP, and is not the same as serialize.
 * The serialization method can be set using session.serialize_handler.
 *
 * @return string Returns the contents of the current session encoded.
 * @throws SessionException
 *
 */
function session_encode(): string
{
    error_clear_last();
    $result = \session_encode();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * session_gc is used to perform session data
 * GC(garbage collection). PHP does probability based session GC by
 * default.
 *
 * Probability based GC works somewhat but it has few problems. 1) Low
 * traffic sites' session data may not be deleted within the preferred
 * duration. 2) High traffic sites' GC may be too frequent GC. 3) GC is
 * performed on the user's request and the user will experience a GC
 * delay.
 *
 * Therefore, it is recommended to execute GC periodically for
 * production systems using, e.g., "cron" for UNIX-like systems.
 * Make sure to disable probability based GC by setting
 * session.gc_probability
 * to 0.
 *
 * @return int session_gc returns number of deleted session
 * data for success, FALSE for failure.
 *
 * Old save handlers do not return number of deleted session data, but
 * only success/failure flag. If this is the case, number of deleted
 * session data became 1 regardless of actually deleted data.
 * @throws SessionException
 *
 */
function session_gc(): int
{
    error_clear_last();
    $result = \session_gc();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * session_id is used to get or set the session id for
 * the current session.
 *
 * The constant SID can also be used to
 * retrieve the current name and session id as a string suitable for
 * adding to URLs. See also Session
 * handling.
 *
 * @param string $id If id is specified and not NULL, it will replace the current
 * session id. session_id needs to be called before
 * session_start for that purpose. Depending on the
 * session handler, not all characters are allowed within the session id.
 * For example, the file session handler only allows characters in the
 * range a-z A-Z 0-9 , (comma) and - (minus)!
 * @return string session_id returns the session id for the current
 * session or the empty string ("") if there is no current
 * session (no current session id exists).
 * On failure, FALSE is returned.
 * @throws SessionException
 *
 */
function session_id(string $id = null): string
{
    error_clear_last();
    if ($id !== null) {
        $result = \session_id($id);
    } else {
        $result = \session_id();
    }
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * session_module_name gets the name of the current
 * session module, which is also known as
 * session.save_handler.
 *
 * @param string $module If module is specified and not NULL, that module will be
 * used instead.
 * Passing "user" to this parameter is forbidden. Instead
 * session_set_save_handler has to be called to set a user
 * defined session handler.
 * @return string Returns the name of the current session module.
 * @throws SessionException
 *
 */
function session_module_name(string $module = null): string
{
    error_clear_last();
    if ($module !== null) {
        $result = \session_module_name($module);
    } else {
        $result = \session_module_name();
    }
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * session_name returns the name of the current
 * session. If name is given,
 * session_name will update the session name and return
 * the old session name.
 *
 * If a new session name is
 * supplied, session_name modifies the HTTP cookie
 * (and output content when session.transid is
 * enabled). Once the HTTP cookie is
 * sent, session_name raises error.
 * session_name must be called
 * before session_start for the session to work
 * properly.
 *
 * The session name is reset to the default value stored in
 * session.name at request startup time. Thus, you need to
 * call session_name for every request (and before
 * session_start is called).
 *
 * @param string $name The session name references the name of the session, which is
 * used in cookies and URLs (e.g. PHPSESSID). It
 * should contain only alphanumeric characters; it should be short and
 * descriptive (i.e. for users with enabled cookie warnings).
 * If name is specified and not NULL, the name of the current
 * session is changed to its value.
 *
 *
 *
 * The session name can't consist of digits only, at least one letter
 * must be present. Otherwise a new session id is generated every time.
 *
 *
 *
 * The session name can't consist of digits only, at least one letter
 * must be present. Otherwise a new session id is generated every time.
 * @return string Returns the name of the current session. If name is given
 * and function updates the session name, name of the old session
 * is returned.
 * @throws SessionException
 *
 */
function session_name(string $name = null): string
{
    error_clear_last();
    if ($name !== null) {
        $result = \session_name($name);
    } else {
        $result = \session_name();
    }
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * session_regenerate_id will replace the current
 * session id with a new one, and keep the current session information.
 *
 * When session.use_trans_sid
 * is enabled, output must be started after session_regenerate_id
 * call. Otherwise, old session ID is used.
 *
 * @param bool $delete_old_session Whether to delete the old associated session file or not.
 * You should not delete old session if you need to avoid
 * races caused by deletion or detect/avoid session hijack
 * attacks.
 * @throws SessionException
 *
 */
function session_regenerate_id(bool $delete_old_session = false): void
{
    error_clear_last();
    $result = \session_regenerate_id($delete_old_session);
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_reset reinitializes a session with
 * original values stored in session storage. This function requires an active session and
 * discards changes in $_SESSION.
 *
 * @throws SessionException
 *
 */
function session_reset(): void
{
    error_clear_last();
    $result = \session_reset();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * session_save_path returns the path of the current
 * directory used to save session data.
 *
 * @param string $path Session data path. If specified and not NULL, the path to which data is saved will
 * be changed. session_save_path needs to be called
 * before session_start for that purpose.
 *
 *
 *
 * On some operating systems, you may want to specify a path on a
 * filesystem that handles lots of small files efficiently. For example,
 * on Linux, reiserfs may provide better performance than ext2fs.
 *
 *
 *
 * On some operating systems, you may want to specify a path on a
 * filesystem that handles lots of small files efficiently. For example,
 * on Linux, reiserfs may provide better performance than ext2fs.
 * @return string Returns the path of the current directory used for data storage.
 * @throws SessionException
 *
 */
function session_save_path(string $path = null): string
{
    error_clear_last();
    if ($path !== null) {
        $result = \session_save_path($path);
    } else {
        $result = \session_save_path();
    }
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
    return $result;
}


/**
 * The session_unset function frees all session variables
 * currently registered.
 *
 * @throws SessionException
 *
 */
function session_unset(): void
{
    error_clear_last();
    $result = \session_unset();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}


/**
 * End the current session and store session data.
 *
 * Session data is usually stored after your script terminated without the
 * need to call session_write_close, but as session data
 * is locked to prevent concurrent writes only one script may operate on a
 * session at any time. When using framesets together with sessions you will
 * experience the frames loading one by one due to this locking. You can
 * reduce the time needed to load all the frames by ending the session as
 * soon as all changes to session variables are done.
 *
 * @throws SessionException
 *
 */
function session_write_close(): void
{
    error_clear_last();
    $result = \session_write_close();
    if ($result === false) {
        throw SessionException::createFromPhpError();
    }
}
