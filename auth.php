<?php
require_once('header.php');
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['login']))
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
            $stmt->execute([$_POST['username'], $_POST['password']]);
            $user = $stmt->fetch();
            if($user)
            {
                if($user['active'] == 1)
                {
                    $_SESSION['user'] = $user;
                    header("Location: home.php");
                }
                else
                {
                    if(time() - $user['deactivate_time'] < 300)
                    {
                        $_SESSION['user'] = $user;
                        $sql = "UPDATE users SET active=?, deactivate_time=? WHERE id=?";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute([1, NULL, $user['id']]);
                        header("Location: home.php");
                    }
                    else
                    {
                        $_SESSION['errormsg'] = 'Account deactivated<br>';
                        header("Location: index.php");
                    }
                }
            }
            else
            {
                $_SESSION['errormsg'] = 'Invalid credentials<br>';
                header("Location: index.php");
            }
        }
    }

    if(isset($_POST['deactivate']))
    {
        $sql = "UPDATE users SET active=?, deactivate_time=? WHERE id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([0, time(), $_SESSION['user']['id']]);
        header("Location: logout.php");
    }
}