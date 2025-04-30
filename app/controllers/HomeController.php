<?php
class HomeController extends Controller {
    public function index() {
        // Redirect to product listing as default landing page
        $this->redirect('/product/index');
    }
}
