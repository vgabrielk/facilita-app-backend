<?php

namespace App\Enums;

enum GenreEnum: string
{
    case Fiction = 'Fiction';
    case Romance = 'Romance';
    case Fantasy = 'Fantasy';
    case Adventure = 'Adventure';

    public function label(): string
    {
        return match($this) {
            self::Fiction => 'Ficção',
            self::Romance => 'Romance',
            self::Fantasy => 'Fantasia',
            self::Adventure => 'Aventura',
        };
    }
}
