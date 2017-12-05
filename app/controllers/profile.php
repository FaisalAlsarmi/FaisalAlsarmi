<?php

class Profile extends Controller {
    public function index($id = '') {
        $profile = $this->model('MyProfile');

        if (!empty($_SESSION['name'])) {
            $data = $profile -> getProfiles();
            if(!isset($data[0])){
                $message = "No found record!";
            } else  {
                $message = "";
                $data = $data[0];
            }
            $this->view('profile/index', ['message' => $message, 'values' => $data]);

        } else {
            $this->view('home');
        }

    }

    public function remove ($id="") {
        $profile = $this->model('MyProfile');
        $message = "";
        if (isset($id)) {
            $profile -> delete($id);
            $message = "Deleted successfully!";
            $list = $profile->getProfiles();

            $this->view('profile/index', ['message' => $message, 'list' => $list]);
        } else{
            $message = "Cannot delete the record!";
            $this->view('profile/index', ['message' => $message]);
        }


    }
    function validateDate($date, $format = 'm-d-Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
	public function create () {
		$profile = $this->model('MyProfile');
        $user = $this->model('User');
        $provinces = $user->get_provinces();
        $province_select= '<select name="select" name="province" onchange="fetch_city(this.value);">';
        $province_select .= '<option value="">Select a province</option>';
        foreach ($provinces as $province) {
            $province_select .= '<option value="'. $province['ProvinceId'] .'">'.$province['ProvinceName'].'</option>';
        }
        $province_select.='</select>';
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_SESSION['name'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$birthdate = $_POST['birthdate'];
			$phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $note = $_POST['note'];
            $message = "";
            if(empty($firstname)){
                $message .= "Firstname must be not empty! <br>";
            }
            if(empty($lastname)){
                $message .= "Lastname must be not empty! <br>";
            }
            if(empty($birthdate)){
                $message .= "Birthday must be not empty! <br>";
            }else {
                if($this->validateDate($birthdate)){
                    //explode the date to get month, day and year
                    $birthDate = explode("-", $birthdate);
                    //get age from date or birthdate
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                        ? ((date("Y") - $birthDate[2]) - 1)
                        : (date("Y") - $birthDate[2]));
                    //echo "Age is:" . $age;
                    if($age < 18){
                        $message .= "Birthdate must be at least 18 years ago! <br>";
                    }
                } else{
                    $message .= "Birthday must be valid format (mm-dd-yyyy)! <br>";
                }
            }
            if(empty($phonenumber)){
                $message .= "Phone number must be not empty! <br>";
            }
            if(empty($email)){
                $message .= "Email must be not empty! <br>";
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $message .= ("$email is not a valid email address <br>");
                }
            }
            if(empty($message)){
                $profile->create($username, $birthdate, $phonenumber, $firstname, $lastname, $province, $city, $email, $note);
                $message = "Created record successfully! <br>";
                $this->view('profile/createtemp', ['message' => $message]);
            } else  {

                $this->view('profile/createtemp', ['message' => $message, 'username' => $username,
                                                        'birthdate' => $birthdate, 'phonenumber' => $phonenumber, 'firstname' => $firstname,
                                                        'lastname' => $lastname, 'email' => $email,
                                                        'province' => $province, 'city' => $city,
                                                         'note' => $note ]);
            }

		} else {
            $this->view('profile/createtemp', ['province_select' => $province_select]);
        }
	}
    public function fetch_city() {
        $user = $this->model('User');
        $province = $_REQUEST['get_province'];
        $cities = $user->get_cities($province);

        foreach ($cities as $city) {
            echo '<option value="'. $city['CityName'] .'">'.$city['CityName'].'</option>';
        }
    }

    public function update ($id="") {
        $remind = $this->model('MyProfile');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_SESSION['name'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $birthdate = $_POST['birthdate'];
            $phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $remind->update($username, $birthdate, $phonenumber, $firstname, $lastname, $email);
            $message = "Updated record successfully!";
            $this->view('profile/updatetemp', ['message' => $message]);
        } else {
            if (isset($id)) {
                $this->view('profile/updatetemp', ['id' => $id]);
            }
        }
    }
}
