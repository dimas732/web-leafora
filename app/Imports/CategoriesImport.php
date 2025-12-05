<?php

namespace App\Imports;

use App\Models\Categories;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categories([
            'name' => $row[0],
            'description' => $row[1]
        ]);
    }
}
