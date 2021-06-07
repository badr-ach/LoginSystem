<?php
class Pages extends Controller {
    public function index() {
        $data = ['title' => 'Home page'];
        $this->view('index', $data);
    }
    public function about() {
        $this->view('about');
    }
}
