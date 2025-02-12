<?php

namespace Safe;

use Safe\Exceptions\MbstringException;

/**
 * Returns a string containing the character specified by the Unicode code point value,
 * encoded in the specified encoding.
 *
 * This function complements mb_ord.
 *
 * @param int $codepoint A Unicode codepoint value, e.g. 128024 for U+1F418 ELEPHANT
 * @param string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return string A string containing the requested character, if it can be represented in the specified
 * encoding.
 * @throws MbstringException
 *
 */
function mb_chr(int $codepoint, string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_chr($codepoint, $encoding);
    } else {
        $result = \mb_chr($codepoint);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Converts the character encoding of string
 * to to_encoding
 * from optionally from_encoding.
 * If string is an array, all its string values will be
 * converted recursively.
 *
 * @param string|array $string The string or array being encoded.
 * @param string $to_encoding The type of encoding that string is being converted to.
 * @param mixed $from_encoding Is specified by character code names before conversion. It is either
 * an array, or a comma separated enumerated list.
 * If from_encoding is not specified, the internal
 * encoding will be used.
 *
 *
 * See supported
 * encodings.
 * @return string|array The encoded string or array on success.
 * @throws MbstringException
 *
 */
function mb_convert_encoding($string, string $to_encoding, $from_encoding = null)
{
    error_clear_last();
    if ($from_encoding !== null) {
        $result = \mb_convert_encoding($string, $to_encoding, $from_encoding);
    } else {
        $result = \mb_convert_encoding($string, $to_encoding);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Converts
 * character encoding of variables var and vars in
 * encoding from_encoding to encoding
 * to_encoding.
 *
 * mb_convert_variables join strings in Array
 * or Object to detect encoding, since encoding detection tends to
 * fail for short strings. Therefore, it is impossible to mix
 * encoding in single array or object.
 *
 * @param string $to_encoding The encoding that the string is being converted to.
 * @param array|string $from_encoding from_encoding is specified as an array
 * or comma separated string, it tries to detect encoding from
 * from-coding. When from_encoding
 * is omitted, detect_order is used.
 * @param string|array|object $var var is the reference to the
 * variable being converted. String, Array and Object are accepted.
 * mb_convert_variables assumes all parameters
 * have the same encoding.
 * @param string|array|object $vars Additional vars.
 * @return string The character encoding before conversion for success,
 * or FALSE for failure.
 * @throws MbstringException
 *
 */
function mb_convert_variables(string $to_encoding, $from_encoding, &$var, ...$vars): string
{
    error_clear_last();
    $result = \mb_convert_variables($to_encoding, $from_encoding, $var, ...$vars);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Detects the most likely character encoding for string string
 * from an ordered list of candidates.
 *
 * Automatic detection of the intended character encoding can never be entirely reliable;
 * without some additional information, it is similar to decoding an encrypted string
 * without the key. It is always preferable to use an indication of character encoding
 * stored or transmitted with the data, such as a "Content-Type" HTTP header.
 *
 * This function is most useful with multibyte encodings, where not all sequences of
 * bytes form a valid string. If the input string contains such a sequence, that
 * encoding will be rejected, and the next encoding checked.
 *
 * @param string $string The string being inspected.
 * @param mixed $encodings A list of character encodings to try, in order. The list may be specified as
 * an array of strings, or a single string separated by commas.
 *
 * If encodings is omitted or NULL,
 * the current detect_order (set with the
 * mbstring.detect_order configuration option, or mb_detect_order
 * function) will be used.
 * @param bool $strict Controls the behaviour when string
 * is not valid in any of the listed encodings.
 * If strict is set to FALSE, the closest matching
 * encoding will be returned; if strict is set to TRUE,
 * FALSE will be returned.
 *
 * The default value for strict can be set
 * with the
 * mbstring.strict_detection configuration option.
 * @return string The detected character encoding, or FALSE if the string is not valid
 * in any of the listed encodings.
 * @throws MbstringException
 *
 */
function mb_detect_encoding(string $string, $encodings = null, bool $strict = false): string
{
    error_clear_last();
    if ($strict !== false) {
        $result = \mb_detect_encoding($string, $encodings, $strict);
    } elseif ($encodings !== null) {
        $result = \mb_detect_encoding($string, $encodings);
    } else {
        $result = \mb_detect_encoding($string);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Sets the automatic character
 * encoding detection order to encoding.
 *
 * @param mixed $encoding encoding is an array or
 * comma separated list of character encoding. See supported encodings.
 *
 * If encoding is omitted or NULL, it returns
 * the current character encoding detection order as array.
 *
 * This setting affects mb_detect_encoding and
 * mb_send_mail.
 *
 * mbstring currently implements the following
 * encoding detection filters. If there is an invalid byte sequence
 * for the following encodings, encoding detection will fail.
 *
 * For ISO-8859-*, mbstring
 * always detects as ISO-8859-*.
 *
 * For UTF-16, UTF-32,
 * UCS2 and UCS4, encoding
 * detection will fail always.
 * @return bool|array When setting the encoding detection order, TRUE is returned on success.
 *
 * When getting the encoding detection order, an ordered array of the encodings is returned.
 * @throws MbstringException
 *
 */
function mb_detect_order($encoding = null)
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_detect_order($encoding);
    } else {
        $result = \mb_detect_order();
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns an array of aliases for a known encoding type.
 *
 * @param string $encoding The encoding type being checked, for aliases.
 * @return array Returns a numerically indexed array of encoding aliases on success
 * @throws MbstringException
 *
 */
function mb_encoding_aliases(string $encoding): array
{
    error_clear_last();
    $result = \mb_encoding_aliases($encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Scans string for matches to
 * pattern, then replaces the matched text
 * with the output of callback function.
 *
 * The behavior of this function is almost identical to mb_ereg_replace,
 * except for the fact that instead of
 * replacement parameter, one should specify a
 * callback.
 *
 * @param string $pattern The regular expression pattern.
 *
 * Multibyte characters may be used in pattern.
 * @param callable $callback A callback that will be called and passed an array of matched elements
 * in the  subject string. The callback should
 * return the replacement string.
 *
 * You'll often need the callback function
 * for a mb_ereg_replace_callback in just one place.
 * In this case you can use an
 * anonymous function to
 * declare the callback within the call to
 * mb_ereg_replace_callback. By doing it this way
 * you have all information for the call in one place and do not
 * clutter the function namespace with a callback function's name
 * not used anywhere else.
 * @param string $string The string being checked.
 * @param string $options The search option. See mb_regex_set_options for explanation.
 * @return string The resultant string on success.
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 *
 */
function mb_ereg_replace_callback(string $pattern, callable $callback, string $string, string $options = null): string
{
    error_clear_last();
    if ($options !== null) {
        $result = \mb_ereg_replace_callback($pattern, $callback, $string, $options);
    } else {
        $result = \mb_ereg_replace_callback($pattern, $callback, $string);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $pattern The regular expression pattern.
 *
 * Multibyte characters may be used in pattern.
 * @param string $replacement The replacement text.
 * @param string $string The string being checked.
 * @param string $options
 * @return string The resultant string on success.
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 *
 */
function mb_ereg_replace(string $pattern, string $replacement, string $string, string $options = null): string
{
    error_clear_last();
    if ($options !== null) {
        $result = \mb_ereg_replace($pattern, $replacement, $string, $options);
    } else {
        $result = \mb_ereg_replace($pattern, $replacement, $string);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @return array
 * @throws MbstringException
 *
 */
function mb_ereg_search_getregs(): array
{
    error_clear_last();
    $result = \mb_ereg_search_getregs();
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * mb_ereg_search_init sets
 * string and pattern
 * for a multibyte regular expression. These values are used for
 * mb_ereg_search,
 * mb_ereg_search_pos, and
 * mb_ereg_search_regs.
 *
 * @param string $string The search string.
 * @param string $pattern The search pattern.
 * @param string $options The search option. See mb_regex_set_options for explanation.
 * @throws MbstringException
 *
 */
function mb_ereg_search_init(string $string, string $pattern = null, string $options = null): void
{
    error_clear_last();
    if ($options !== null) {
        $result = \mb_ereg_search_init($string, $pattern, $options);
    } elseif ($pattern !== null) {
        $result = \mb_ereg_search_init($string, $pattern);
    } else {
        $result = \mb_ereg_search_init($string);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 * Returns position and length of a matched part of the multibyte regular expression
 * for a predefined multibyte string
 *
 * The string for match is specified by
 * mb_ereg_search_init. If it is not specified,
 * the previous one will be used.
 *
 * @param string $pattern The search pattern.
 * @param string $options The search option. See mb_regex_set_options for explanation.
 * @return array
 * @throws MbstringException
 *
 */
function mb_ereg_search_pos(string $pattern = null, string $options = null): array
{
    error_clear_last();
    if ($options !== null) {
        $result = \mb_ereg_search_pos($pattern, $options);
    } elseif ($pattern !== null) {
        $result = \mb_ereg_search_pos($pattern);
    } else {
        $result = \mb_ereg_search_pos();
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the matched part of a multibyte regular expression.
 *
 * @param string $pattern The search pattern.
 * @param string $options The search option. See mb_regex_set_options for explanation.
 * @return array
 * @throws MbstringException
 *
 */
function mb_ereg_search_regs(string $pattern = null, string $options = null): array
{
    error_clear_last();
    if ($options !== null) {
        $result = \mb_ereg_search_regs($pattern, $options);
    } elseif ($pattern !== null) {
        $result = \mb_ereg_search_regs($pattern);
    } else {
        $result = \mb_ereg_search_regs();
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param int $offset The position to set. If it is negative, it counts from the end of the string.
 * @throws MbstringException
 *
 */
function mb_ereg_search_setpos(int $offset): void
{
    error_clear_last();
    $result = \mb_ereg_search_setpos($offset);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $pattern The regular expression pattern.  Multibyte characters may be used. The case will be ignored.
 * @param string $replacement The replacement text.
 * @param string $string The searched string.
 * @param string $options
 * @return string The resultant string.
 * If string is not valid for the current encoding, NULL
 * is returned.
 * @throws MbstringException
 *
 */
function mb_eregi_replace(string $pattern, string $replacement, string $string, string $options = null): string
{
    error_clear_last();
    if ($options !== null) {
        $result = \mb_eregi_replace($pattern, $replacement, $string, $options);
    } else {
        $result = \mb_eregi_replace($pattern, $replacement, $string);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $type If type is not specified or is specified as "all",
 * "internal_encoding", "http_input",
 * "http_output", "http_output_conv_mimetypes",
 * "mail_charset", "mail_header_encoding",
 * "mail_body_encoding", "illegal_chars",
 * "encoding_translation", "language",
 * "detect_order", "substitute_character"
 * and "strict_detection"
 * will be returned.
 *
 * If type is specified as
 * "internal_encoding", "http_input",
 * "http_output", "http_output_conv_mimetypes",
 * "mail_charset", "mail_header_encoding",
 * "mail_body_encoding", "illegal_chars",
 * "encoding_translation", "language",
 * "detect_order", "substitute_character"
 * or "strict_detection"
 * the specified setting parameter will be returned.
 * @return mixed An array of type information if type
 * is not specified, otherwise a specific type.
 * @throws MbstringException
 *
 */
function mb_get_info(string $type = "all")
{
    error_clear_last();
    $result = \mb_get_info($type);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $type Input string specifies the input type.
 * "G" for GET, "P" for POST, "C" for COOKIE, "S" for string, "L" for list, and
 * "I" for the whole list (will return array).
 * If type is omitted, it returns the last input type processed.
 * @return mixed The character encoding name, as per the type,
 * or an array of character encoding names, if type is "I".
 * If mb_http_input does not process specified
 * HTTP input, it returns FALSE.
 * @throws MbstringException
 *
 */
function mb_http_input(string $type = null)
{
    error_clear_last();
    if ($type !== null) {
        $result = \mb_http_input($type);
    } else {
        $result = \mb_http_input();
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Set/Get the HTTP output character encoding.
 * Output after this function is called will be converted from the set internal encoding to encoding.
 *
 * @param string $encoding If encoding is set,
 * mb_http_output sets the HTTP output character
 * encoding to encoding.
 *
 * If encoding is omitted,
 * mb_http_output returns the current HTTP output
 * character encoding.
 * @return string|bool If encoding is omitted,
 * mb_http_output returns the current HTTP output
 * character encoding. Otherwise,
 * Returns TRUE on success.
 * @throws MbstringException
 *
 */
function mb_http_output(string $encoding = null)
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_http_output($encoding);
    } else {
        $result = \mb_http_output();
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Set/Get the internal character encoding
 *
 * @param string $encoding encoding is the character encoding name
 * used for the HTTP input character encoding conversion, HTTP output
 * character encoding conversion, and the default character encoding
 * for string functions defined by the mbstring module.
 * You should notice that the internal encoding is totally different from the one for multibyte regex.
 * @return string|bool If encoding is set, then
 * Returns TRUE on success.
 * In this case, the character encoding for multibyte regex is NOT changed.
 * If encoding is omitted, then
 * the current character encoding name is returned.
 * @throws MbstringException
 *
 */
function mb_internal_encoding(string $encoding = null)
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_internal_encoding($encoding);
    } else {
        $result = \mb_internal_encoding();
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the Unicode code point value of the given character.
 *
 * This function complements mb_chr.
 *
 * @param string $string A string
 * @param string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return int The Unicode code point for the first character of string.
 * @throws MbstringException
 *
 */
function mb_ord(string $string, string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_ord($string, $encoding);
    } else {
        $result = \mb_ord($string);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Parses GET/POST/COOKIE data and
 * sets global variables. Since PHP does not provide raw POST/COOKIE
 * data, it can only be used for GET data for now. It parses URL
 * encoded data, detects encoding, converts coding to internal
 * encoding and set values to the result array or
 * global variables.
 *
 * @param string $string The URL encoded data.
 * @param array|null $result An array containing decoded and character encoded converted values.
 * @throws MbstringException
 *
 */
function mb_parse_str(string $string, ?array &$result): void
{
    error_clear_last();
    $result = \mb_parse_str($string, $result);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 * Get a MIME charset string for a specific encoding.
 *
 * @param string $encoding The encoding being checked.
 * @return string The MIME charset string for character encoding
 * encoding,
 * or FALSE if no charset is preferred for the given encoding.
 * @throws MbstringException
 *
 */
function mb_preferred_mime_name(string $encoding): string
{
    error_clear_last();
    $result = \mb_preferred_mime_name($encoding);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Set/Get character encoding for a multibyte regex.
 *
 * @param string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return string|bool
 * @throws MbstringException
 *
 */
function mb_regex_encoding(string $encoding = null)
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_regex_encoding($encoding);
    } else {
        $result = \mb_regex_encoding();
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Sends email. Headers and messages are converted and encoded according
 * to the mb_language setting. It's a wrapper function
 * for mail, so see also mail for details.
 *
 * @param string $to The mail addresses being sent to. Multiple
 * recipients may be specified by putting a comma between each
 * address in to.
 * This parameter is not automatically encoded.
 * @param string $subject The subject of the mail.
 * @param string $message The message of the mail.
 * @param string|array|null $additional_headers String or array to be inserted at the end of the email header.
 *
 * This is typically used to add extra headers (From, Cc, and Bcc).
 * Multiple extra headers should be separated with a CRLF (\r\n).
 * Validate parameter not to be injected unwanted headers by attackers.
 *
 * If an array is passed, its keys are the header names and its
 * values are the respective header values.
 *
 * When sending mail, the mail must contain
 * a From header. This can be set with the
 * additional_headers parameter, or a default
 * can be set in php.ini.
 *
 * Failing to do this will result in an error
 * message similar to Warning: mail(): "sendmail_from" not
 * set in php.ini or custom "From:" header missing.
 * The From header sets also
 * Return-Path under Windows.
 *
 * If messages are not received, try using a LF (\n) only.
 * Some Unix mail transfer agents (most notably
 * qmail) replace LF by CRLF
 * automatically (which leads to doubling CR if CRLF is used).
 * This should be a last resort, as it does not comply with
 * RFC 2822.
 * @param string $additional_params additional_params is a MTA command line
 * parameter. It is useful when setting the correct Return-Path
 * header when using sendmail.
 *
 * This parameter is escaped by escapeshellcmd internally
 * to prevent command execution. escapeshellcmd prevents
 * command execution, but allows to add additional parameters. For security reason,
 * this parameter should be validated.
 *
 * Since escapeshellcmd is applied automatically, some characters
 * that are allowed as email addresses by internet RFCs cannot be used. Programs
 * that are required to use these characters mail cannot be used.
 *
 * The user that the webserver runs as should be added as a trusted user to the
 * sendmail configuration to prevent a 'X-Warning' header from being added
 * to the message when the envelope sender (-f) is set using this method.
 * For sendmail users, this file is /etc/mail/trusted-users.
 * @throws MbstringException
 *
 */
function mb_send_mail(string $to, string $subject, string $message, $additional_headers = [], string $additional_params = null): void
{
    error_clear_last();
    if ($additional_params !== null) {
        $result = \mb_send_mail($to, $subject, $message, $additional_headers, $additional_params);
    } else {
        $result = \mb_send_mail($to, $subject, $message, $additional_headers);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
}


/**
 *
 *
 * @param string $pattern The regular expression pattern.
 * @param string $string The string being split.
 * @param int $limit
 * @return array The result as an array.
 * @throws MbstringException
 *
 */
function mb_split(string $pattern, string $string, int $limit = -1): array
{
    error_clear_last();
    $result = \mb_split($pattern, $string, $limit);
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * This function will return an array of strings, it is a version of str_split with support for encodings of variable character size as well as fixed-size encodings of 1,2 or 4 byte characters.
 * If the length parameter is specified, the string is broken down into chunks of the specified length in characters (not bytes).
 * The encoding parameter can be optionally specified and it is good practice to do so.
 *
 * @param string $string The string to split into characters or chunks.
 * @param int $length If specified, each element of the returned array will be composed of multiple characters instead of a single character.
 * @param  $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 *
 * A string specifying one of the supported encodings.
 * @return array mb_str_split returns an array of strings.
 * @throws MbstringException
 *
 */
function mb_str_split(string $string, int $length = 1, $encoding = null): array
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_str_split($string, $length, $encoding);
    } else {
        $result = \mb_str_split($string, $length);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * mb_stripos returns the numeric position of
 * the first occurrence of needle in the
 * haystack string.
 * Unlike mb_strpos,
 * mb_stripos is case-insensitive.
 * If needle is not found, it returns FALSE.
 *
 * @param string $haystack The string from which to get the position of the first occurrence
 * of needle
 * @param string $needle The string to find in haystack
 * @param int $offset The position in haystack
 * to start searching.
 * A negative offset counts from the end of the string.
 * @param string $encoding Character encoding name to use.
 * If it is omitted, internal character encoding is used.
 * @return int Return the numeric position of the first occurrence of
 * needle in the haystack
 * string, or FALSE if needle is not found.
 * @throws MbstringException
 *
 */
function mb_stripos(string $haystack, string $needle, int $offset = 0, string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_stripos($haystack, $needle, $offset, $encoding);
    } else {
        $result = \mb_stripos($haystack, $needle, $offset);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * mb_stristr finds the first occurrence of
 * needle in haystack
 * and returns the portion of haystack.
 * Unlike mb_strstr,
 * mb_stristr is case-insensitive.
 * If needle is not found, it returns FALSE.
 *
 * @param string $haystack The string from which to get the first occurrence
 * of needle
 * @param string $needle The string to find in haystack
 * @param bool $before_needle Determines which portion of haystack
 * this function returns.
 * If set to TRUE, it returns all of  haystack
 * from the beginning to the first occurrence of needle (excluding needle).
 * If set to FALSE, it returns all of haystack
 * from the first occurrence of needle to the end (including needle).
 * @param string $encoding Character encoding name to use.
 * If it is omitted, internal character encoding is used.
 * @return string Returns the portion of haystack,
 * or FALSE if needle is not found.
 * @throws MbstringException
 *
 */
function mb_stristr(string $haystack, string $needle, bool $before_needle = false, string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_stristr($haystack, $needle, $before_needle, $encoding);
    } else {
        $result = \mb_stristr($haystack, $needle, $before_needle);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Finds position of the first occurrence of a string in a string.
 *
 * Performs a multi-byte safe
 * strpos operation based on number of
 * characters. The first character's position is 0, the second character
 * position is 1, and so on.
 *
 * @param string $haystack The string being checked.
 * @param string $needle The string to find in haystack. In contrast
 * with strpos, numeric values are not applied
 * as the ordinal value of a character.
 * @param int $offset The search offset. If it is not specified, 0 is used.
 * A negative offset counts from the end of the string.
 * @param string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return int Returns the numeric position of
 * the first occurrence of needle in the
 * haystack string. If
 * needle is not found, it returns FALSE.
 * @throws MbstringException
 *
 */
function mb_strpos(string $haystack, string $needle, int $offset = 0, string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_strpos($haystack, $needle, $offset, $encoding);
    } else {
        $result = \mb_strpos($haystack, $needle, $offset);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * mb_strrchr finds the last occurrence of
 * needle in haystack
 * and returns the portion of haystack.
 * If needle is not found, it returns FALSE.
 *
 * @param string $haystack The string from which to get the last occurrence
 * of needle
 * @param string $needle The string to find in haystack
 * @param bool $before_needle Determines which portion of haystack
 * this function returns.
 * If set to TRUE, it returns all of haystack
 * from the beginning to the last occurrence of needle.
 * If set to FALSE, it returns all of haystack
 * from the last occurrence of needle to the end,
 * @param string $encoding Character encoding name to use.
 * If it is omitted, internal character encoding is used.
 * @return string Returns the portion of haystack.
 * or FALSE if needle is not found.
 * @throws MbstringException
 *
 */
function mb_strrchr(string $haystack, string $needle, bool $before_needle = false, string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_strrchr($haystack, $needle, $before_needle, $encoding);
    } else {
        $result = \mb_strrchr($haystack, $needle, $before_needle);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * mb_strrichr finds the last occurrence of
 * needle in haystack
 * and returns the portion of haystack. Unlike
 * mb_strrchr, mb_strrichr is
 * case-insensitive.
 * If needle is not found, it returns FALSE.
 *
 * @param string $haystack The string from which to get the last occurrence
 * of needle
 * @param string $needle The string to find in haystack
 * @param bool $before_needle Determines which portion of haystack
 * this function returns.
 * If set to TRUE, it returns all of haystack
 * from the beginning to the last occurrence of needle.
 * If set to FALSE, it returns all of haystack
 * from the last occurrence of needle to the end,
 * @param string $encoding Character encoding name to use.
 * If it is omitted, internal character encoding is used.
 * @return string Returns the portion of haystack.
 * or FALSE if needle is not found.
 * @throws MbstringException
 *
 */
function mb_strrichr(string $haystack, string $needle, bool $before_needle = false, string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_strrichr($haystack, $needle, $before_needle, $encoding);
    } else {
        $result = \mb_strrichr($haystack, $needle, $before_needle);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * mb_strripos performs multi-byte safe
 * strripos operation based on
 * number of characters. needle position is
 * counted from the beginning of
 * haystack. First character's position is
 * 0. Second character position is 1.
 * Unlike mb_strrpos,
 * mb_strripos is case-insensitive.
 *
 * @param string $haystack The string from which to get the position of the last occurrence
 * of needle
 * @param string $needle The string to find in haystack
 * @param int $offset The position in haystack
 * to start searching
 * @param string $encoding Character encoding name to use.
 * If it is omitted, internal character encoding is used.
 * @return int Return the numeric position of
 * the last occurrence of needle in the
 * haystack string, or FALSE
 * if needle is not found.
 * @throws MbstringException
 *
 */
function mb_strripos(string $haystack, string $needle, int $offset = 0, string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_strripos($haystack, $needle, $offset, $encoding);
    } else {
        $result = \mb_strripos($haystack, $needle, $offset);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * Performs a multibyte safe
 * strrpos operation based on the
 * number of characters. needle position is
 * counted from the beginning of
 * haystack. First character's position is
 * 0. Second character position is 1.
 *
 * @param string $haystack The string being checked, for the last occurrence
 * of needle
 * @param string $needle The string to find in haystack.
 * @param int $offset
 * @param string $encoding The encoding
 * parameter is the character encoding. If it is omitted or NULL, the internal character
 * encoding value will be used.
 * @return int Returns the numeric position of
 * the last occurrence of needle in the
 * haystack string. If
 * needle is not found, it returns FALSE.
 * @throws MbstringException
 *
 */
function mb_strrpos(string $haystack, string $needle, int $offset = 0, string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_strrpos($haystack, $needle, $offset, $encoding);
    } else {
        $result = \mb_strrpos($haystack, $needle, $offset);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}


/**
 * mb_strstr finds the first occurrence of
 * needle in haystack
 * and returns the portion of haystack.
 * If needle is not found, it returns FALSE.
 *
 * @param string $haystack The string from which to get the first occurrence
 * of needle
 * @param string $needle The string to find in haystack
 * @param bool $before_needle Determines which portion of haystack
 * this function returns.
 * If set to TRUE, it returns all of  haystack
 * from the beginning to the first occurrence of needle (excluding needle).
 * If set to FALSE, it returns all of haystack
 * from the first occurrence of needle to the end (including needle).
 * @param string $encoding Character encoding name to use.
 * If it is omitted, internal character encoding is used.
 * @return string Returns the portion of haystack,
 * or FALSE if needle is not found.
 * @throws MbstringException
 *
 */
function mb_strstr(string $haystack, string $needle, bool $before_needle = false, string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \mb_strstr($haystack, $needle, $before_needle, $encoding);
    } else {
        $result = \mb_strstr($haystack, $needle, $before_needle);
    }
    if ($result === false) {
        throw MbstringException::createFromPhpError();
    }
    return $result;
}
