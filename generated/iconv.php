<?php

namespace Safe;

use Safe\Exceptions\IconvException;

/**
 * Retrieve internal configuration variables of iconv extension.
 *
 * @param string $type The value of the optional type can be:
 *
 * all
 * input_encoding
 * output_encoding
 * internal_encoding
 *
 * @return mixed Returns the current value of the internal configuration variable if
 * successful.
 *
 * If type is omitted or set to "all",
 * iconv_get_encoding returns an array that
 * stores all these variables.
 * @throws IconvException
 *
 */
function iconv_get_encoding(string $type = "all")
{
    error_clear_last();
    $result = \iconv_get_encoding($type);
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Decodes multiple MIME header fields at once.
 *
 * @param string $headers The encoded headers, as a string.
 * @param int $mode mode determines the behaviour in the event
 * iconv_mime_decode_headers encounters a malformed
 * MIME header field. You can specify any combination
 * of the following bitmasks.
 *
 * Bitmasks acceptable to iconv_mime_decode_headers
 *
 *
 *
 * Value
 * Constant
 * Description
 *
 *
 *
 *
 * 1
 * ICONV_MIME_DECODE_STRICT
 *
 * If set, the given header is decoded in full conformance with the
 * standards defined in RFC2047.
 * This option is disabled by default because there are a lot of
 * broken mail user agents that don't follow the specification and don't
 * produce correct MIME headers.
 *
 *
 *
 * 2
 * ICONV_MIME_DECODE_CONTINUE_ON_ERROR
 *
 * If set, iconv_mime_decode_headers
 * attempts to ignore any grammatical errors and continue to process
 * a given header.
 *
 *
 *
 *
 *
 * @param string $encoding The optional encoding parameter specifies the
 * character set to represent the result by. If omitted or NULL,
 * iconv.internal_encoding
 * will be used.
 * @return array Returns an associative array that holds a whole set of
 * MIME header fields specified by
 * headers on success, or FALSE
 * if an error occurs during the decoding.
 *
 * Each key of the return value represents an individual
 * field name and the corresponding element represents a field value.
 * If more than one field of the same name are present,
 * iconv_mime_decode_headers automatically incorporates
 * them into a numerically indexed array in the order of occurrence.
 * Note that header names are not case-insensitive.
 * @throws IconvException
 *
 */
function iconv_mime_decode_headers(string $headers, int $mode = 0, string $encoding = null): array
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \iconv_mime_decode_headers($headers, $mode, $encoding);
    } else {
        $result = \iconv_mime_decode_headers($headers, $mode);
    }
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Decodes a MIME header field.
 *
 * @param string $string The encoded header, as a string.
 * @param int $mode mode determines the behaviour in the event
 * iconv_mime_decode encounters a malformed
 * MIME header field. You can specify any combination
 * of the following bitmasks.
 *
 * Bitmasks acceptable to iconv_mime_decode
 *
 *
 *
 * Value
 * Constant
 * Description
 *
 *
 *
 *
 * 1
 * ICONV_MIME_DECODE_STRICT
 *
 * If set, the given header is decoded in full conformance with the
 * standards defined in RFC2047.
 * This option is disabled by default because there are a lot of
 * broken mail user agents that don't follow the specification and don't
 * produce correct MIME headers.
 *
 *
 *
 * 2
 * ICONV_MIME_DECODE_CONTINUE_ON_ERROR
 *
 * If set, iconv_mime_decode_headers
 * attempts to ignore any grammatical errors and continue to process
 * a given header.
 *
 *
 *
 *
 *
 * @param string $encoding The optional encoding parameter specifies the
 * character set to represent the result by. If omitted or NULL,
 * iconv.internal_encoding
 * will be used.
 * @return string Returns a decoded MIME field on success,
 * or FALSE if an error occurs during the decoding.
 * @throws IconvException
 *
 */
function iconv_mime_decode(string $string, int $mode = 0, string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \iconv_mime_decode($string, $mode, $encoding);
    } else {
        $result = \iconv_mime_decode($string, $mode);
    }
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Composes and returns a string that represents a valid MIME
 * header field, which looks like the following:
 *
 *
 *
 * In the above example, "Subject" is the field name and the portion that
 * begins with "=?ISO-8859-1?..." is the field value.
 *
 * @param string $field_name The field name.
 * @param string $field_value The field value.
 * @param array $options You can control the behaviour of iconv_mime_encode
 * by specifying an associative array that contains configuration items
 * to the optional third parameter options.
 * The items supported by iconv_mime_encode are
 * listed below. Note that item names are treated case-sensitive.
 *
 * Configuration items supported by iconv_mime_encode
 *
 *
 *
 * Item
 * Type
 * Description
 * Default value
 * Example
 *
 *
 *
 *
 * scheme
 * string
 *
 * Specifies the method to encode a field value by. The value of
 * this item may be either "B" or "Q", where "B" stands for
 * base64 encoding scheme and "Q" stands for
 * quoted-printable encoding scheme.
 *
 * B
 * B
 *
 *
 * input-charset
 * string
 *
 * Specifies the character set in which the first parameter
 * field_name and the second parameter
 * field_value are presented. If not given,
 * iconv_mime_encode assumes those parameters
 * are presented to it in the
 * iconv.internal_encoding
 * ini setting.
 *
 *
 * iconv.internal_encoding
 *
 * ISO-8859-1
 *
 *
 * output-charset
 * string
 *
 * Specifies the character set to use to compose the
 * MIME header.
 *
 *
 * iconv.internal_encoding
 *
 * UTF-8
 *
 *
 * line-length
 * int
 *
 * Specifies the maximum length of the header lines. The resulting
 * header is "folded" to a set of multiple lines in case
 * the resulting header field would be longer than the value of this
 * parameter, according to
 * RFC2822 - Internet Message Format.
 * If not given, the length will be limited to 76 characters.
 *
 * 76
 * 996
 *
 *
 * line-break-chars
 * string
 *
 * Specifies the sequence of characters to append to each line
 * as an end-of-line sign when "folding" is performed on a long header
 * field. If not given, this defaults to "\r\n"
 * (CR LF). Note that
 * this parameter is always treated as an ASCII string regardless
 * of the value of input-charset.
 *
 * \r\n
 * \n
 *
 *
 *
 *
 * @return string Returns an encoded MIME field on success,
 * or FALSE if an error occurs during the encoding.
 * @throws IconvException
 *
 */
function iconv_mime_encode(string $field_name, string $field_value, array $options = []): string
{
    error_clear_last();
    $result = \iconv_mime_encode($field_name, $field_value, $options);
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Changes the value of the internal configuration variable specified by
 * type to encoding.
 *
 * @param string $type The value of type can be any one of these:
 *
 * input_encoding
 * output_encoding
 * internal_encoding
 *
 * @param string $encoding The character set.
 * @throws IconvException
 *
 */
function iconv_set_encoding(string $type, string $encoding): void
{
    error_clear_last();
    $result = \iconv_set_encoding($type, $encoding);
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
}


/**
 * In contrast to strlen,
 * iconv_strlen counts the occurrences of characters
 * in the given byte sequence string on the basis of
 * the specified character set, the result of which is not necessarily
 * identical to the length of the string in byte.
 *
 * @param string $string The string.
 * @param string $encoding If encoding parameter is omitted or NULL,
 * string is assumed to be encoded in
 * iconv.internal_encoding.
 * @return int Returns the character count of string, as an integer,
 * or FALSE if an error occurs during the encoding.
 * @throws IconvException
 *
 */
function iconv_strlen(string $string, string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \iconv_strlen($string, $encoding);
    } else {
        $result = \iconv_strlen($string);
    }
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Finds position of first occurrence of a needle
 * within a haystack.
 *
 * In contrast to strpos, the return value of
 * iconv_strpos is the number of characters that
 * appear before the needle, rather than the offset in bytes to the
 * position where the needle has been found. The characters are counted
 * on the basis of the specified character set encoding.
 *
 * @param string $haystack The entire string.
 * @param string $needle The searched substring.
 * @param int $offset The optional offset parameter specifies
 * the position from which the search should be performed.
 * If the offset is negative, it is counted from the end of the string.
 * @param string $encoding If encoding parameter is omitted or NULL,
 * string are assumed to be encoded in
 * iconv.internal_encoding.
 * @return int Returns the numeric position of the first occurrence of
 * needle in haystack.
 *
 * If needle is not found,
 * iconv_strpos will return FALSE.
 * @throws IconvException
 *
 */
function iconv_strpos(string $haystack, string $needle, int $offset = 0, string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \iconv_strpos($haystack, $needle, $offset, $encoding);
    } else {
        $result = \iconv_strpos($haystack, $needle, $offset);
    }
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Finds the last occurrence of a needle
 * within a haystack.
 *
 * In contrast to strrpos, the return value of
 * iconv_strrpos is the number of characters that
 * appear before the needle, rather than the offset in bytes to the
 * position where the needle has been found. The characters are counted
 * on the basis of the specified character set encoding.
 *
 * @param string $haystack The entire string.
 * @param string $needle The searched substring.
 * @param string $encoding If encoding parameter is omitted or NULL,
 * string are assumed to be encoded in
 * iconv.internal_encoding.
 * @return int Returns the numeric position of the last occurrence of
 * needle in haystack.
 *
 * If needle is not found,
 * iconv_strrpos will return FALSE.
 * @throws IconvException
 *
 */
function iconv_strrpos(string $haystack, string $needle, string $encoding = null): int
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \iconv_strrpos($haystack, $needle, $encoding);
    } else {
        $result = \iconv_strrpos($haystack, $needle);
    }
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Cuts a portion of string specified by the
 * offset and length parameters.
 *
 * @param string $string The original string.
 * @param int $offset If offset is non-negative,
 * iconv_substr cuts the portion out of
 * string beginning at offset'th
 * character, counting from zero.
 *
 * If offset is negative,
 * iconv_substr cuts out the portion beginning
 * at the position, offset characters
 * away from the end of string.
 * @param int $length If length is given and is positive, the return
 * value will contain at most length characters
 * of the portion that begins at offset
 * (depending on the length of string).
 *
 * If negative length is passed,
 * iconv_substr cuts the portion out of
 * string from the offset'th
 * character up to the character that is
 * length characters away from the end of the string.
 * In case offset is also negative, the start position
 * is calculated beforehand according to the rule explained above.
 * @param string $encoding If encoding parameter is omitted or NULL,
 * string are assumed to be encoded in
 * iconv.internal_encoding.
 *
 * Note that offset and length
 * parameters are always deemed to represent offsets that are
 * calculated on the basis of the character set determined by
 * encoding, whilst the counterpart
 * substr always takes these for byte offsets.
 * @return string Returns the portion of string specified by the
 * offset and length parameters.
 *
 * If string is shorter than offset
 * characters long, FALSE will be returned.
 * If string is exactly offset
 * characters long, an empty string will be returned.
 * @throws IconvException
 *
 */
function iconv_substr(string $string, int $offset, int $length = null, string $encoding = null): string
{
    error_clear_last();
    if ($encoding !== null) {
        $result = \iconv_substr($string, $offset, $length, $encoding);
    } elseif ($length !== null) {
        $result = \iconv_substr($string, $offset, $length);
    } else {
        $result = \iconv_substr($string, $offset);
    }
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}


/**
 * Performs a character set conversion on the string
 * string from from_encoding
 * to to_encoding.
 *
 * @param string $from_encoding The input charset.
 * @param string $to_encoding The output charset.
 *
 * If you append the string //TRANSLIT to
 * to_encoding transliteration is activated. This
 * means that when a character can't be represented in the target charset,
 * it can be approximated through one or several similarly looking
 * characters. If you append the string //IGNORE,
 * characters that cannot be represented in the target charset are silently
 * discarded. Otherwise, E_NOTICE is generated and the function
 * will return FALSE.
 *
 * If and how //TRANSLIT works exactly depends on the
 * system's iconv() implementation (cf. ICONV_IMPL).
 * Some implementations are known to ignore //TRANSLIT,
 * so the conversion is likely to fail for characters which are illegal for
 * the to_encoding.
 * @param string $string The string to be converted.
 * @return string Returns the converted string.
 * @throws IconvException
 *
 */
function iconv(string $from_encoding, string $to_encoding, string $string): string
{
    error_clear_last();
    $result = \iconv($from_encoding, $to_encoding, $string);
    if ($result === false) {
        throw IconvException::createFromPhpError();
    }
    return $result;
}
