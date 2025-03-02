<?php

namespace Safe;

use Safe\Exceptions\ApacheException;

/**
 * Fetch the Apache version.
 *
 * @return string Returns the Apache version on success.
 * @throws ApacheException
 *
 */
function apache_get_version(): string
{
    error_clear_last();
    $result = \apache_get_version();
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Retrieve an Apache environment variable specified by
 * variable.
 *
 * @param string $variable The Apache environment variable
 * @param bool $walk_to_top Whether to get the top-level variable available to all Apache layers.
 * @return string The value of the Apache environment variable on success
 * @throws ApacheException
 *
 */
function apache_getenv(string $variable, bool $walk_to_top = false): string
{
    error_clear_last();
    $result = \apache_getenv($variable, $walk_to_top);
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
}


/**
 * This performs a partial request for a URI.  It goes just far
 * enough to obtain all the important information about the given
 * resource.
 *
 * @param string $filename The filename (URI) that's being requested.
 * @return object An object of related URI information. The properties of
 * this object are:
 *
 *
 * status
 * the_request
 * status_line
 * method
 * content_type
 * handler
 * uri
 * filename
 * path_info
 * args
 * boundary
 * no_cache
 * no_local_copy
 * allowed
 * send_bodyct
 * bytes_sent
 * byterange
 * clength
 * unparsed_uri
 * mtime
 * request_time
 *
 *
 * Returns FALSE on failure.
 * @throws ApacheException
 *
 */
function apache_lookup_uri(string $filename): object
{
    error_clear_last();
    $result = \apache_lookup_uri($filename);
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
}


/**
 * This function is a wrapper for Apache's table_get and
 * table_set. It edits the table of notes that exists
 * during a request. The table's purpose is to allow Apache modules to
 * communicate.
 *
 * The main use for apache_note is to pass information
 * from one module to another within the same request.
 *
 * @param string $note_name The name of the note.
 * @param string $note_value The value of the note.
 * @return string If note_value is omitted or NULL, it returns the current value of note
 * note_name. Otherwise, it
 * sets the value of note note_name to
 * note_value and returns the previous value of
 * note note_name.
 * If the note cannot be retrieved, FALSE is returned.
 * @throws ApacheException
 *
 */
function apache_note(string $note_name, string $note_value = null): string
{
    error_clear_last();
    if ($note_value !== null) {
        $result = \apache_note($note_name, $note_value);
    } else {
        $result = \apache_note($note_name);
    }
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Fetches all HTTP request headers from the current request. Works in the
 * Apache, FastCGI, CLI, and FPM webservers.
 *
 * @return array An associative array of all the HTTP headers in the current request.
 * @throws ApacheException
 *
 */
function apache_request_headers(): array
{
    error_clear_last();
    $result = \apache_request_headers();
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
}


/**
 * Fetch all HTTP response headers.  Works in the
 * Apache, FastCGI, CLI, and FPM webservers.
 *
 * @return array An array of all Apache response headers on success.
 * @throws ApacheException
 *
 */
function apache_response_headers(): array
{
    error_clear_last();
    $result = \apache_response_headers();
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
}


/**
 * apache_setenv sets the value of the Apache
 * environment variable specified by
 * variable.
 *
 * @param string $variable The environment variable that's being set.
 * @param string $value The new variable value.
 * @param bool $walk_to_top Whether to set the top-level variable available to all Apache layers.
 * @throws ApacheException
 *
 */
function apache_setenv(string $variable, string $value, bool $walk_to_top = false): void
{
    error_clear_last();
    $result = \apache_setenv($variable, $value, $walk_to_top);
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
}


/**
 * Fetches all HTTP headers from the current request.
 *
 * This function is an alias for apache_request_headers.
 * Please read the apache_request_headers
 * documentation for more information on how this function works.
 *
 * @return array An associative array of all the HTTP headers in the current request.
 * @throws ApacheException
 *
 */
function getallheaders(): array
{
    error_clear_last();
    $result = \getallheaders();
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
    return $result;
}


/**
 * virtual is an Apache-specific function which
 * is similar to &lt;!--#include virtual...--&gt; in
 * mod_include.
 * It performs an Apache sub-request.  It is useful for including
 * CGI scripts or .shtml files, or anything else that you would
 * parse through Apache. Note that for a CGI script, the script
 * must generate valid CGI headers.  At the minimum that means it
 * must generate a Content-Type header.
 *
 * To run the sub-request, all buffers are terminated and flushed to the
 * browser, pending headers are sent too.
 *
 * @param string $uri The file that the virtual command will be performed on.
 * @throws ApacheException
 *
 */
function virtual(string $uri): void
{
    error_clear_last();
    $result = \virtual($uri);
    if ($result === false) {
        throw ApacheException::createFromPhpError();
    }
}
