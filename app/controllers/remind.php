<?php

class Remind extends Controller {
    public function index($id = '') {
        $remind = $this->model('Reminder');

        if (isset($id)) {
            $data = $remind -> read($id);
            if(!isset($data[0])){
                $message = "No found record!";
            } else  {
                $message = "";
                $data = $data[0];
            }
            $this->view('remind/index', ['message' => $message, 'values' => $data]);

        } else {
            $this->view('home');
        }

    }

    public function remove ($id="") {
        $remind = $this->model('Reminder');
        $message = "";
        if (isset($id)) {
            $remind -> delete($id);
            $message = "Deleted successfully!";
            $list = $remind->readAll();

            $this->view('home/index', ['message' => $message, 'list' => $list]);
        } else{
            $message = "Cannot delete the record!";
            $this->view('home/index', ['message' => $message]);
        }


    }

	public function create () {
		$remind = $this->model('Reminder');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$subject = $_POST['subject'];
			$description = $_POST['description'];
            $remind->create($subject, $description, time(), 0, $_SESSION['name'] );
            $message = "Created record successfully!";
            $this->view('remind/createtemp', ['message' => $message]);
		} else {
            $this->view('remind/createtemp');
        }
	}

    public function update ($id="") {
        $remind = $this->model('Reminder');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $subject = $_POST['subject'];
            $description = $_POST['description'];
            $remind->update2($id, $subject, $description, time() );
            $message = "Updated record successfully!";
            $this->view('remind/updatetemp', ['message' => $message]);
        } else {
            if (isset($id)) {
                $this->view('remind/updatetemp', ['id' => $id]);
            }
        }
    }
}
