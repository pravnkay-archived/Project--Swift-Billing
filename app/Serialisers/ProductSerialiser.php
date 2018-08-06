<?php
namespace App\Serialisers;

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Eloquent\Model;
use Cyberduck\LaravelExcel\Contract\SerialiserInterface;

class ProductSerialiser implements SerialiserInterface
{
    public function getData($data)
    {
        if ($data instanceof Model) {
            return $data->toArray();
        } elseif (is_array($data)) {
            return $data;
        } else {
            return get_object_vars($data);
        }
    }

    public function getHeaderRow()
    {
		$columns = Schema::getColumnListing('products');
		clock($columns);
		return $columns;	
	
    }
}
