<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case SISWA = 'siswa';

    public static function values(): array{
        return array_column(self::cases(), 'value');
    }

    public function label(): string{
        return ucfirst($this->value);
    }
}
