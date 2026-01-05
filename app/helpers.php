<?php

// Application helper functions

if (! function_exists('app_name')) {
    /**
     * Get the application name from config or default string.
     *
     * @return string
     */
    function app_name(): string
    {
        return function_exists('config') ? config('app.name', 'Laravel') : 'Laravel';
    }
}

// Add other project helpers below as needed.
