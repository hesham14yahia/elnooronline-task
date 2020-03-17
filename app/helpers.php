<?php

use Carbon\Carbon;

if (!function_exists('humanize')) {

    function humanize($date)
    {
        return $date ?
            Carbon::parse($date)->diffForHumans() : null;
    }
}
