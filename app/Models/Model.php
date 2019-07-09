<?php
/**
 * User: ben
 * Date: 19/6/4
 * Time: 17:54
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Model
 *
 * @package App\Models
 */
class Model extends Eloquent
{
    /**
     * @param array $where_between_array
     *
     * @return $this
     */
    public function whereBetweenArray(array $where_between_array)
    {
        foreach ($where_between_array as $where_key => $where_between) {
            $this->whereBetween($where_key, ...$where_between);
        }
        return $this;
    }

    /**
     * @param array $where_between_array
     *
     * @return $this
     */
    public function orWhereBetweenArray(array $where_between_array)
    {
        foreach ($where_between_array as $where_key => $where_between) {
            $this->orWhereBetween($where_key, ...$where_between);
        }
        return $this;
    }

}