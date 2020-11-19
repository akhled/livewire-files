<?php

return [
    /**
     * Default store directory using laravel symbolic links
     * @see https://laravel.com/docs/8.x/filesystem#the-public-disk
     *
     * I assume you have: public_path('storage') => storage_path('app/public') under links property
     * in config/filesystems.php
     */
    'store_dir' => 'public',

    /**
     * Accept images only
     */
    'image' => false,

    /**
     * Accepted mimes type
     * ex: csv,txt,xlx,xls,pdf
     */
    'mimes' => null,

    /**
     * Max uploaded size
     */
    'max' => 102400
];