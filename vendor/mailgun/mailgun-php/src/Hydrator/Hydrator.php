<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailgun\Hydrator;

use Mailgun\Exception\HydrationException;
use Psr\Http\Message\ResponseInterface;

/**
 * Deserialize a PSR-7 response to something else.
 */
interface Hydrator
{
    /**
     * @param class-string $class
     *
     * @throws HydrationException
     */
    public function hydrate(ResponseInterface $response, string $class);
}
