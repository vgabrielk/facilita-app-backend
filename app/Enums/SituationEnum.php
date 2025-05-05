<?php

namespace App\Enums;

enum SituationEnum: string
{
    case Available = 'available';
    case Borrowed = 'borrowed';

    public function label(): string
    {
        return match($this) {
            self::Available => 'Disponível',
            self::Borrowed => 'Emprestado',
        };
    }

    public static function options(): array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->label(),
        ], self::cases());
    }
}
