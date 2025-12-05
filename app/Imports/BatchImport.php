<?php

namespace App\Imports;

use App\Models\Batch;
use Maatwebsite\Excel\Concerns\ToModel;

class BatchImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Batch([
            'product_id' => $row[0],
            'exp_date' => $row[1]
        ]);
    }
}
