<?php

namespace Safe;

use Safe\Exceptions\SocketsException;

/**
 * After the socket socket has been created
 * using socket_create, bound to a name with
 * socket_bind, and told to listen for connections
 * with socket_listen, this function will accept
 * incoming connections on that socket. Once a successful connection
 * is made, a new Socket instance is returned,
 * which may be used for communication. If there are multiple connections
 * queued on the socket, the first will be used. If there are no pending
 * connections, socket_accept will block until
 * a connection becomes present. If socket
 * has been made non-blocking using
 * socket_set_blocking or
 * socket_set_nonblock, FALSE will be returned.
 *
 * The Socket instance returned by
 * socket_accept may not be used to accept new
 * connections. The original listening socket
 * socket, however, remains open and may be
 * reused.
 *
 * @param resource $socket A Socket instance created with socket_create.
 * @return resource Returns a new Socket instance on success. The actual
 * error code can be retrieved by calling
 * socket_last_error. This error code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 * @throws SocketsException
 *
 */
function socket_accept($socket)
{
    error_clear_last();
    $result = \socket_accept($socket);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * Create a Socket instance, and bind it to the provided AddressInfo.  The return
 * value of this function may be used with socket_listen.
 *
 * @param resource $address AddressInfo instance created from socket_addrinfo_lookup.
 * @return resource|null Returns a Socket instance on success.
 * @throws SocketsException
 *
 */
function socket_addrinfo_bind($address)
{
    error_clear_last();
    $result = \socket_addrinfo_bind($address);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * Create a Socket instance, and connect it to the provided AddressInfo instance.  The return
 * value of this function may be used with the rest of the socket functions.
 *
 * @param resource $address AddressInfo instance created from socket_addrinfo_lookup
 * @return resource|null Returns a Socket instance on success.
 * @throws SocketsException
 *
 */
function socket_addrinfo_connect($address)
{
    error_clear_last();
    $result = \socket_addrinfo_connect($address);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * Lookup different ways we can connect to host.  The returned array contains
 * a set of AddressInfo instances that we can bind to using socket_addrinfo_bind.
 *
 * @param string $host Hostname to search.
 * @param mixed $service The service to connect to.  If service is a name, it is translated to the corresponding
 * port number.
 * @param array $hints Hints provide criteria for selecting addresses returned.  You may specify the
 * hints as defined by getadrinfo.
 * @return resource[] Returns an array of AddressInfo instances that can be used with the other socket_addrinfo functions.
 * On failure, FALSE is returned.
 * @throws SocketsException
 *
 */
function socket_addrinfo_lookup(string $host, $service = null, array $hints = []): iterable
{
    error_clear_last();
    if ($hints !== []) {
        $result = \socket_addrinfo_lookup($host, $service, $hints);
    } elseif ($service !== null) {
        $result = \socket_addrinfo_lookup($host, $service);
    } else {
        $result = \socket_addrinfo_lookup($host);
    }
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * Binds the name given in address to the socket
 * described by socket. This has to be done before
 * a connection is be established using socket_connect
 * or socket_listen.
 *
 * @param resource $socket A Socket instance created with socket_create.
 * @param string $address If the socket is of the AF_INET family, the
 * address is an IP in dotted-quad notation
 * (e.g. 127.0.0.1).
 *
 * If the socket is of the AF_UNIX family, the
 * address is the path of a
 * Unix-domain socket (e.g. /tmp/my.sock).
 * @param int $port The port parameter is only used when
 * binding an AF_INET socket, and designates
 * the port on which to listen for connections.
 * @throws SocketsException
 *
 */
function socket_bind($socket, string $address, int $port = 0): void
{
    error_clear_last();
    $result = \socket_bind($socket, $address, $port);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * Initiate a connection to address using the Socket instance
 * socket, which must be Socket
 * instance created with socket_create.
 *
 * @param resource $socket A Socket instance created with
 * socket_create.
 * @param string $address The address parameter is either an IPv4 address
 * in dotted-quad notation (e.g. 127.0.0.1) if
 * socket is AF_INET, a valid
 * IPv6 address (e.g. ::1) if IPv6 support is enabled and
 * socket is AF_INET6
 * or the pathname of a Unix domain socket, if the socket family is
 * AF_UNIX.
 * @param int $port The port parameter is only used and is mandatory
 * when connecting to an AF_INET or an
 * AF_INET6 socket, and designates
 * the port on the remote host to which a connection should be made.
 * @throws SocketsException
 *
 */
function socket_connect($socket, string $address, int $port = null): void
{
    error_clear_last();
    if ($port !== null) {
        $result = \socket_connect($socket, $address, $port);
    } else {
        $result = \socket_connect($socket, $address);
    }
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * socket_create_listen creates a new Socket instance of
 * type AF_INET listening on all
 * local interfaces on the given port waiting for new connections.
 *
 * This function is meant to ease the task of creating a new socket which
 * only listens to accept new connections.
 *
 * @param int $port The port on which to listen on all interfaces.
 * @param int $backlog The backlog parameter defines the maximum length
 * the queue of pending connections may grow to.
 * SOMAXCONN may be passed as
 * backlog parameter, see
 * socket_listen for more information.
 * @return resource socket_create_listen returns a new Socket instance
 * on success. The error code can be retrieved with
 * socket_last_error. This code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 * @throws SocketsException
 *
 */
function socket_create_listen(int $port, int $backlog = 128)
{
    error_clear_last();
    $result = \socket_create_listen($port, $backlog);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * socket_create_pair creates two connected and
 * indistinguishable sockets, and stores them in pair.
 * This function is commonly used in IPC (InterProcess Communication).
 *
 * @param int $domain The domain parameter specifies the protocol
 * family to be used by the socket. See socket_create
 * for the full list.
 * @param int $type The type parameter selects the type of communication
 * to be used by the socket. See socket_create for the
 * full list.
 * @param int $protocol The protocol parameter sets the specific
 * protocol within the specified domain to be used
 * when communicating on the returned socket. The proper value can be retrieved by
 * name by using getprotobyname. If
 * the desired protocol is TCP, or UDP the corresponding constants
 * SOL_TCP, and SOL_UDP
 * can also be used.
 *
 * See socket_create for the full list of supported
 * protocols.
 * @param resource[]|null $pair Reference to an array in which the two Socket instances will be inserted.
 * @throws SocketsException
 *
 */
function socket_create_pair(int $domain, int $type, int $protocol, ?iterable &$pair): void
{
    error_clear_last();
    $result = \socket_create_pair($domain, $type, $protocol, $pair);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * Creates and returns a Socket instance, also referred to as an endpoint
 * of communication. A typical network connection is made up of 2 sockets, one
 * performing the role of the client, and another performing the role of the server.
 *
 * @param int $domain The domain parameter specifies the protocol
 * family to be used by the socket.
 * @param int $type The type parameter selects the type of communication
 * to be used by the socket.
 * @param int $protocol The protocol parameter sets the specific
 * protocol within the specified domain to be used
 * when communicating on the returned socket. The proper value can be
 * retrieved by name by using getprotobyname. If
 * the desired protocol is TCP, or UDP the corresponding constants
 * SOL_TCP, and SOL_UDP
 * can also be used.
 * @return resource socket_create returns a Socket instance on success. The actual error code can be retrieved by calling
 * socket_last_error. This error code may be passed to
 * socket_strerror to get a textual explanation of the
 * error.
 * @throws SocketsException
 *
 */
function socket_create(int $domain, int $type, int $protocol)
{
    error_clear_last();
    $result = \socket_create($domain, $type, $protocol);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param resource $socket
 * @return resource Return resource.
 * @throws SocketsException
 *
 */
function socket_export_stream($socket)
{
    error_clear_last();
    $result = \socket_export_stream($socket);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * The socket_get_option function retrieves the value for
 * the option specified by the option parameter for the
 * specified socket.
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_accept.
 * @param int $level The level parameter specifies the protocol
 * level at which the option resides. For example, to retrieve options at
 * the socket level, a level parameter of
 * SOL_SOCKET would be used. Other levels, such as
 * TCP, can be used by
 * specifying the protocol number of that level. Protocol numbers can be
 * found by using the getprotobyname function.
 * @param int $option Reports whether the socket lingers on
 * socket_close if data is present. By default,
 * when the socket is closed, it attempts to send all unsent data.
 * In the case of a connection-oriented socket,
 * socket_close will wait for its peer to
 * acknowledge the data.
 *
 * If l_onoff is non-zero and
 * l_linger is zero, all the
 * unsent data will be discarded and RST (reset) is sent to the
 * peer in the case of a connection-oriented socket.
 *
 * On the other hand, if l_onoff is
 * non-zero and l_linger is non-zero,
 * socket_close will block until all the data
 * is sent or the time specified in l_linger
 * elapses. If the socket is non-blocking,
 * socket_close will fail and return an error.
 * @return mixed Returns the value of the given options.
 * @throws SocketsException
 *
 */
function socket_get_option($socket, int $level, int $option)
{
    error_clear_last();
    $result = \socket_get_option($socket, $level, $option);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * Queries the remote side of the given socket which may either result in
 * host/port or in a Unix filesystem path, dependent on its type.
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_accept.
 * @param string|null $address If the given socket is of type AF_INET or
 * AF_INET6, socket_getpeername
 * will return the peers (remote) IP address in
 * appropriate notation (e.g. 127.0.0.1 or
 * fe80::1) in the address
 * parameter and, if the optional port parameter is
 * present, also the associated port.
 *
 * If the given socket is of type AF_UNIX,
 * socket_getpeername will return the Unix filesystem
 * path (e.g. /var/run/daemon.sock) in the
 * address parameter.
 * @param int|null $port If given, this will hold the port associated to
 * address.
 * @throws SocketsException
 *
 */
function socket_getpeername($socket, ?string &$address, ?int &$port = null): void
{
    error_clear_last();
    $result = \socket_getpeername($socket, $address, $port);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 *
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_accept.
 * @param string|null $address If the given socket is of type AF_INET
 * or AF_INET6, socket_getsockname
 * will return the local IP address in appropriate notation (e.g.
 * 127.0.0.1 or fe80::1) in the
 * address parameter and, if the optional
 * port parameter is present, also the associated port.
 *
 * If the given socket is of type AF_UNIX,
 * socket_getsockname will return the Unix filesystem
 * path (e.g. /var/run/daemon.sock) in the
 * address parameter.
 * @param int|null $port If provided, this will hold the associated port.
 * @throws SocketsException
 *
 */
function socket_getsockname($socket, ?string &$address, ?int &$port = null): void
{
    error_clear_last();
    $result = \socket_getsockname($socket, $address, $port);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * Imports a stream that encapsulates a socket into a socket extension resource.
 *
 * @param resource $stream The stream resource to import.
 * @return resource Returns FALSE on failure.
 * @throws SocketsException
 *
 */
function socket_import_stream($stream)
{
    error_clear_last();
    $result = \socket_import_stream($stream);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * After the socket socket has been created
 * using socket_create and bound to a name with
 * socket_bind, it may be told to listen for incoming
 * connections on socket.
 *
 * socket_listen is applicable only to sockets of
 * type SOCK_STREAM or
 * SOCK_SEQPACKET.
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_addrinfo_bind
 * @param int $backlog A maximum of backlog incoming connections will be
 * queued for processing. If a connection request arrives with the queue
 * full the client may receive an error with an indication of
 * ECONNREFUSED, or, if the underlying protocol supports
 * retransmission, the request may be ignored so that retries may succeed.
 *
 * The maximum number passed to the backlog
 * parameter highly depends on the underlying platform. On Linux, it is
 * silently truncated to SOMAXCONN. On win32, if
 * passed SOMAXCONN, the underlying service provider
 * responsible for the socket will set the backlog to a maximum
 * reasonable value. There is no standard provision to
 * find out the actual backlog value on this platform.
 * @throws SocketsException
 *
 */
function socket_listen($socket, int $backlog = 0): void
{
    error_clear_last();
    $result = \socket_listen($socket, $backlog);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * The function socket_read reads from the Socket instance
 * socket created by the
 * socket_create or
 * socket_accept functions.
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_accept.
 * @param int $length The maximum number of bytes read is specified by the
 * length parameter. Otherwise you can use
 * \r, \n,
 * or \0 to end reading (depending on the mode
 * parameter, see below).
 * @param int $mode Optional mode parameter is a named constant:
 *
 *
 *
 * PHP_BINARY_READ (Default) - use the system
 * recv() function. Safe for reading binary data.
 *
 *
 *
 *
 * PHP_NORMAL_READ - reading stops at
 * \n or \r.
 *
 *
 *
 * @return string socket_read returns the data as a string on success (including if the remote host has closed the
 * connection). The error code can be retrieved with
 * socket_last_error. This code may be passed to
 * socket_strerror to get a textual representation of
 * the error.
 * @throws SocketsException
 *
 */
function socket_read($socket, int $length, int $mode = PHP_BINARY_READ): string
{
    error_clear_last();
    $result = \socket_read($socket, $length, $mode);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * The socket_recv function receives
 * length bytes of data in data from
 * socket. socket_recv can
 * be used to gather data from connected sockets. Additionally, one or
 * more flags can be specified to modify the behaviour of the
 * function.
 *
 * data is passed by reference, so it must be
 * specified as a variable in the argument list. Data read from
 * socket by socket_recv
 * will be returned in data.
 *
 * @param resource $socket The socket must be a Socket instance previously
 * created by socket_create().
 * @param string|null $data The data received will be fetched to the variable specified with
 * data. If an error occurs, if the
 * connection is reset, or if no data is
 * available, data will be set to NULL.
 * @param int $length Up to length bytes will be fetched from remote host.
 * @param int $flags The value of flags can be any combination of
 * the following flags, joined with the binary OR (|)
 * operator.
 * @return int socket_recv returns the number of bytes received,
 * or FALSE if there was an error. The actual error code can be retrieved by
 * calling socket_last_error. This error code may be
 * passed to socket_strerror to get a textual explanation
 * of the error.
 * @throws SocketsException
 *
 */
function socket_recv($socket, ?string &$data, int $length, int $flags): int
{
    error_clear_last();
    $result = \socket_recv($socket, $data, $length, $flags);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * The socket_recvfrom function receives
 * length bytes of data in data from
 * address on port port (if the
 * socket is not of type AF_UNIX) using
 * socket. socket_recvfrom can be
 * used to gather data from both connected and unconnected sockets.
 * Additionally, one or more flags can be specified to modify the behaviour of
 * the function.
 *
 * The address and port must be
 * passed by reference. If the socket is not connection-oriented,
 * address will be set to the internet protocol address of
 * the remote host or the path to the UNIX socket. If the socket is
 * connection-oriented, address is NULL. Additionally,
 * the port will contain the port of the remote host in
 * the case of an unconnected AF_INET or
 * AF_INET6 socket.
 *
 * @param resource $socket The socket must be a Socket instance previously
 * created by socket_create().
 * @param string|null $data The data received will be fetched to the variable specified with
 * data.
 * @param int $length Up to length bytes will be fetched from remote host.
 * @param int $flags The value of flags can be any combination of
 * the following flags, joined with the binary OR (|)
 * operator.
 * @param string|null $address If the socket is of the type AF_UNIX type,
 * address is the path to the file. Else, for
 * unconnected sockets, address is the IP address of,
 * the remote host, or NULL if the socket is connection-oriented.
 * @param int|null $port This argument only applies to AF_INET and
 * AF_INET6 sockets, and specifies the remote port
 * from which the data is received. If the socket is connection-oriented,
 * port will be NULL.
 * @return int socket_recvfrom returns the number of bytes received,
 * or FALSE if there was an error. The actual error code can be retrieved by
 * calling socket_last_error. This error code may be
 * passed to socket_strerror to get a textual explanation
 * of the error.
 * @throws SocketsException
 *
 */
function socket_recvfrom($socket, ?string &$data, int $length, int $flags, ?string &$address, ?int &$port = null): int
{
    error_clear_last();
    $result = \socket_recvfrom($socket, $data, $length, $flags, $address, $port);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param resource $socket
 * @param string|null $message
 * @param int $flags
 * @return int
 * @throws SocketsException
 *
 */
function socket_recvmsg($socket, ?string &$message, int $flags = 0): int
{
    error_clear_last();
    $result = \socket_recvmsg($socket, $message, $flags);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * socket_select accepts arrays of sockets and waits for
 * them to change status. Those coming with BSD sockets background will
 * recognize that those socket arrays are in fact the so-called file
 * descriptor sets. Three independent arrays of sockets are watched.
 *
 * @param resource[]|null $read The sockets listed in the read array will be
 * watched to see if characters become available for reading (more
 * precisely, to see if a read will not block - in particular, a socket
 * is also ready on end-of-file, in which case a
 * socket_read will return a zero length string).
 * @param resource[]|null $write The sockets listed in the write array will be
 * watched to see if a write will not block.
 * @param resource[]|null $except The sockets listed in the except array will be
 * watched for exceptions.
 * @param int|null $seconds The seconds and microseconds
 * together form the timeout parameter. The
 * timeout is an upper bound on the amount of time
 * elapsed before socket_select return.
 * seconds may be zero , causing
 * socket_select to return immediately. This is useful
 * for polling. If seconds is NULL (no timeout),
 * socket_select can block indefinitely.
 * @param int|null $microseconds
 * @return int On success socket_select returns the number of
 * sockets contained in the modified arrays, which may be zero if
 * the timeout expires before anything interesting happens.On error FALSE
 * is returned. The error code can be retrieved with
 * socket_last_error.
 * @throws SocketsException
 *
 */
function socket_select(?iterable &$read, ?iterable &$write, ?iterable &$except, ?int $seconds, ?int $microseconds = 0): int
{
    error_clear_last();
    $result = \socket_select($read, $write, $except, $seconds, $microseconds);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * The function socket_send sends
 * length bytes to the socket
 * socket from data.
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_accept.
 * @param string $data A buffer containing the data that will be sent to the remote host.
 * @param int $length The number of bytes that will be sent to the remote host from
 * data.
 * @param int $flags The value of flags can be any combination of
 * the following flags, joined with the binary OR (|)
 * operator.
 *
 * Possible values for flags
 *
 *
 *
 * MSG_OOB
 *
 * Send OOB (out-of-band) data.
 *
 *
 *
 * MSG_EOR
 *
 * Indicate a record mark. The sent data completes the record.
 *
 *
 *
 * MSG_EOF
 *
 * Close the sender side of the socket and include an appropriate
 * notification of this at the end of the sent data. The sent data
 * completes the transaction.
 *
 *
 *
 * MSG_DONTROUTE
 *
 * Bypass routing, use direct interface.
 *
 *
 *
 *
 *
 * @return int socket_send returns the number of bytes sent.
 * @throws SocketsException
 *
 */
function socket_send($socket, string $data, int $length, int $flags): int
{
    error_clear_last();
    $result = \socket_send($socket, $data, $length, $flags);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 *
 *
 * @param resource $socket
 * @param array $message
 * @param int $flags
 * @return int Returns the number of bytes sent.
 * @throws SocketsException
 *
 */
function socket_sendmsg($socket, array $message, int $flags = 0): int
{
    error_clear_last();
    $result = \socket_sendmsg($socket, $message, $flags);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * The function socket_sendto sends
 * length bytes from data
 * through the socket socket to the
 * port at the address address.
 *
 * @param resource $socket A Socket instance created using socket_create.
 * @param string $data The sent data will be taken from buffer data.
 * @param int $length length bytes from data will be
 * sent.
 * @param int $flags The value of flags can be any combination of
 * the following flags, joined with the binary OR (|)
 * operator.
 *
 * Possible values for flags
 *
 *
 *
 * MSG_OOB
 *
 * Send OOB (out-of-band) data.
 *
 *
 *
 * MSG_EOR
 *
 * Indicate a record mark. The sent data completes the record.
 *
 *
 *
 * MSG_EOF
 *
 * Close the sender side of the socket and include an appropriate
 * notification of this at the end of the sent data. The sent data
 * completes the transaction.
 *
 *
 *
 * MSG_DONTROUTE
 *
 * Bypass routing, use direct interface.
 *
 *
 *
 *
 *
 * @param string $address IP address of the remote host.
 * @param int $port port is the remote port number at which the data
 * will be sent.
 * @return int socket_sendto returns the number of bytes sent to the
 * remote host.
 * @throws SocketsException
 *
 */
function socket_sendto($socket, string $data, int $length, int $flags, string $address, int $port = null): int
{
    error_clear_last();
    if ($port !== null) {
        $result = \socket_sendto($socket, $data, $length, $flags, $address, $port);
    } else {
        $result = \socket_sendto($socket, $data, $length, $flags, $address);
    }
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * The socket_set_block function removes the
 * O_NONBLOCK flag on the socket specified by the
 * socket parameter.
 *
 * When an operation (e.g. receive, send, connect, accept, ...) is performed on
 * a blocking socket, the script will pause its execution until it receives
 * a signal or it can perform the operation.
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_accept.
 * @throws SocketsException
 *
 */
function socket_set_block($socket): void
{
    error_clear_last();
    $result = \socket_set_block($socket);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * The socket_set_nonblock function sets the
 * O_NONBLOCK flag on the socket specified by
 * the socket parameter.
 *
 * When an operation (e.g. receive, send, connect, accept, ...) is performed on
 * a non-blocking socket, the script will not pause its execution until it receives a
 * signal or it can perform the operation. Rather, if the operation would result
 * in a block, the called function will fail.
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_accept.
 * @throws SocketsException
 *
 */
function socket_set_nonblock($socket): void
{
    error_clear_last();
    $result = \socket_set_nonblock($socket);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * The socket_set_option function sets the option
 * specified by the option parameter, at the
 * specified protocol level, to the value pointed to
 * by the value parameter for the
 * socket.
 *
 * @param resource $socket A Socket instance created with socket_create
 * or socket_accept.
 * @param int $level The level parameter specifies the protocol
 * level at which the option resides. For example, to retrieve options at
 * the socket level, a level parameter of
 * SOL_SOCKET would be used. Other levels, such as
 * TCP, can be used by specifying the protocol number of that level.
 * Protocol numbers can be found by using the
 * getprotobyname function.
 * @param int $option The available socket options are the same as those for the
 * socket_get_option function.
 * @param int|string|array $value The option value.
 * @throws SocketsException
 *
 */
function socket_set_option($socket, int $level, int $option, $value): void
{
    error_clear_last();
    $result = \socket_set_option($socket, $level, $option, $value);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * The socket_shutdown function allows you to stop
 * incoming, outgoing or all data (the default) from being sent through the
 * socket
 *
 * @param resource $socket A Socket instance created with socket_create.
 * @param int $mode The value of mode can be one of the following:
 *
 * possible values for mode
 *
 *
 *
 * 0
 *
 * Shutdown socket reading
 *
 *
 *
 * 1
 *
 * Shutdown socket writing
 *
 *
 *
 * 2
 *
 * Shutdown socket reading and writing
 *
 *
 *
 *
 *
 * @throws SocketsException
 *
 */
function socket_shutdown($socket, int $mode = 2): void
{
    error_clear_last();
    $result = \socket_shutdown($socket, $mode);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}


/**
 * Exports the WSAPROTOCOL_INFO structure into shared memory and returns
 * an identifier to be used with socket_wsaprotocol_info_import. The
 * exported ID is only valid for the given process_id.
 *
 * @param resource $socket A Socket instance.
 * @param int $process_id The ID of the process which will import the socket.
 * @return string Returns an identifier to be used for the import
 * @throws SocketsException
 *
 */
function socket_wsaprotocol_info_export($socket, int $process_id): string
{
    error_clear_last();
    $result = \socket_wsaprotocol_info_export($socket, $process_id);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * Imports a socket which has formerly been exported from another process.
 *
 * @param string $info_id The ID which has been returned by a former call to
 * socket_wsaprotocol_info_export.
 * @return resource Returns a Socket instance on success
 * @throws SocketsException
 *
 */
function socket_wsaprotocol_info_import(string $info_id)
{
    error_clear_last();
    $result = \socket_wsaprotocol_info_import($info_id);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
    return $result;
}


/**
 * Releases the shared memory corresponding to the given info_id.
 *
 * @param string $info_id The ID which has been returned by a former call to
 * socket_wsaprotocol_info_export.
 * @throws SocketsException
 *
 */
function socket_wsaprotocol_info_release(string $info_id): void
{
    error_clear_last();
    $result = \socket_wsaprotocol_info_release($info_id);
    if ($result === false) {
        throw SocketsException::createFromPhpError();
    }
}
