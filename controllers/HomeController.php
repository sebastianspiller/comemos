<?php
class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Willkommen bei ' . SITE_NAME,
            'description' => 'Ihre Community-Plattform für den Austausch und die Vernetzung.'
        ];
        
        $this->view('home/index', $data);
    }
} 