<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('statistik', function ($user) {
    return $user !== null;
});
