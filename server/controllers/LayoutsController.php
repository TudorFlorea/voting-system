<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tudor
 * Date: 7/23/17
 * Time: 3:03 AM
 * To change this template use File | Settings | File Templates.
 */

class LayoutsController {

    public function header($params = []) {
        render("views/layouts/header.php", $params);
    }

    public function footer($params = []) {
        render("views/layouts/footer.php", $params);
    }
}