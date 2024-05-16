<?php

class Controller
{
    private $_f3; //Fat-free Router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function roboticPet()
    {
        //Check if the form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //get the data
            $pet = $_POST['pet'];
            $color = $_POST['color'];
            $petChoice = $_POST['choice'];

            echo "post method";
            //validate the data
            if (empty($pet)) {
                echo "Please supply a pet type";
            } else {
                echo "get method";
                $this->_f3->set('SESSION.pet', $pet);
                $this->_f3->set('SESSION.color', $color);
                $this->_f3->set('SESSION.choice', $petChoice);

                $this->_f3->reroute('summary');

            }
        }

        //Render a view page
        $view = new Template();
        echo $view->render('views/pet-order.html');

    }

}