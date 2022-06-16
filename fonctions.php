<?php

function inscription()
{

if(!isset($_SESSION['login'])){


    if(isset($_POST['valider']))
    {
    
        if(!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirmpassword']) )
        {
    
            $connexion=mysqli_connect('localhost','root','','camping');
            $requete0="SELECT * FROM utilisateurs WHERE login='".$_POST['login']."'";
            $query0=mysqli_query($connexion,$requete0);
            $resultat0=mysqli_fetch_row($query0);
    
            if($resultat0==0)
            {
    
                if($_POST['password']==$_POST['confirmpassword'])
                {
                    $password=$_POST['password'];
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $requete= "INSERT INTO utilisateurs (login,password) VALUES ('".$_POST['login']."','".$hashed_password."')";
                    $query=mysqli_query($connexion,$requete);
                    header('location:connexion.php');

                }
        
                else
                {
                    echo '<div class="erreur">Mot de passe et confirmation de mot de passe différents.</div>'.'</br>';
                }
    
            }
    
            else
            {
                echo '<div class="erreur">Le login est déjà existant, merci de le modifier et de réessayer de nouveau.</div>'.'<br/>';
            }
    
        }
    
    else
        {
            echo '<div class="erreur">Veuillez remplir tous les champs.</div>'.'</br>';
        }
    
    }
}
else{ header('location:index.php');}



}








function connexion()

{
if(!isset($_SESSION['login'])){
    

    if(isset($_POST['valider']))
    {
        if(!empty($_POST['login']) and !empty($_POST['password']))
        {
            $connexion=mysqli_connect('Localhost','root','','camping');
            $requete= "SELECT Id,login,password FROM utilisateurs WHERE login='".$_POST['login']."'";
            $query=mysqli_query($connexion,$requete);
            $resultat=mysqli_fetch_row($query);

            $password=$_POST['password'];


            if($resultat==0)
            {
                    echo '<div class="erreur">Login inexistant</div>'.'<br/>';
            }

            else
            {
                if($_POST['login']==$resultat[1])
                {
                    if(password_verify($password, $resultat[2]))
                    {
                        session_start();
                        $_SESSION['id']=$resultat[0];
                        $_SESSION['login']=$resultat[1];
                        header('location:index.php');
                    }
                    else
                    {
                        echo '<div class="erreur">Mot de passe incorrecte</div>'.'<br/>';
                    }
                }

            }

        }
    }

}
else{ header('location:index.php');}

}



?>