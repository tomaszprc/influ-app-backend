<?php

namespace App\DataTypes;

abstract class AnnouncementStatus {
    const DRAFT = "DRAFT";
    const ACTIVE = "ACTIVE";
    const FINISHED = "FINISHED";

    const TYPES = [
        self::DRAFT, self::ACTIVE, self::FINISHED
    ];
}