<?php

/*
 * NEVER TRACK THIS FILE IN A VERSION CONTROL SYSTEM AS IT CONTAINS SENSITIVE INFORMATION.
 *
 * We've included it in the repo under a non-usable name. You must remove "-REMOVEME" from the filename, such that the filename
 * is config.php
 *
 * We have added the required .gitignore exclusion. HOWEVER...if you change the path, you MUST update it.
 *
 */

return [
    'app_name' => 'YOUR_APP_NAME',
    'base_url' => 'https://YOUR-URL/',
	
    // 32 byte or more cryptographically secure secret that is not known to anyone but your application
    // For example, you could use the following in an external script to generate your token:
    // bin2hex(random_bytes(32));
    'encryption_key' => 'PUT_GENERATED_KEY_HERE',
	
    'lockable_datastore_type' => 'file', // file (...or redis eventually), used for blocking routes and session data
    'jobs_lockable_datastore_type' => 'file',
	
    'ip_param_name' => 'REMOTE_ADDR', // don't modify this unless you know that your server is receiving the client ip from a non-standard header
	
    'session' => [
        'web_client_name' => 'session_id', // name of the cookie where session token is stored for web routes
        'mobile_client_name' => 'Session-Id', // name of the custom http header used by mobile applications if so desired
        'rid_web_client_name' => 'remember_id', // name of cookie where remember token is stored for web routes if utilized
        'rid_mobile_client_name' => 'Remember-Id', // name of the custom http header used by mobile applications if so desired
        'directory' => __DIR__ . '/storage/system/sessions',
        // This is the duration (in seconds) in which the session_id is allowed to live for before being re-issued
        // to the user
        'valid_for' => 300, // 5min
        // The duration (in seconds) which a session_id remains active after having been re-issued to the user. This
        // mitigates issues where a user might have a bad connection and a new token is issued, but the response is
        // dropped. It also mitigates issues with race conditions where multiple requests could be in flight at the same
        // time, where the first request updates the session_id and begins writing to the new data store. Since the
        // in-flight requests would still contain the old session_id, if they were to attempt to update the session
        // data, they would be updating the old data store OR attempt to re-issue yet another session_id. The logic
        // within IdentityManager blocks all requests on the issued device_id, updates the session_id, then adds
        // the new session_id as a parameter within the data store of the old session_id. Each request first checks
        // this 'new_token' field in its data store before attempting to re-issue the token. If it exists, the
        // new token is used.
        'liminal_time' => 60,
        // The amount of time (in seconds) a user is allowed to be inactive before their session expires, requiring them
        // to re-authenticate via either username/password or remember_id token. This differs from 'valid_for'.
        // 'valid_for' is concerned with how long any token can be used whether the user is inactive or active for
        // security purposes. 'allowed_inactivity' dictates how long a user can go without making a request before
        // re-authentication is required. I hope that is clear.
        //
        // This value is also used when issuing browser cookies as the amount of time the token will remain in the
        // users browser data store, since if the allowed_inactivity period has expired, the token must be re-issued
        // and the user must re-authenticate either via username/password or remember_id
        //
        // This value is also used within the session garbage collector. Any session files existing within 'directory'
        // that have not been written to (since each request containing a session_id will update the session.last_used
        // property) within this amount of time will be deleted from the filesystem whenever the garbage collector is
        // run
        'allowed_inactivity' => 1200,
        // Whether to run the session_id garbage collector or not. If you want to handle session garbage collection via
        // external means such as a background job, set this to false, and the rest of the gc parameters will be ignored
        'use_garbage_collector' => true,
        // This property is utilized when 'use_garbage_collector' is set to true.
        'gc_probability' => 1, // percentage 0-100
        // Common cookie values to set for security reasons
        'cookie_secure' => true,
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax'
    ],
    'queue' => [
        'use_worker_queue' => true,
        'queue_workers' => 2,
        'queue_worker_lifetime' => 60, // time in seconds, default to 1hr
        'lockable_datastore_type' => 'file'
    ],
    'databases'  => [
        // Multiple database connections allowed, but first database in list must always be the default database,
        // ie the database which contains the tables utilized by the framework. Unless of course you are not using
        // any of the functionality which depends on the framework database tables (remember_ids, jobs, etc)
        [
            'host'  => 'localhost',
            'user'  => 'root',
            'pass'  => 'rootpass',
            'db'    => 'YOUR_DB_NAME'
        ]
    ],
    // mapping of 'mime/type' => 'ext' of any/all mime types you wish a client to be able to upload. Mimes must be added
    // here before the application will even attempt to run validation on them, meaning if you define within a form data
    // validator, a mime that's not included there, it will still fail because you did not first tell the application
    // that it is a potentially submittable mime type
    'allowed_file_upload_mimes' => [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
        'image/bmp' => 'bmp'
    ],
	
	// defined as an array<string, mixed> in AppConfig. Store your application specific configuration variables here
	'user_defined' => [

        

    ]
];