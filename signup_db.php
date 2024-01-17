<?php
    session_start();
    require_once'config/db.php';
    if(isset($_POST['signup']))
    {
        $student_id=$_POST['student_id'];
        $password=$_POST['password'];

        if(empty($student_id))
        {
            $_SESSION['error']='plese fill student id';
            header("location:index.php");
        }
        elseif(empty($password))
        {
            $_SESSION['error']='plese fill password';
            header("location:index.php");
        }
        elseif(strlen($_POST['password']) >  20 || strlen($_POST['password']) < 5 )
        {
            $_SESSION['error']='password must be 5 - 20 letter';
            header("location:index.php");
        }
        else
        {
            try
            {
                $check_student_id = $conn->prepare("SELECT student_id FROM users WHERE student_id = :student_id");
                $check_student_id->bindParam(":student_id",$student_id);
                $check_student_id->execute();
                $row=$check_student_id->fetch(PDO::FETCH_ASSOC);
                if($row['student_id'] ==$student_id){
                    $_SESSION['warning']="Have this student id in system <a href = 'signin.php'>sign in</a> ";
                    header("location:index.php");
                }
                elseif(!isset($_SESSION['error']))
                {
                    $passwordHash=password_hash($password,PASSWORD_DEFAULT );
                    $stmt=$conn->prepare("INSERT INTO users(student_id,password) VALUES(:student_id,:password) ");
                    $stmt->bindParam(":student_id",$student_id);
                    $stmt->bindParam(":password",$passwordHash);
                    $stmt->execute();
                    $_SESSION['success']="signup success <a href= 'signin.php' class='alert-link'>sign in</a>";
                    header("location:index.php");
                }
                else
                {
                    $_SESSION['error']="something wrong";
                    header("location:index.php");
                    
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();


            }

        }



    }





?>