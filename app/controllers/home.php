<?php

class Home extends Controller {

    public function index($name = '') {		
        $user = $this->model('User');
		
		if (isset($_SESSION['name'])) {
			$message = 'You are awesome';

            $reminders = $this->model('Reminder');

            $list = $reminders->readAll();

            $this->view('home/index', ['message' => $message, 'list' => $list]);
		} else {
            $this->view('home/login');
		}

    }

    public function login($name = '') {
        $user = $this->model('User');
        $user->getTotalLoginToday();
        $this->view('home/login');
    }

}
