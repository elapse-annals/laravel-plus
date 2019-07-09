<?php
/**
 * User: ben
 * Date: 19/6/4
 * Time: 17:54
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    /**
     * @param $where_between_array
     *
     * @return $this
     */
    public function whereBetweenArray($where_between_array)
    {
        foreach ($where_between_array as $where_key => $where_between) {
            $this->whereBetween($where_key, ...$where_between);
        }
        return $this;
    }

}