<?php

namespace App\Enums;

enum InstructionalLevel: string
{
    case Beginner = 'beginner';

    case Intermediate = 'intermediate';

    case Expert = 'expert';

    case All = 'all';

    public function label(): string
    {
        return match ($this) {
            self::Beginner => 'Trình độ cơ bản',
            self::Intermediate => 'Trình độ trung bình',
            self::Expert => 'Trình độ nâng cao',
            self::All => 'Tất cả',
        };
    }
}
