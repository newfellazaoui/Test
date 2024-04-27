<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Test</title>
</head>
<body>
    <h1>BONJOUR TOUT LE MONDE</h1>
    <?php
        
        $person = array(1 => array ("name"=>"AMine", "moy"=>7.8),
        2=> array ("name"=>"Newfel", "moy"=>18), 
        3 => array ("name"=>"Laredj", "moy"=>10.5) );

        function moyGen ($person){
            $total=0; 
            foreach ($person as $pers){
                $total+=$pers["moy"];
            }

            return $total/30;

        }
        
        function sup10($person) {
            $tab = array();
            foreach ($person as $pers){
                if ($pers["moy"] >= 10){
                    array_push($tab,$pers["moy"]);
                }
            }
            return $tab;
        }

        function exist20 ($person){
            foreach ($person as $pers){
                if ($pers["moy"] == 20)
                    return true;
                } 
             return false;
        }

        function Mnote ($person){
            $Pnote = $person[1]["moy"];
            foreach ($person as $pers){
                if ($Pnote<$pers["moy"])
                    $Pnote = $pers["moy"];
                //$Pnote = $Pnote<$pers["moy"]? $pers["moy"]:$Pnote;
            }
            return $Pnote;
        }


        //var_export(exist20($person));
    
    
        //print_r(sup10($person));

        // comments in one line
        /*
            comments in many lines
        */
        //print_r($person);
        //echo $person["name"]." ";
        //echo $person[1]["moy"];

      $pdo = new PDO ("mysql: host=localhost ; dbname=note_etudiant","root",""); 

      $note = $pdo -> query("select * from matiere");
      ?>
        <div style="text-align:center">

        <?php
      while($row = $note->fetch(PDO::FETCH_ASSOC)){
        echo "<a href='index.php?mat=".$row['CodeMat']."'>".$row['Libelle']."</a> | ";
      }
      echo '<br>';
      
        ?>
      <table border='1' style="+++++++margin:2rem auto">
        <thead>
            <tr>
                <td>nom</td>
                <td>prenom</td>
                <td>note</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $lebelle = $pdo->query('SELECT notation.*,etudaint.nom,etudaint.prenom from etudaint JOIN notation ON etudaint.NumEtu = notation.NumEtu WHERE notation.CodeMat = '.$_GET['mat']);
            while($row = $lebelle->fetch(PDO::FETCH_ASSOC)){
                echo '<tr>';
                    echo '<td>'.$row['nom'].'</td>';
                    echo '<td>'.$row['prenom'].'</td>';
                    echo '<td>'.$row['Note'].'</td>';
                echo '</tr>';
            }
            ?>
            
        </tbody>
      </table>
      <?php

      echo '</div>'; 
      print_r($_GET);
    ?>
<footer>
    copyright &copy; all right reserved
</footer>
   <script src="js/script.js"></script>
   <script>
    var x=8;
    let y=5;
    console.log(x)
   </script>
</body>
</html>
