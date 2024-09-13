<?php

$inp=$_POST["text"];
$phoneNumber=$_POST['phoneNumber'];
// User 


$connect=new PDO("mysql:host=localhost;dbname=library","root","");
$stm1=$connect->prepare("SELECT * from users where phonenumber='$phoneNumber'");
$stm1->execute();
$ab=$stm1->fetchAll(PDO::FETCH_ASSOC);
$registered=count($ab);
$text_arrr=explode("*",$inp);
$pin=$ab[0]["pin"];
md5($text_arrr[0])==$pin?$ww=10:$ww=20;
if ($registered) {
   switch ($text_arrr[0]) {
        case "":
            echo "CON enter pin to continue";
            break;
        default:
            switch ($ww) {
                case 10:
                    if (count($text_arrr)>1) {
                        switch ($text_arrr[1]) {
                            case "":
                                echo "CON Welcome to e-library\n 1. view books available\n2. Borrow book\n 3. Return book";
                                break;
                            case 1:
                                view_books();
                                break;
                            case 2:
                                borrow_book($inp,$phoneNumber);
                                break;
                            case 3:
                                return_book($inp);
                                break;
                            default:
                                echo "invalid option";
                                break;
                        }
                    }
                    break;

                    
                default:
                    echo "invalid password";
                    break;
            }
            break;

    }  
}
else{
    switch ($text_arrr[0]) {
        case "":
            echo "CON Welcome to e-library\n 1. Register\n 2. view books available";
            break;
        case "1":
            register($text_arrr,$phoneNumber);
            break;
        case "2": 
            view_books();
            break;
           
        default:
            return "Invalid option. Please try again.";
            break;

    }   
}
// Function to handle user registration
function register($text_arr,$phone) {
    $levl=count($text_arr);
$name="";
$pin1="";
$pin2="";
    if ($levl==1) {
       echo "CON Enter name";
       $name=$text_arr[0];
    }
    if ($levl==2) {
        echo "CON Enter pin";
        
     }
    if ($levl==3) {
        echo "CON confirm pin";
     }
     if($levl==4){
        $uname=$text_arr[1];
        $pin1=$text_arr[2];
        $pin2=$text_arr[3];
        $md5=md5($pin2);
        if ($pin1==$pin2) {
            $connect=new PDO("mysql:host=localhost;dbname=library","root","");
            $stm=$connect->prepare("INSERT into users (phonenumber, uname, pin) values('$phone','$uname','$md5')");
            $stm->execute();
            echo "END registation success";
        }
        else{
            echo "END pin not match";
        }
     }
    

}


function borrow_book($text_array,$phonee) {
    global $phoneNumber;
    $connect=new PDO("mysql:host=localhost;dbname=library","root","");
    $stm=$connect->prepare("SELECT * from books where `status`='not_borrowed'");
    $stm->execute();
    $exp=explode("*",$text_array);
    $row=$stm->fetchAll(PDO::FETCH_ASSOC);
    $count=1;
    if (count($exp)==2) {
            echo "Available books:\n";
                echo  "\nCON Enter the number corresponding to the book you want to borrow.\n";
            foreach ($row as $book) {
                echo $book["ID"].". ".$book["bookname"]."\n";
        }
}
if (count($exp)==3) {
    $txt=$exp[2];
    $connect=new PDO("mysql:host=localhost;dbname=library","root","");
    $stm2=$connect->prepare("SELECT * from books where `status`='not_borrowed' and ID='$txt'");
    $stm2->execute();
    while  ($row2=$stm2->fetch(PDO::FETCH_ASSOC)) {
        $bname=$row2["bookname"];
        $isbn=$row2["ISBN"];
        $stm3=$connect->prepare("INSERT INTO borrowed_books(bookname, `ISBN`,`phone_number`) values('$bname','$isbn','$phoneNumber')");
        $stm3->execute();
        $stmx=$connect->prepare("UPDATE  books set  `status`='borrowed' where bookname='$bname'");
        $stmx->execute();
    }
echo "END book borrowed";
}
    




    
    
    
    

}

// // Function to handle returning a book
function return_book($text_array) {
    $exp=explode("*",$text_array);
    if (count($exp)==2) {
        echo "CON Enter the book name";
    }
    elseif (count($exp)==3) {
    $bname=$exp[2];
    $connect=new PDO("mysql:host=localhost;dbname=library","root","");
    $stm3=$connect->prepare("DELETE FROM borrowed_books where bookname='$bname'");
    $stm3->execute();
    $stmx=$connect->prepare("UPDATE  books set  `status`='not_borrowed' where bookname='$bname'");
    $stmx->execute();
    echo "END book returned";
    }
    
    
    
    
}

// // Function to view available books
function view_books() {
    global $available_books;
    global $row;
    echo "Available books:\n";
    $count=1;
    $connect=new PDO("mysql:host=localhost;dbname=library","root","");
    $stm=$connect->prepare("SELECT * from books");
    $stm->execute();
    $row=$stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $value) {
        echo $count.". ".$value["bookname"]."\n";
       $count++;
    }
 }



// // Main entry point
// $input = isset($_GET['input']) ? $_GET['input'] : "";
// echo handle_input($input);

// ?>
