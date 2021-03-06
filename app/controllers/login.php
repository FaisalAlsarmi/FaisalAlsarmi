<?php

class Login extends Controller {
    public function index() {
        $user = $this->model('User');
        $profile = $this->model('MyProfile');

        if (isset($_POST['username'])) {
            $user->username = $_POST['username'];
        }

        if (isset($_POST['password'])) {
            $user->password = $_POST['password'];
        }

        $user->authenticate();

        if ($user->auth == TRUE) {
            $_SESSION['auth'] = true;
            // check profile
            $row = $profile->getProfiles();
            if (!$row) {
                header('Location: /profile/create');
                exit();
            }
        }
        
        header('Location: /home');
    }
	
	public function register () {
		$user = $this->model('User');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$user->register($username, $password);
			$_SESSION['auth'] = true;
		}
		
		$this->view('home/register');
	}
}
