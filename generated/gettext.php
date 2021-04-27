<?php

namespace Safe;

use Safe\Exceptions\GettextException;

/**
 * bind_textdomain_codeset allows to set or get the
 * encoding in which messages from domain will be returned by
 * gettext and similar functions.
 *
 * @param string $domain The domain.
 * @param string $codeset The code set.
 * If NULL, the currently set encoding is returned.
 * @return string A string on success.
 * @throws GettextException
 *
 */
function bind_textdomain_codeset(string $domain, string $codeset): string
{
    error_clear_last();
    $result = \bind_textdomain_codeset($domain, $codeset);
    if ($result === false) {
        throw GettextException::createFromPhpError();
    }
    return $result;
}


/**
 * The bindtextdomain function sets or gets the path
 * for a domain.
 *
 * @param string $domain The domain.
 * @param string $directory The directory path.
 * If NULL, the currently set directory is returned.
 * @return string The full pathname for the domain currently being set.
 * @throws GettextException
 *
 */
function bindtextdomain(string $domain, string $directory): string
{
    error_clear_last();
    $result = \bindtextdomain($domain, $directory);
    if ($result === false) {
        throw GettextException::createFromPhpError();
    }
    return $result;
}
