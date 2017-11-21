<?php

class Reports extends Controller {
    public function students() {
		 $this->view('reports/students');    
    }

    public function admin() {
        $this->view('reports/reports');
    }
}