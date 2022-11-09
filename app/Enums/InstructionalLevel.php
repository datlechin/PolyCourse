<?php

namespace App\Enums;

enum InstructionalLevel: int
{
    case BEGINNER = 1;

    case INTERMEDIATE = 2;

    case EXPERT = 3;

    case ALL = 4;

    public function label(): string
    {
        return match ($this) {
            self::BEGINNER => 'Trình độ cơ bản',
            self::INTERMEDIATE => 'Trình độ trung bình',
            self::EXPERT => 'Trình độ nâng cao',
            self::ALL => 'Tất cả',
        };
    }
}
