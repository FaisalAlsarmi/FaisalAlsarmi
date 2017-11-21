<?php

class Home extends Controller {

    public function index($name = '') {		
        $user = $this->model('User');
		
		if (isset($_SESSION['name'])) {
			$message = 'You are awesome';

            $reminders = $this->model('Reminder');

            if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
                $list = $reminders->readAll();
            } else{
                $list = $reminders->get_reminders();
            }

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
