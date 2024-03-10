<?php

namespace App\DataTypes;

abstract class UserType {
    const COMPANY = "COMPANY";
    const INFLUENCER = "INFLUENCER";

    const TYPES = [
        self::COMPANY, self::INFLUENCER, 
    ];
}