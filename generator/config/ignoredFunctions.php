<?php
return [
    'array_key_exists',
    'is_executable',
    'is_uploaded_file',
    'stream_is_local',
    'is_soap_fault',
    // Type hints to object OCI-Lob (weird class that has a dash in its name!)
    'oci_lob_copy',
    'func_get_arg',
    //'mktime', // 7th parameter has been removed in PHP 7
    'call_user_func_array',
    'mb_check_encoding',
    'array_search',
    'forward_static_call',
    'forward_static_call_array',
    'readdir', // the documentation is false: the function returns false at the end of the iteration
    'apcu_delete', // apcu_delete returns false when the $key does not exist in the cache store
    'filter_has_var', // this function is meant to return a boolean
    'array_multisort', // this function is too buggy, see PR #113 on GitHub
    'bzdecompress', // Invalid documentation for parameter $use_less_memory
];
