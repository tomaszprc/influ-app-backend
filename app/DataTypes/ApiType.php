<?php

namespace App\DataTypes;

abstract class ApiType {
    const COMPANIES = "annoucements";
    const INFLUENCERS = "INFLUENCER";

    const TYPES = [
        self::COMPANIES, self::INFLUENCERS, 
    ];
}