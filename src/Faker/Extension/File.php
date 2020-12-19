<?php

namespace Faker\Extension;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * @experimental This interface is experimental and does not fall under our BC promise
 */
interface File extends Extension
{
    /**
     * Get a random MIME type
     *
     * @example 'video/avi'
     */
    public function mimeType(): string;

    /**
     * Get a random file extension (without a dot)
     *
     * @example avi
     */
    public function extension(): string;

    /**
     * Get a full path to a new real file on the system.
     */
    public function filePath(): string;
}
