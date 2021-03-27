<?php

namespace App\Services;

/**
 * Class DataService
 *
 * @package App\Services
 */
class DateService extends Service
{
    /**
     * @param        $date
     * @param string $format
     *
     * @return bool
     */
    public static function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = date($format, strtotime($date));
        if ($d > 1970) {
            return ture;
        }
        return false;
    }

    /**
     * @param        $date
     * @param string $type
     *
     * @return false|string
     */
    public static function format($date, $type = 'underline')
    {
        switch ($type) {
            case   'underline':
                $date_type = 'Y-m-d';
                break;
            case   'time_only':
                $date_type = 'His';
                break;
            default:
                $date_type = 'Ymd';

        }
        return date($date_type, strtotime($date));
    }

}
