<?php

namespace App\Helpers;

class PointsHelper
{
    public int $total = 0;
    public int $discounted_price = 0;
    public int $base_points = 0;
    public int $multiplier = 1;
    public int $user_points = 0;
    public array $group_ids = [1];
    public string $user_status = '';
    public string $user_status_title = 'Default';

    public function __construct()
    {
    }

    public function setValues($cart_total, $user_points, $group_ids = [1])
    {
        return false;
    }

    public function setPoints()
    {
        return false;
    }

    public static function exchangePoints($points_exchanged)
    {
        return false;
    }

    public function clearPointsSession()
    {
        return false;
    }

    public function isDiscountApplied()
    {
        return false;
    }

    public function getPoints()
    {
        return false;
    }

    public function getUserPoints()
    {
        return false;
    }

    public function calculateDiscountedPrice()
    {
        return false;
    }

    public function getPointsGained()
    {
        return false;
    }

    public function getMultiplier()
    {
        return false;
    }

    public function getPointsExhanged(): int
    {
        return false;
    }

    public function getPointsDiscountApplied()
    {
        return false;
    }

    public function displayUserGroup($group_name)
    {
        return 'TODO';
    }
}
