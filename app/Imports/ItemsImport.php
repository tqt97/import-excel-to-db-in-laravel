<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new item([
            'host'     => $row['host'],
            'risk'    => $row['risk'],
            'base' => $row['base'],
            'protocol'     => $row['protocol'],
            'port'    => $row['port'],
            'cve' => $row['cve'],
            'category_order'     => $row['category_order'],
            'name'    => $row['name'],
            'synopsis' => $row['synopsis'],
            'description'     => $row['description'],
            'solution'    => $row['solution'],
            'plugin' => $row['plugin'],
            'zone'     => $row['zone'],
            'site'    => $row['site'],
            'unit' => $row['unit'],
            'so' => $row['so'],
            'note' => $row['note'],
            'status' => $row['status'],
        ]);
    }
}
