<?php

namespace App\Enums;

enum LoanStatusEnum: string
{
    case Returned = 'returned';
    case Late = 'late';

    public function label(): string
    {
        return match($this) {
            self::Returned => 'Devolvido',
            self::Late => 'Atrasado',
        };
    }
}
