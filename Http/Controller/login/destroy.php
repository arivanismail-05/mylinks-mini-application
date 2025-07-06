<?php

use Core\Authenticator;

Authenticator::logout();

redirect('/login');