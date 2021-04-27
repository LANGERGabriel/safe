<?php

namespace Safe;

use Safe\Exceptions\StringsException;

/**
 * convert_uudecode decodes a uuencoded string.
 *
 * @param string $string The uuencoded data.
 * @return string Returns the decoded data as a string.
 * @throws StringsException
 *
 */
function convert_uudecode(string $string): string
{
    error_clear_last();
    $result = \convert_uudecode($string);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Counts the number of occurrences of every byte-value (0..255) in
 * string and returns it in various ways.
 *
 * @param string $string The examined string.
 * @param int $mode See return values.
 * @return mixed Depending on mode
 * count_chars returns one of the following:
 *
 *
 *
 * 0 - an array with the byte-value as key and the frequency of
 * every byte as value.
 *
 *
 *
 *
 * 1 - same as 0 but only byte-values with a frequency greater
 * than zero are listed.
 *
 *
 *
 *
 * 2 - same as 0 but only byte-values with a frequency equal to
 * zero are listed.
 *
 *
 *
 *
 * 3 - a string containing all unique characters is returned.
 *
 *
 *
 *
 * 4 - a string containing all not used characters is returned.
 *
 *
 *
 * @throws StringsException
 *
 */
function count_chars(string $string, int $mode = 0)
{
    error_clear_last();
    $result = \count_chars($string, $mode);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Decodes a hexadecimally encoded binary string.
 *
 * @param string $string Hexadecimal representation of data.
 * @return string Returns the binary representation of the given data.
 * @throws StringsException
 *
 */
function hex2bin(string $string): string
{
    error_clear_last();
    $result = \hex2bin($string);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Calculates the MD5 hash of the file specified by the
 * filename parameter using the
 * RSA Data Security, Inc.
 * MD5 Message-Digest Algorithm, and returns that hash.
 * The hash is a 32-character hexadecimal number.
 *
 * @param string $filename The filename
 * @param bool $binary When TRUE, returns the digest in raw binary format with a length of
 * 16.
 * @return string Returns a string on success, FALSE otherwise.
 * @throws StringsException
 *
 */
function md5_file(string $filename, bool $binary = false): string
{
    error_clear_last();
    $result = \md5_file($filename, $binary);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Calculates the metaphone key of string.
 *
 * Similar to soundex metaphone creates the same key for
 * similar sounding words. It's more accurate than
 * soundex as it knows the basic rules of English
 * pronunciation.  The metaphone generated keys are of variable length.
 *
 * Metaphone was developed by Lawrence Philips
 * &lt;lphilips at verity dot com&gt;. It is described in ["Practical
 * Algorithms for Programmers", Binstock &amp; Rex, Addison Wesley,
 * 1995].
 *
 * @param string $string The input string.
 * @param int $max_phonemes This parameter restricts the returned metaphone key to
 * max_phonemes characters in length.
 * However, the resulting phonemes are always transcribed completely, so the
 * resulting string length may be slightly longer than max_phonemes.
 * The default value of 0 means no restriction.
 * @return string Returns the metaphone key as a string.
 * @throws StringsException
 *
 */
function metaphone(string $string, int $max_phonemes = 0): string
{
    error_clear_last();
    $result = \metaphone($string, $max_phonemes);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * nl_langinfo is used to access individual elements of
 * the locale categories.  Unlike localeconv, which
 * returns all of the elements, nl_langinfo allows you
 * to select any specific element.
 *
 * @param int $item item may be an integer value of the element or the
 * constant name of the element. The following is a list of constant names
 * for item that may be used and their description.
 * Some of these constants may not be defined or hold no value for certain
 * locales.
 *
 * nl_langinfo Constants
 *
 *
 *
 *
 *
 * Constant
 * Description
 *
 *
 *
 *
 * LC_TIME Category Constants
 *
 *
 * ABDAY_(1-7)
 * Abbreviated name of n-th day of the week.
 *
 *
 * DAY_(1-7)
 * Name of the n-th day of the week (DAY_1 = Sunday).
 *
 *
 * ABMON_(1-12)
 * Abbreviated name of the n-th month of the year.
 *
 *
 * MON_(1-12)
 * Name of the n-th month of the year.
 *
 *
 * AM_STR
 * String for Ante meridian.
 *
 *
 * PM_STR
 * String for Post meridian.
 *
 *
 * D_T_FMT
 * String that can be used as the format string for strftime to represent time and date.
 *
 *
 * D_FMT
 * String that can be used as the format string for strftime to represent date.
 *
 *
 * T_FMT
 * String that can be used as the format string for strftime to represent time.
 *
 *
 * T_FMT_AMPM
 * String that can be used as the format string for strftime to represent time in 12-hour format with ante/post meridian.
 *
 *
 * ERA
 * Alternate era.
 *
 *
 * ERA_YEAR
 * Year in alternate era format.
 *
 *
 * ERA_D_T_FMT
 * Date and time in alternate era format (string can be used in strftime).
 *
 *
 * ERA_D_FMT
 * Date in alternate era format (string can be used in strftime).
 *
 *
 * ERA_T_FMT
 * Time in alternate era format (string can be used in strftime).
 *
 *
 * LC_MONETARY Category Constants
 *
 *
 * INT_CURR_SYMBOL
 * International currency symbol.
 *
 *
 * CURRENCY_SYMBOL
 * Local currency symbol.
 *
 *
 * CRNCYSTR
 * Same value as CURRENCY_SYMBOL.
 *
 *
 * MON_DECIMAL_POINT
 * Decimal point character.
 *
 *
 * MON_THOUSANDS_SEP
 * Thousands separator (groups of three digits).
 *
 *
 * MON_GROUPING
 * Like "grouping" element.
 *
 *
 * POSITIVE_SIGN
 * Sign for positive values.
 *
 *
 * NEGATIVE_SIGN
 * Sign for negative values.
 *
 *
 * INT_FRAC_DIGITS
 * International fractional digits.
 *
 *
 * FRAC_DIGITS
 * Local fractional digits.
 *
 *
 * P_CS_PRECEDES
 * Returns 1 if CURRENCY_SYMBOL precedes a positive value.
 *
 *
 * P_SEP_BY_SPACE
 * Returns 1 if a space separates CURRENCY_SYMBOL from a positive value.
 *
 *
 * N_CS_PRECEDES
 * Returns 1 if CURRENCY_SYMBOL precedes a negative value.
 *
 *
 * N_SEP_BY_SPACE
 * Returns 1 if a space separates CURRENCY_SYMBOL from a negative value.
 *
 *
 * P_SIGN_POSN
 *
 *
 *
 *
 * Returns 0 if parentheses surround the quantity and CURRENCY_SYMBOL.
 *
 *
 *
 *
 * Returns 1 if the sign string precedes the quantity and CURRENCY_SYMBOL.
 *
 *
 *
 *
 * Returns 2 if the sign string follows the quantity and CURRENCY_SYMBOL.
 *
 *
 *
 *
 * Returns 3 if the sign string immediately precedes the CURRENCY_SYMBOL.
 *
 *
 *
 *
 * Returns 4 if the sign string immediately follows the CURRENCY_SYMBOL.
 *
 *
 *
 *
 *
 *
 * N_SIGN_POSN
 *
 *
 * LC_NUMERIC Category Constants
 *
 *
 * DECIMAL_POINT
 * Decimal point character.
 *
 *
 * RADIXCHAR
 * Same value as DECIMAL_POINT.
 *
 *
 * THOUSANDS_SEP
 * Separator character for thousands (groups of three digits).
 *
 *
 * THOUSEP
 * Same value as THOUSANDS_SEP.
 *
 *
 * GROUPING
 *
 *
 *
 * LC_MESSAGES Category Constants
 *
 *
 * YESEXPR
 * Regex string for matching "yes" input.
 *
 *
 * NOEXPR
 * Regex string for matching "no" input.
 *
 *
 * YESSTR
 * Output string for "yes".
 *
 *
 * NOSTR
 * Output string for "no".
 *
 *
 * LC_CTYPE Category Constants
 *
 *
 * CODESET
 * Return a string with the name of the character encoding.
 *
 *
 *
 *
 * @return string Returns the element as a string, or FALSE if item
 * is not valid.
 * @throws StringsException
 *
 */
function nl_langinfo(int $item): string
{
    error_clear_last();
    $result = \nl_langinfo($item);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param string $filename The filename of the file to hash.
 * @param bool $binary When TRUE, returns the digest in raw binary format with a length of
 * 20.
 * @return string Returns a string on success, FALSE otherwise.
 * @throws StringsException
 *
 */
function sha1_file(string $filename, bool $binary = false): string
{
    error_clear_last();
    $result = \sha1_file($filename, $binary);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns a string produced according to the formatting string
 * format.
 *
 * @param string $format The format string is composed of zero or more directives:
 * ordinary characters (excluding %) that are
 * copied directly to the result and conversion
 * specifications, each of which results in fetching its
 * own parameter.
 *
 * A conversion specification follows this prototype:
 * %[argnum$][flags][width][.precision]specifier.
 *
 * An integer followed by a dollar sign $,
 * to specify which number argument to treat in the conversion.
 *
 *
 * Flags
 *
 *
 *
 * Flag
 * Description
 *
 *
 *
 *
 * -
 *
 * Left-justify within the given field width;
 * Right justification is the default
 *
 *
 *
 * +
 *
 * Prefix positive numbers with a plus sign
 * +; Default only negative
 * are prefixed with a negative sign.
 *
 *
 *
 * (space)
 *
 * Pads the result with spaces.
 * This is the default.
 *
 *
 *
 * 0
 *
 * Only left-pads numbers with zeros.
 * With s specifiers this can
 * also right-pad with zeros.
 *
 *
 *
 * '(char)
 *
 * Pads the result with the character (char).
 *
 *
 *
 *
 *
 *
 * An integer that says how many characters (minimum)
 * this conversion should result in.
 *
 * A period . followed by an integer
 * who's meaning depends on the specifier:
 *
 *
 *
 * For e, E,
 * f and F
 * specifiers: this is the number of digits to be printed
 * after the decimal point (by default, this is 6).
 *
 *
 *
 *
 * For g and G
 * specifiers: this is the maximum number of significant
 * digits to be printed.
 *
 *
 *
 *
 * For s specifier: it acts as a cutoff point,
 * setting a maximum character limit to the string.
 *
 *
 *
 *
 *
 * If the period is specified without an explicit value for precision,
 * 0 is assumed.
 *
 *
 *
 *
 * Specifiers
 *
 *
 *
 * Specifier
 * Description
 *
 *
 *
 *
 * %
 *
 * A literal percent character. No argument is required.
 *
 *
 *
 * b
 *
 * The argument is treated as an integer and presented
 * as a binary number.
 *
 *
 *
 * c
 *
 * The argument is treated as an integer and presented
 * as the character with that ASCII.
 *
 *
 *
 * d
 *
 * The argument is treated as an integer and presented
 * as a (signed) decimal number.
 *
 *
 *
 * e
 *
 * The argument is treated as scientific notation (e.g. 1.2e+2).
 * The precision specifier stands for the number of digits after the
 * decimal point since PHP 5.2.1. In earlier versions, it was taken as
 * number of significant digits (one less).
 *
 *
 *
 * E
 *
 * Like the e specifier but uses
 * uppercase letter (e.g. 1.2E+2).
 *
 *
 *
 * f
 *
 * The argument is treated as a float and presented
 * as a floating-point number (locale aware).
 *
 *
 *
 * F
 *
 * The argument is treated as a float and presented
 * as a floating-point number (non-locale aware).
 * Available as of PHP 5.0.3.
 *
 *
 *
 * g
 *
 *
 * General format.
 *
 *
 * Let P equal the precision if nonzero, 6 if the precision is omitted,
 * or 1 if the precision is zero.
 * Then, if a conversion with style E would have an exponent of X:
 *
 *
 * If P &gt; X ≥ −4, the conversion is with style f and precision P − (X + 1).
 * Otherwise, the conversion is with style e and precision P − 1.
 *
 *
 *
 *
 * G
 *
 * Like the g specifier but uses
 * E and f.
 *
 *
 *
 * h
 *
 * Like the g specifier but uses F.
 * Available as of PHP 8.0.0.
 *
 *
 *
 * H
 *
 * Like the g specifier but uses
 * E and F. Available as of PHP 8.0.0.
 *
 *
 *
 * o
 *
 * The argument is treated as an integer and presented
 * as an octal number.
 *
 *
 *
 * s
 *
 * The argument is treated and presented as a string.
 *
 *
 *
 * u
 *
 * The argument is treated as an integer and presented
 * as an unsigned decimal number.
 *
 *
 *
 * x
 *
 * The argument is treated as an integer and presented
 * as a hexadecimal number (with lowercase letters).
 *
 *
 *
 * X
 *
 * The argument is treated as an integer and presented
 * as a hexadecimal number (with uppercase letters).
 *
 *
 *
 *
 *
 *
 * General format.
 *
 * Let P equal the precision if nonzero, 6 if the precision is omitted,
 * or 1 if the precision is zero.
 * Then, if a conversion with style E would have an exponent of X:
 *
 * If P &gt; X ≥ −4, the conversion is with style f and precision P − (X + 1).
 * Otherwise, the conversion is with style e and precision P − 1.
 *
 * The c type specifier ignores padding and width
 *
 * Attempting to use a combination of the string and width specifiers with character sets that require more than one byte per character may result in unexpected results
 *
 * Variables will be co-erced to a suitable type for the specifier:
 *
 * Type Handling
 *
 *
 *
 * Type
 * Specifiers
 *
 *
 *
 *
 * string
 * s
 *
 *
 * integer
 *
 * d,
 * u,
 * c,
 * o,
 * x,
 * X,
 * b
 *
 *
 *
 * double
 *
 * g,
 * G,
 * e,
 * E,
 * f,
 * F
 *
 *
 *
 *
 *
 * @param string|int|float|bool $values
 * @return string Returns a string produced according to the formatting string
 * format.
 * @throws StringsException
 *
 */
function sprintf(string $format, ...$values): string
{
    error_clear_last();
    if ($values !== []) {
        $result = \sprintf($format, ...$values);
    } else {
        $result = \sprintf($format);
    }
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns all of haystack starting from and including the first
 * occurrence of needle to the end.
 *
 * @param string $haystack The string to search in
 * @param mixed $needle
 * Prior to PHP 8.0.0, if needle is not a string, it is converted
 * to an integer and applied as the ordinal value of a character.
 * This behavior is deprecated as of PHP 7.3.0, and relying on it is highly
 * discouraged. Depending on the intended behavior, the
 * needle should either be explicitly cast to string,
 * or an explicit call to chr should be performed.
 * @param bool $before_needle If TRUE, stristr
 * returns the part of the haystack before the
 * first occurrence of the needle (excluding needle).
 * @return string Returns the matched substring. If needle is not
 * found, returns FALSE.
 * @throws StringsException
 *
 */
function stristr(string $haystack, $needle, bool $before_needle = false): string
{
    error_clear_last();
    $result = \stristr($haystack, $needle, $before_needle);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * strpbrk searches the string
 * string for a characters.
 *
 * @param string $string The string where characters is looked for.
 * @param string $characters This parameter is case sensitive.
 * @return string Returns a string starting from the character found, or FALSE if it is
 * not found.
 * @throws StringsException
 *
 */
function strpbrk(string $string, string $characters): string
{
    error_clear_last();
    $result = \strpbrk($string, $characters);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * This function returns the portion of haystack which
 * starts at the last occurrence of needle and goes
 * until the end of haystack.
 *
 * @param string $haystack The string to search in
 * @param mixed $needle If needle contains more than one character,
 * only the first is used. This behavior is different from that of
 * strstr.
 *
 *
 * Prior to PHP 8.0.0, if needle is not a string, it is converted
 * to an integer and applied as the ordinal value of a character.
 * This behavior is deprecated as of PHP 7.3.0, and relying on it is highly
 * discouraged. Depending on the intended behavior, the
 * needle should either be explicitly cast to string,
 * or an explicit call to chr should be performed.
 * @return string This function returns the portion of string, or FALSE if
 * needle is not found.
 * @throws StringsException
 *
 */
function strrchr(string $haystack, $needle): string
{
    error_clear_last();
    $result = \strrchr($haystack, $needle);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns part of haystack string starting from and including the first
 * occurrence of needle to the end of
 * haystack.
 *
 * @param string $haystack The input string.
 * @param mixed $needle
 * Prior to PHP 8.0.0, if needle is not a string, it is converted
 * to an integer and applied as the ordinal value of a character.
 * This behavior is deprecated as of PHP 7.3.0, and relying on it is highly
 * discouraged. Depending on the intended behavior, the
 * needle should either be explicitly cast to string,
 * or an explicit call to chr should be performed.
 * @param bool $before_needle If TRUE, strstr returns
 * the part of the haystack before the first
 * occurrence of the needle (excluding the needle).
 * @return string Returns the portion of string, or FALSE if needle
 * is not found.
 * @throws StringsException
 *
 */
function strstr(string $haystack, $needle, bool $before_needle = false): string
{
    error_clear_last();
    $result = \strstr($haystack, $needle, $before_needle);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Returns the portion of string specified by the
 * offset and length parameters.
 *
 * @param string $string The input string.
 * @param int $offset If offset is non-negative, the returned string
 * will start at the offset'th position in
 * string, counting from zero. For instance,
 * in the string 'abcdef', the character at
 * position 0 is 'a', the
 * character at position 2 is
 * 'c', and so forth.
 *
 * If offset is negative, the returned string
 * will start at the offset'th character
 * from the end of string.
 *
 * If string is less than
 * offset characters long, FALSE will be returned.
 *
 *
 * Using a negative offset
 *
 *
 * ]]>
 *
 *
 * @param int $length If length is given and is positive, the string
 * returned will contain at most length characters
 * beginning from offset (depending on the length of
 * string).
 *
 * If length is given and is negative, then that many
 * characters will be omitted from the end of string
 * (after the start position has been calculated when a
 * offset is negative).  If
 * offset denotes the position of this truncation or
 * beyond, FALSE will be returned.
 *
 * If length is given and is 0,
 * FALSE or NULL, an empty string will be returned.
 *
 * If length is omitted, the substring starting from
 * offset until the end of the string will be
 * returned.
 * @return string Returns the extracted part of string;, or
 * an empty string.
 * @throws StringsException
 *
 */
function substr(string $string, int $offset, int $length = null): string
{
    error_clear_last();
    if ($length !== null) {
        $result = \substr($string, $offset, $length);
    } else {
        $result = \substr($string, $offset);
    }
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}


/**
 * Operates as sprintf but accepts an array of
 * arguments, rather than a variable number of arguments.
 *
 * @param string $format The format string is composed of zero or more directives:
 * ordinary characters (excluding %) that are
 * copied directly to the result and conversion
 * specifications, each of which results in fetching its
 * own parameter.
 *
 * A conversion specification follows this prototype:
 * %[argnum$][flags][width][.precision]specifier.
 *
 * An integer followed by a dollar sign $,
 * to specify which number argument to treat in the conversion.
 *
 *
 * Flags
 *
 *
 *
 * Flag
 * Description
 *
 *
 *
 *
 * -
 *
 * Left-justify within the given field width;
 * Right justification is the default
 *
 *
 *
 * +
 *
 * Prefix positive numbers with a plus sign
 * +; Default only negative
 * are prefixed with a negative sign.
 *
 *
 *
 * (space)
 *
 * Pads the result with spaces.
 * This is the default.
 *
 *
 *
 * 0
 *
 * Only left-pads numbers with zeros.
 * With s specifiers this can
 * also right-pad with zeros.
 *
 *
 *
 * '(char)
 *
 * Pads the result with the character (char).
 *
 *
 *
 *
 *
 *
 * An integer that says how many characters (minimum)
 * this conversion should result in.
 *
 * A period . followed by an integer
 * who's meaning depends on the specifier:
 *
 *
 *
 * For e, E,
 * f and F
 * specifiers: this is the number of digits to be printed
 * after the decimal point (by default, this is 6).
 *
 *
 *
 *
 * For g and G
 * specifiers: this is the maximum number of significant
 * digits to be printed.
 *
 *
 *
 *
 * For s specifier: it acts as a cutoff point,
 * setting a maximum character limit to the string.
 *
 *
 *
 *
 *
 * If the period is specified without an explicit value for precision,
 * 0 is assumed.
 *
 *
 *
 *
 * Specifiers
 *
 *
 *
 * Specifier
 * Description
 *
 *
 *
 *
 * %
 *
 * A literal percent character. No argument is required.
 *
 *
 *
 * b
 *
 * The argument is treated as an integer and presented
 * as a binary number.
 *
 *
 *
 * c
 *
 * The argument is treated as an integer and presented
 * as the character with that ASCII.
 *
 *
 *
 * d
 *
 * The argument is treated as an integer and presented
 * as a (signed) decimal number.
 *
 *
 *
 * e
 *
 * The argument is treated as scientific notation (e.g. 1.2e+2).
 * The precision specifier stands for the number of digits after the
 * decimal point since PHP 5.2.1. In earlier versions, it was taken as
 * number of significant digits (one less).
 *
 *
 *
 * E
 *
 * Like the e specifier but uses
 * uppercase letter (e.g. 1.2E+2).
 *
 *
 *
 * f
 *
 * The argument is treated as a float and presented
 * as a floating-point number (locale aware).
 *
 *
 *
 * F
 *
 * The argument is treated as a float and presented
 * as a floating-point number (non-locale aware).
 * Available as of PHP 5.0.3.
 *
 *
 *
 * g
 *
 *
 * General format.
 *
 *
 * Let P equal the precision if nonzero, 6 if the precision is omitted,
 * or 1 if the precision is zero.
 * Then, if a conversion with style E would have an exponent of X:
 *
 *
 * If P &gt; X ≥ −4, the conversion is with style f and precision P − (X + 1).
 * Otherwise, the conversion is with style e and precision P − 1.
 *
 *
 *
 *
 * G
 *
 * Like the g specifier but uses
 * E and f.
 *
 *
 *
 * h
 *
 * Like the g specifier but uses F.
 * Available as of PHP 8.0.0.
 *
 *
 *
 * H
 *
 * Like the g specifier but uses
 * E and F. Available as of PHP 8.0.0.
 *
 *
 *
 * o
 *
 * The argument is treated as an integer and presented
 * as an octal number.
 *
 *
 *
 * s
 *
 * The argument is treated and presented as a string.
 *
 *
 *
 * u
 *
 * The argument is treated as an integer and presented
 * as an unsigned decimal number.
 *
 *
 *
 * x
 *
 * The argument is treated as an integer and presented
 * as a hexadecimal number (with lowercase letters).
 *
 *
 *
 * X
 *
 * The argument is treated as an integer and presented
 * as a hexadecimal number (with uppercase letters).
 *
 *
 *
 *
 *
 *
 * General format.
 *
 * Let P equal the precision if nonzero, 6 if the precision is omitted,
 * or 1 if the precision is zero.
 * Then, if a conversion with style E would have an exponent of X:
 *
 * If P &gt; X ≥ −4, the conversion is with style f and precision P − (X + 1).
 * Otherwise, the conversion is with style e and precision P − 1.
 *
 * The c type specifier ignores padding and width
 *
 * Attempting to use a combination of the string and width specifiers with character sets that require more than one byte per character may result in unexpected results
 *
 * Variables will be co-erced to a suitable type for the specifier:
 *
 * Type Handling
 *
 *
 *
 * Type
 * Specifiers
 *
 *
 *
 *
 * string
 * s
 *
 *
 * integer
 *
 * d,
 * u,
 * c,
 * o,
 * x,
 * X,
 * b
 *
 *
 *
 * double
 *
 * g,
 * G,
 * e,
 * E,
 * f,
 * F
 *
 *
 *
 *
 *
 * @param array $values
 * @return string Return array values as a formatted string according to
 * format.
 * @throws StringsException
 *
 */
function vsprintf(string $format, array $values): string
{
    error_clear_last();
    $result = \vsprintf($format, $values);
    if ($result === false) {
        throw StringsException::createFromPhpError();
    }
    return $result;
}
