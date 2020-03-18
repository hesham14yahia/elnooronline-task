<?php

use Carbon\Carbon;

// humanize datetime
if (!function_exists('humanize')) {

    function humanize($date)
    {
        return $date ?
            Carbon::parse($date)->diffForHumans() : null;
    }
}
