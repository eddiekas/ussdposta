<?php



include_once('db/connect.php');
//include_once('sessions/set.php');



        //$_SESSION['text'] = 'Inaworkkkkkkk!!!';

        $text        = $_REQUEST["text"];//= $_REQUEST["text"]; // = $_SESSION["text"];
        $sessionId   = $_REQUEST["sessionId"];
        $serviceCode = $_REQUEST["serviceCode"];
        $phoneNumber = $_REQUEST["phoneNumber"];

        $level = explode("*", $text);
        $count = count($level);
 //var_dump($level); // THIS DISPLAYS JUST ONE ARRAY WHICH IS THE LEVEL ONE... 
        //echo '<pre>';
             $levelss = (['level'=>$level]);  //THIS DISPLAYS 2 ARRAYS, AN ARRAY INSIDE THE LEVEL ARRAY...  the 'level' is a whole new array
            var_dump($levelss);
//   //var_dump(['level'=>$level]);
 var_dump(['count'=>$count]);
//         //if (isset($text)) {
//           //if ($text == ""){


             

//         //INVALID CHOICE. TRY AGAIN! THEN BRING BACK THE SAME PAGE!!!

             
     // $numbers= array_column($levelss, '2');   //this extracts the content, number, under levelss array depending on $levelss[012345] value in them....
     // print_r($numbers);
             //var_dump($numbers);

             //reset($numbers);




        
        if($level['0'] == 0 && $count == 1){  //when level is == zero or null then display the below... level == 0 as an element hence why count is 1. I think that's why... Null or 0 being a value...
        //id $level['0'] is changed to $level['8'] for example will prohibit further progress of the code due to no availability of level 8 in the code so its used as a form of assigning a variable or used as a key...


        //$level['0'] just use to show that its the 0 element of the array, $level['1'] the 1 element of that array. Basically used for reference purposes





          // foreach($level['0'] as $elements){
          //   if(is_null($elements)){

             $response  = "CON Welcome to Posta USSD services. \n";
             $response .= "1. Check Posta Box Details \n";    //without the RESPONSE .= ,then the latest RESPONSE OVERRIDES the previous RESPONSE.  
             $response .= "2. Enter personal details";

            
          // }else{
          //  $response = 'END Sorry! Please enter numeric values!'; 

             // $levels = array_column($level['0']);
             // print_r($levels);



          //   }
          // }  

             
/*
             "Get Box"
                    "Register"
                      "First Name"    //string to uppercase
                      "Second Name"
                      "National ID"
                    "Apply for Box"
                      "Area "

             "Pay Box"
                    "Enter ID"  //no need because this will
                      "Enter Phone Number"  //Probably better if somebody else wants to pay for someone elses box number.  
                      "Enter Box number"
                    "Alternative Payment"

              "Posta Balance"   //Is there really any reason for this.

              "Other Services"
                "Courier Services"
                  "Are you in my area?" //send link to phone number, but need to have phone number. 
                "Goods Received at Posta?"

              "FAQ"
                "How to get a Box number."
                "Rates for subscription and Renewal."
                "How to pay."
                ""


    */
          //  }
          //  elseif (!is_numeric($level['0']){
          //     $response = 'END Sorry! Please enter numeric values!'; 
          //       }
          
          


          // foreach($level['0'] as $elements){
          //   if(!is_numeric($elements)){
          //     $response = 'END Sorry! Please enter numeric values!'; 

          //   }
          // }




  
 //SELECTION 1  
          }     
          else if ($level['0'] == 1 && $count == 1){

              $response = "CON What details do you want? \n";
              $response .= "1.  Posta Box Number \n";        //The numbering doesn't matter at all.. 
              $response .= "2.  Posta Balance \n";
              $response .= "0.  Back \n";
              $response .= "99. Exit  ";  

          }
            else if($level['0'] == 1 && $count == 2 && $level['1'] == 1){  

              $response = 'CON Please enter your national id: ';

            }

            else if($level['0'] == 1 && $count == 3 && $level['1'] == 1 && (!empty($level['2']))){

               $national_id = $level['2'];

               $selectionquery = "SELECT `postaBoxNumber` FROM `tryout` WHERE `national_id` = '$national_id'";
              


            if ($dbaseresult=$db->query($selectionquery)){
               if($dbaseresult->num_rows) {

                while($rows = $dbaseresult->fetch_assoc()){
               
                 $postaBoxNumber = $rows['postaBoxNumber'];
                  //echo '<pre>';
                 $response = 'END Your Posta Box Number is '.$postaBoxNumber.'.';

                 


 
                  }
               }else{
                $response = 'END No such national id found in Posta Table.';
               }
            }


          

            }else if ($level['0'] == 1 && $count == 2 && $level['1'] == 2){

                $response = 'CON Please enter national id: ';

           
            }else if ($level['0'] == 1 && $count == 3 && $level['1'] == 2 && (!empty($level['2']))){

                $national_id = $level['2'];

                $selectionquery = "SELECT `postaBalance` FROM `tryout` WHERE `national_id` = '$national_id'";
              


            if ($dbaseresult=$db->query($selectionquery)){
               if($dbaseresult->num_rows) {

                while($rows = $dbaseresult->fetch_assoc()){
               
                 $postaBalance = $rows['postaBalance'];
                  //echo '<pre>';
                 $response = 'END Your Posta Balance is '.$postaBalance.'.';

                  }
               }else{
                $response = 'END No such national id found in Posta Table.';
               }
            }


//EXIT AND BACK CODE....
           } else if($level['0'] == 1 && $count == 2 && $level['1'] == 0){ //BACK CODE, need to come up with a better one.
                $response  = "CON Welcome to Posta USSD services. \n";
                $response .= "1. Check Posta Box Details. \n";    //without the RESPONSE .= ,then the latest RESPONSE OVERRIDES the previous RESPONSE.  
                $response .= "2. Enter additional details.";
                //$level['0'] && $level['1'] == " ";
                // $text == "";
                // $level = explode("*", $text);
                // $level['0'] == 0 && $level['1'] == "";
               // reset ($level['0'] == 0 && $count == 1;


           // $numbers= array_column($levelss, '1');   //this extracts the content, number, under levelss array depending on $levelss[012345] value in them....
           // print_r($numbers);
           // clear($numbers);
           // clear $text;


           // var_dump($levelss);

                //CLEAR OR RESET THE TEXT and level 0 and 1..... so that the procedure can start from scratch....

                // $diff = array_diff($level,'1');
                // print_r($diff);

  //  $level = array_slice($level, 0, $count-2);
 //               print_r($level);

               // echo is_array($level);  if TRUE it will show a 1...
                // echo is_array($text);

  //  echo "\n".$levelss['level'][1]."\n";  display LEVELSSLEVEL [1] ELEMENT...


  //     if(empty($level)){


  //                 $text        = " ";
  //                // current($text);
  //                 //$text        = $_REQUEST["text"];
  //                 echo "\n".$text."\n";
  // //                echo "\nlevel is empty bro!!\n";
  //               }
                // else{

                //   echo "\nlevel still has some stuff bro!!!\n";
                // }


               //when using \n they have to be in "" and not ''.
                // if(!empty($text)){
                //   echo "\ntext is not empty.... \n";

                //   $text        = $_REQUEST["text"] = " ";
                //  // unset($text);

                //   echo "\n".$text."\n";

                //  }else{
                //   echo "\n text is EMPTY! \n";

                //  }

               
                




            }

             else if($level['0'] == 1 && $count == 2 && $level['1'] == 99){ //BACK CODE, need to come up with a better one.
                $response  = "END Thank You for using Posta USSD services.";
            }



//SELECTION 2
            else if($level['0'] == 2 && $count == 1){
              $response = "CON Please enter details: \n";
              $response .= "1. Begin: \n";
              $response .= "0. Back \n";
              $response .= "99. Exit: ";

          }
            else if($level['0'] == 2 && $count == 2 && $level['1'] == 1){
              
              $response = "CON Please enter fullname: ";    //name is entered here...
            }

             else if($level['0'] == 2 && $count == 3 && $level['1'] == 1 && (!empty($level['2']))){  //count 3 after name is input 
              
              $response = "CON Please enter national id: ";            
            }

            else if($level['0'] == 2 && $count == 4 && $level['1'] == 1 && (!empty($level['2'])) && (!empty($level['3']))){   
              
              $response = "CON Please enter your area: ";
            }

            else if($level['0'] == 2 && $count == 5 && $level['1'] == 1 && (!empty($level['2'])) && (!empty($level['3'])) && (!empty($level['4']))){   
              $level['2'] = strtolower($level['2']);
              $level['2'] = ucwords($level['2']);


              $level['4'] = strtolower($level['4']);
              $level['4'] = ucwords($level['4']);
              //ucfirst() strtoupper() uppercase first letter and uppercase whole of string.

              $response = "END Thank you ".$level['2'].", your national id is ".$level['3']." and your area is ".$level['4'].".";

              sleep(1);

              //$phoneNumber = $_POST['phoneNumber'];
              $fullname = $level['2'];
              $national_id = $level['3'];
              $area = $level['4'];


              $withinquery = "INSERT INTO `tryout` (`id`, `phoneNumber`, `postaBoxNumber`, `postaBalance`, `fullname`, `area`, `national_id`, `created`) 
              VALUES (NULL, '$phoneNumber', '$postaBoxNumber', '$postaBalance', '$fullname', '$area', '$national_id', NOW())";

              $db->query($withinquery);

              // if (!$db->query($withinquery)){
              //   $response = 'END DB ERROR!!';

              // }




//EXIT AND BACK...
             }else if($level['0'] == 2 && $count == 2 && $level['1'] == 0){ //BACK CODE, need to come up with a better one.
                $response  = "CON Welcome to Posta USSD services. \n";
                $response .= "1. Check Posta Box Details. \n";    //without the RESPONSE .= ,then the latest RESPONSE OVERRIDES the previous RESPONSE.  
                $response .= "2. Enter additional details.";

              // unset($level[0]);
                //reset(["level"]=>$level['0']);
                // unset($count);
                // unset(array(2)[1]);
                // reset(array(2));
                // reset ($level);
                // reset ($level['0']);
                 //unset (["level"]=>$level[0]);
                //unset(['level'=>$level['1']]);

            }
             else if($level['0'] == 2 && $count == 2 && $level['1'] == 99){ //BACK CODE, need to come up with a better one.
                $response  = "END Thank You for using Posta USSD services.";
            }

           

          //     else if($level['0']==2 && $count == 3 && $level['1'] == 1 && (!empty($level['2']))){

          //       $response = "END Dear ".$level['2'].", Thanks For Registering.";
                

          // }else if($level['0'] == 2 && $count == 2 && $level['1'] == 2){
          //     $response = "CON Please enter your age: ";

          //   }else if($level['0'] == 2 && $count == 3 && $level['1'] == 2 && (!empty($level['2']))){


          //     $response = "END You are ".$level['2']." years old.";

          // }
          else{
            $response = 'END Errrrrrroooooorrrrrr!!!';
          }

            header('Content-type: text/plain');
            echo $response;
          //IF YOU PUT THE INSERT CODE HERE IT WILL PRINT IT 3 TIMES due to 3 elseifs and this part is outside all elseifs.... 
       

  








?>