<?php
/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 21.10.2018
 * Time: 23:14
 */

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;
use App\Models\Poll;

class PollController {

    public function all() {
        return json_response(Poll::all());
    }

    public function create(Request $request) {
        //header('Access-Control-Allow-Origin: *');
        return Poll::create($request);
    }

    public function about()
    {
        echo '[{"id":"1","description":"New Poll"},{"id":"2","description":"Another poll"}]';
    }

    public function us()
    {
        echo '[{"id":"1","description":"New Poll"}]';
    }


    public function index(Request $request) {
        return json_response(Poll::index($request->extras['id']));
    }
}