<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 22.10.2018
 * Time: 00:25
 */

namespace App\Models;


use App\Core\App;
use App\Core\Request;

class Poll
{
    private static $table = 'polls';
    private static $description_col = 'description';

    public static function all()
    {
        return App::get('database')->table_select(static::$table);
    }

    public static function create(Request $request)
    {
        $description = $request->post["description"];
        return App::get('database')
            ->insert(
                static::$table,
                [static::$description_col],
                [$description]
            );
    }

    public static function index($id)
    {
        return App::get('database')
            ->select_by_id(static::$table, $id);
    }
}