<?php
/* Environment options are either LOCAL and PRODUCTION in all caps. */
/* LOCAL environment deals with having an extra part in the URI when developing
   using XAMPP. */
/* e.g. localhost/project/home/index or 127.0.0.1/project/home/index */
/* Setting environment to LOCAL adjusts URI to only get home/index rather than project/home/index */
/* Setting environment to PRODUCTION lets the framework take everything after the hostname */
/* e.g. localhost, 127.0.0.1, or www.website.com */
$ENVIRONMENT = 'LOCAL';

/* Up to the user to implement database connection. */
/* MySQL connections are compatible. */
$DATABASE_CONNECTION = '';