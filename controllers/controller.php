<?php

class Controller
{
    private $_f3; //Fat-free Router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function Pet()
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

                if($petChoice == "robotic"){
                    $this->_f3->reroute('robotic');
                }
                else{
                    $this->_f3->reroute('stuffed');
                }

            }
        }
        //Render a view page
        $view = new Template();
        echo $view->render('views/pet-order.html');
    }


    function stuffedPet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Get data
            $size = $_POST['size'];
            $material = $_POST['material'];

            // Validate data
            if (empty($size) || empty($material)) {
                echo "Please select size and material.";
            } else {
                $this->_f3->set('SESSION.size', $size);
                $this->_f3->set('SESSION.material', $material);

                // Reroute to stuffed pet summary page
                $this->_f3->reroute('/summary');
            }
        }

        // Render the form view page
        $view = new Template();
        echo $view->render('views/stuffed-pet-order.html');
    }
    function roboticPet()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            //get data
            $accessories = [];

            if (isset($_POST['extra_battery_packs']) && $_POST['extra_battery_packs'] == 'yes') {
                $accessories[] = 'Extra Battery Packs';
            }
            if (isset($_POST['charging_dock']) && $_POST['charging_dock'] == 'yes') {
                $accessories[] = 'Charging Dock/Station';
            }
            if (isset($_POST['voice_module']) && $_POST['voice_module'] == 'yes') {
                $accessories[] = 'Voice Module';
            }
            if (isset($_POST['camera_attachment']) && $_POST['camera_attachment'] == 'yes') {
                $accessories[] = 'Camera Attachment';
            }
            if (isset($_POST['remote_control']) && $_POST['remote_control'] == 'yes') {
                $accessories[] = 'Remote Control';
            }
            if (isset($_POST['custom_skins']) && $_POST['custom_skins'] == 'yes') {
                $accessories[] = 'Custom Skins';
            }
            if (isset($_POST['bluetooth_speaker']) && $_POST['bluetooth_speaker'] == 'yes') {
                $accessories[] = 'Bluetooth Speaker Module';
            }

            // Create a new RoboticPet object
            $roboticPet = new RoboticPet($accessories);

            // Store the object in the session
            $this->_f3->set('SESSION.roboticPet', $roboticPet);

            // Reroute to summary page
            $this->_f3->reroute('/summary');
        }

        // Render the form view page
        $view = new Template();
        echo $view->render('views/pet-order.html');
    }

}