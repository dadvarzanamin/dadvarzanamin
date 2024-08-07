<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailgun\Model\Suppression\Unsubscribe;

use DateTimeImmutable;

/**
 * @author Sean Johnson <sean@mailgun.com>
 */
class Unsubscribe
{
    private $address;
    private $createdAt;
    private $tags = [];

    final private function __construct()
    {
    }

    /**
     * @throws \Exception
     */
    public static function create(array $data): self
    {
        $model = new static();
        $model->tags = $data['tags'] ?? [];
        $model->address = $data['address'] ?? null;
        $model->createdAt = isset($data['created_at']) ? new DateTimeImmutable($data['created_at']) : null;

        return $model;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }
}
