<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MenuImport implements WithMultipleSheets, WithHeadingRow
{
    private $restaurantId;

    public function __construct($restaurantId)
    {
        $this->restaurantId = $restaurantId;
    }
    public function sheets(): array
    {
        return [
            'Makanan' => new MenuSheet1Import($this->restaurantId),
            'Minuman' => new MenuSheet2Import($this->restaurantId),
        ];
    }
}
