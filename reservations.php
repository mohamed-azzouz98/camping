<!DOCTYPE html>

<html>
    <head>
        <title>Réservation</title>
        <link rel="stylesheet" type="text/css" href="camping.css">
    </head>
    <body id="bodyReservation">
        <?php include('header.php'); ?>
        <main id="mainReservation">
                <?php

                    if (isset($_SESSION['login']))
                    {
                       if (!empty($_GET['emplacement']) and !empty($_GET['habitat'])) 
                       {
                           // date_default_timezone_set('Europe/Paris');

                            $connexion=mysqli_connect("Localhost","camping","camping123","camping");
                            $requetetarif = "SELECT jour,borne,disco,yfs FROM tarif";
                            $querytarif=mysqli_query($connexion,$requetetarif);
                            $resultattarif=mysqli_fetch_all($querytarif);

                            // DEFINITION TARIF PAR REQUETE BDD
                            $tarifjour=$resultattarif[0][0];
                            $tarifborne=$resultattarif[0][1];
                            $tarifdisco=$resultattarif[0][2];
                            $tarifyfs=$resultattarif[0][3];

                            ?>
                            
                            
                            
                            <section id="sectionFormReservation">


                                <form action="" method="post" id="formReservation">
                                    <label for="">Date de début du séjour : </label>
                                    <input type="date" name="datedebut"><br>
                                    <label for="">Date de fin du séjour : </label>
                                    <input type="date" name="datefin"><br>


                                    <br>
                                    Accès à la borne électrique (<?php echo $tarifborne; ?>€/jr)<input type="radio" name="borne" value="<?php echo $tarifborne ?>"><br><br>
                                    Accès au Disco-Club “ <i>Les girelles dansantes</i> ” (<?php echo $tarifdisco; ?>€/jr)<input type="radio" name="disco" value="<?php echo $tarifdisco ?>"><br><br>
                                    Accès aux activités Yoga, Frisbee et Ski Nautique (pack à <?php echo $tarifyfs; ?>€/jr)<input type="radio" name="yfs" value="<?php echo $tarifyfs ?>"><br><br><br>
                                    <input type="submit" name="valider">
                                </form>


                            
                      <?php 
                        } 
                        else{
                            echo '<div class="erreurResa">Veuillez passer par la page index pour reservé.</div>';
                        }                      
                        
                    }
                    else
                    {
                        header("location:connexion.php");
                        
                    }
                    ?>







                    <?php


                    if(isset($_POST['valider']))
                    {
                        if(isset($_POST['borne']))
                        {
                            $option1=$_POST['borne'];
                        }
                        else
                        {
                            $option1=0;
                        }
                        if(isset($_POST['disco']))
                        {
                            $option2=$_POST['disco'];
                        }
                        else
                        {
                            $option2=0;
                        }
                        if(isset($_POST['yfs']))
                        {
                            $option3=$_POST['yfs'];
                        }
                        else
                        {
                            $option3=0;
                        }

                           

                        if(!empty($_POST['datedebut']) and !empty($_POST['datefin']) and !empty($_GET['emplacement']) and !empty($_GET['habitat']))
                        {

                            // CONVERSION DATE EN SUITE DE NOMBRES
                            $dated=$_POST['datedebut'];
                            $datef=$_POST['datefin'];
                            $datedebut=strftime("%G%m%d", strtotime($dated));
                            $datefin=strftime("%G%m%d", strtotime($datef));

                            


                            $habitat=$_GET['habitat'];
                            $place=$_GET['emplacement'];

                            // ajout ligne momo
                            $dateDebut2 = strtotime($dated);
                            $dateFin2 = strtotime($datef);


                            $connexion=mysqli_connect("Localhost","camping","camping123","camping");
                           
                           $requetehabitat="SELECT habitat,datedebut,datefin,emplacement FROM reservationplace WHERE (emplacement='".$place."' AND $datedebut BETWEEN datedebut AND datefin) OR (emplacement='".$place."' and $datefin BETWEEN datedebut AND datefin) OR (emplacement='".$place."' and datedebut BETWEEN $datedebut AND $datefin AND datefin BETWEEN $datedebut AND $datefin) OR (emplacement='".$place."' and $datedebut BETWEEN datedebut AND datefin AND $datefin BETWEEN datedebut AND datefin)";

                            $queryhabitat=mysqli_query($connexion,$requetehabitat);
                            
                            $resultathabitat=mysqli_fetch_all($queryhabitat);
                            
                           

                            
                            $j=count($resultathabitat);
                            $placedispo=4;
                            $i=0;
                                while($i<$j)
                                {

                                    if($resultathabitat[$i][0]=="cpgcar")
                                    {
                                        
                                        $placedispo=$placedispo - 2;
                                        
                                        // echo '<div class="placeDispo">Il reste '.$placedispo.' de place disponible<br/><br/></div>';
                                        ++$i;

                                    }
                                    else
                                    {
                                        $placedispo=$placedispo - 1;
                                        //echo $resultat[$i][0].'<br/>';
                                        // echo '<div class="placeDispo">Il reste '.$placedispo.' de place disponible<br/><br/></div>';
                                        ++$i;
                                    }

                                    if($placedispo==0){
                                    break;
                                    }
                                }
                         

                            // CALCUL SOMME TOTAL DU SEJOUR
                            $duree = abs($dateFin2 - $dateDebut2)/60/60/24 ;
                            if($duree<1)
                            {
                                $duree=1;
                            }
                            $optiontotal= $option1 + $option2 + $option3;
                            $totalsejour=($optiontotal*$duree) + $duree*$tarifjour;


                            if(isset($_POST['borne']))
                            {
                                $_POST['borne']='oui';
                            }
                            else{
                                $_POST['borne']='non';
                            }
                            if(isset($_POST['disco']))
                            {
                                $_POST['disco']='oui';
                            }
                            else{
                                $_POST['disco']='non';
                            }
                            if(isset($_POST['yfs']))
                            {
                                $_POST['yfs']='oui';
                            }
                            else{
                                $_POST['yfs']='non';
                            }

                            
                            if($datedebut>date('Ymd')){

                                if($datefin>=$datedebut){



                                if(($placedispo>=2 and $_GET['habitat']=='cpgcar') or ($placedispo>=1 and $_GET['habitat']=='tente'))
                                {

                                    $connexion=mysqli_connect("Localhost","camping","camping123","camping");
                                    $requetereservation="INSERT INTO reservationplace (datedebut,datefin,emplacement,habitat,dureesejour,borne,disco,yfs,prixtotal,id_utilisateur) VALUES ('".$datedebut."','".$datefin."','".$place."','".$habitat."','".$duree."','".$_POST['borne']."','".$_POST['disco']."','".$_POST['yfs']."','".$totalsejour."','".$_SESSION['id']."') ";
                                    $queryreservation=mysqli_query($connexion,$requetereservation);

                                    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
                                    $dated=strftime('%d %B %Y',strtotime($datedebut));
                                    $datefin=strftime('%d %B %Y',strtotime($datefin));

                                    echo '<section class="infoResaUser">';
                                        echo '<br/>Reservation effectué'.'<br/>'.'<br/>';
                                        echo 'Date d\'entrée en camping : '.$dated.'<br/>';
                                        echo 'Lieu réservé : '.ucfirst($_GET['emplacement']).'<br/>';
                                        echo 'Type de logement : '.ucfirst($_GET['habitat']).'<br/>';
                                        echo 'Votre séjour est d\'une durée de '.$duree.' jours.'.'<br/>';
                                        echo 'Votre séjour vous coûtera la sommes de '.$totalsejour.'€.'.'<br/>'.'<br/>';
                                        echo '<a href="profil.php">Voir vos réservations</a><br/>';
                                    echo '</section>';
                                }
                                else
                                {
                                    echo '<div class="placeDispo">Il ne reste plus de place disponible à cette période et pour ce lieu : '.ucfirst($_GET['emplacement']).'<br/>'.'<br/></div>'; 
                                }
                            }
                            else{
                                echo '<div class="placeDispo">La date de réservation ne doit pas être inférieur à votre date d\'éntrée en camping'.'<br/></div>';
                            }

                            }
                            else{
                                echo '<div class="placeDispo">Vous ne pouvez pas réservé à une date ultérieur à celle d\'aujourdhui'.'<br></div>';
                            }

                            
                            
                        }
                        else
                        {
                            echo '<div class="placeDispo">Veuillez saisir les informations obligatoires'.'<br/></div>';
                        }


                    }


                        

                        




                    ?>
                    </section>
        </main>
        <?php include('footer.php'); ?>
    </body>
</html>