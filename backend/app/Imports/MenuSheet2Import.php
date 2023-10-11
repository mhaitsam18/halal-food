<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
Use Maatwebsite\Excel\Concerns\WithStartRow;

class MenuSheet2Import implements ToModel, WithStartRow
{
    private $restaurantId;

    public function __construct($restaurantId)
    {
        $this->restaurantId = $restaurantId;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int{
        return 2;
    }

    public function model(array $row)
    {
        return new Menu([
            "restaurant_id" => $this->restaurantId,
            "name" => $row[0],
            "type" => 'Minuman',
            "price" => $row[1]
        ]);
    }
}
