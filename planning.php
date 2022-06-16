<!DOCTYPE html>

<html>
    <head>
        <title>Planning</title>
        <link rel="stylesheet" type="text/css" href="camping.css">
    </head>
    <body id="bodyPlanning">
        <?php include('header.php') ?>
        <main id="mainPlanning">
            <h1 id="titrePlanning">NOS RESERVATION</h1><br />
            <?php

                if(isset($_SESSION['login']))
                {

                    $connexion=mysqli_connect("Localhost","root","","camping");
                    $requete="SELECT * FROM reservationplace INNER JOIN utilisateurs ON reservationplace.id_utilisateur=utilisateurs.Id ORDER BY datedebut ASC";
                    $query=mysqli_query($connexion,$requete);
                    $resultat=mysqli_fetch_all($query);
                    

                    if(!empty($resultat))
                    {
                        $Id=$resultat[0][9];
                        
                    }
                    $nb_reservation=count($resultat);


                    $j=0;
                    foreach($resultat as $ligne)
                    {
                        $login=$ligne[1];
                        $datedebut=$ligne[1];
                        $datefin=$ligne[2];

                        setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
                        $datedebut=strftime('%d %B %Y',strtotime($datedebut));
                        $datefin=strftime('%d %B %Y',strtotime($datefin));

                        $emplacement=$ligne[3];
                        $habitat=ucfirst($ligne[4]);
                        $duree=$ligne[5];
                        $borne=ucfirst($ligne[6]);
                        $disco=ucfirst($ligne[7]);
                        $yfs=ucfirst($ligne[8]);
                        $id=$ligne[0];
                    ?> 
                        <section id="sectiontablePlanning">

                            <table class='tablePlanning'>
                            <thead>


                            <?php
                            if(isset($_SESSION['login']) && $_SESSION['login']=="admin")
                            {
                               echo "<td>Pseudo locataire</td>"; 
                            }
                            ?>

                                <td>Date d'entrée</td>
                                <td>Date de sortie</td>
                                <td>Lieu Campement</td>
                                <td>Type d'habitat</td>
                                <td>Durée du séjour</td>
                                <td>Option borne electrique</td>
                                <td>Option Acces Discothèque</td>
                                <td>Option Formule YFS</td>
                       
                                <?php
                            if(isset($_SESSION['login']) && $_SESSION['login']=="admin")
                            {
                               echo "<td>Réservations</td>"; 
                            }
                            ?>
                            </thead>
                            <tr>
                            <?php   
                            if(isset($_SESSION['login']) && $_SESSION['login'] == "admin")
                            {
                                ?> <td><h3 class="oui"><?php echo ucfirst($ligne[12]) ?></h3></td> <?php ;
                            }
                          
                            ?>
                                <td><?php echo $datedebut ?></td>
                                <td><?php echo $datefin ?></td>
                                <td><?php echo '<h2>'.ucfirst($emplacement).'</h2>' ?></td>
                                <td><?php if(isset($habitat) and $habitat=="Tente") echo $habitat; else echo 'Camping-car'?></td>
                                <td><?php if($duree==1){echo '<h2>'.$duree.' Jour</h2>' ;} if($duree>1 and $duree<7){ echo '<h2>'.$duree.' Jours</h2>' ;} if($duree==7){echo '<h2>'.'1 Semaine</h2>' ;}if($duree>7){echo '<h2>'.$duree.' Jour</h2>' ;} ?></td>
                                <td><?php if($borne=="Oui"){echo '<h3 class="oui">'.$borne.'</h3>';} else echo '<h3 class="non">'.$borne.'</h3>' ?></td>
                                <td><?php if($disco=="Oui"){echo '<h3 class="oui">'.$disco.'</h3>';} else echo '<h3 class="non">'.$disco.'</h3>' ?></td>
                                <td><?php if($yfs=="Oui"){echo '<h3 class="oui">'.$yfs.'</h3>';} else echo '<h3 class="non">'.$yfs.'</h3>' ?></td>
                            <?php
                            if(isset($_SESSION['login']) && $_SESSION['login'] == "admin")
                            {
                                echo "<td><a href='planning.php?id=$ligne[0]'>Supprimer la réservation<a></td>";
                            }
                            if(isset($_GET['id']) and !isset($_GET['pg'])){
                                $requete1="DELETE FROM reservationplace WHERE id='".$_GET['id']."'";
                                $query1=mysqli_query($connexion,$requete1);
                                header('location:planning.php');
                            }
                            ?>
                            
                            </tr>
                        </table><br/>
                        </section>
                        
                        <?php
                    }

                }
                else{
                    header('location:connexion.php');
                }


                ?>
        </main>
        <?php include('footer.php'); ?>
    </body>


</html>