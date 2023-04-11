<?php
include('conn2.php');
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

?>

<!DOCTYPE html>
<html>
<title>Formulaire</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<form id="id01" action="" class="w3-card w3-pale-yellow"  method="POST">

<button onclick="document.getElementById('id01').style.display='none'"
class="w3-btn w3-right w3-large w3-hover-red w3-clear">X</button>

<div class="w3-clear"></div>

<div class="w3-container"> 
<h2>Add/modify Data</h2>

<p>
<input class="w3-input" type="text" name="titre"  >
<label>Titre</label></p>

<p>
<input class="w3-input" type="text" name="titre2"  >
<label>Titre nouvel</label></p>



<p>
<input class="w3-input" type="text" name="domain"  >
<label>Domain</label></p>
<p>
<input class="w3-input" type="text" name="domain2"  >
<label>N Domain</label></p>

<p>
<input class="w3-input" type="text" name="desc" >
<label>description</label></p>

<p>
<input class="w3-input" type="text" name="desc2" >
<label>Novel description</label></p>

<p>
<input  class="w3-input" type="text"  name="cepage" >
<label>cepage</label></p>

<p>
<input  class="w3-input" type="text"  name="cepage2" >
<label>N cepage</label></p>


<p>
<input  class="w3-input" type="text"  name="millesime" >
<label>Millesime</label></p>

<p>
<input  class="w3-input" type="text"  name="millesime2" >
<label> N Millesime</label></p>

<p>
<input  class="w3-input" type="text"  name="format" >
<label>format</label></p>

<p>
<input  class="w3-input" type="text"  name="format2" >
<label>N format</label></p>

<p>
<input class="w3-input" type="text" name="prix" >
<label>prix</label></p>

<p>
<input class="w3-input" type="text" name="prix2" >
<label>N prix</label></p>

<p>
<input class="w3-input" type="text" name="nbr" >
<label>nombre les row prix pour la table</label></p>

<p>
<input class="w3-input" type="text" name="nbr2" >
<label>N nombre les row prix pour la table</label></p>




<br><br><br><br><br>

<p> <button class="w3-btn w3-block w3-black w3-large w3-hover-red" type="submit" name="add">add data</button></p>
<br><br><br><br><br>
<p> <button class="w3-btn w3-block w3-black w3-large w3-hover-blue" type="submit" name="alter">modify data</button></p>

<br><br><br><br><br>
<p> <button class="w3-btn w3-block w3-black w3-large w3-hover-white" type="submit" name="delete">delete data</button></p>


</div>

</form>

    
    
    
 <?php

    
     $titre =@$_POST['titre'];
     $titre2 =@$_POST['titre2'];
     
     $domain =@$_POST['domain'];
     $domain2 =@$_POST['domain2'];
     
     $desc =@$_POST['desc'];
     $desc2 =@$_POST['desc2'];
     
    
     $cepage =@$_POST['cepage'];
     $cepage2 =@$_POST['cepage2'];
     
     $format =@$_POST['format'];
     $format2 =@$_POST['format2'];
     
     $millesime =@$_POST['millesime'];
     $millesime2 =@$_POST['millesime2'];
     
     $prix =@$_POST['prix'];
     $prix2 =@$_POST['prix2'];

     $n =@$_POST['nbr'];
     $n2 =@$_POST['nbr2'];
     
     
     
  
     /*
     
       if (  $millesime == ""  ){
            $millesime =NULL;
       }
      *  if ( $format == ""  ){
            $format =NULL;
       }
      
       
       
      */ 
        
        $conn = $pdo->query("SELECT * from titre WHERE Titre ='".(string)$titre."'");				
	$conn->setFetchMode(PDO::FETCH_CLASS, 'Titre');
	$res = $conn->fetch();
      
       // echo $res;
        
        $conn2 = $pdo->query("SELECT * from titre WHERE Titre ='".(string)$titre2."'");				
	$conn2->setFetchMode(PDO::FETCH_CLASS, 'Titre');
	$res2 = $conn2->fetch();
        
        $connd = $pdo->query("SELECT * from domain WHERE Domain ='".$domain."'");				
	$connd->setFetchMode(PDO::FETCH_CLASS, 'Domain');
	$resd = $connd->fetch();
        //echo "domaine";
       // echo $resd;
        
         $connd2 = $pdo->query("SELECT * from domain WHERE Domain ='".$domain2."'");				
	$connd2->setFetchMode(PDO::FETCH_CLASS, 'Domain');
	$resd2 = $connd2->fetch();
        
        $connc = $pdo->query("SELECT * from cepage WHERE cepage ='".$cepage."'");				
	$connc->setFetchMode(PDO::FETCH_CLASS, 'Cepage');
	$resc = $connc->fetch();
        //echo $resc;
        
        
        $connc2 = $pdo->query("SELECT * from cepage WHERE cepage ='".$cepage2."'");				
	$connc2->setFetchMode(PDO::FETCH_CLASS, 'Cepage');
	$resc2 = $connc2->fetch();
        
        
         $connm = $pdo->query("SELECT * from Millesime WHERE Mill ='".$millesime."'");				
	$connm->setFetchMode(PDO::FETCH_CLASS, 'Millesime');
	$resm = $connm->fetch();
       // echo $resm;
        
        
        $connm2 = $pdo->query("SELECT * from Millesime WHERE Mill ='".$millesime2."'");				
	$connm2->setFetchMode(PDO::FETCH_CLASS, 'Millesime');
	$resm2 = $connm2->fetch();
       
        
         $connf = $pdo->query("SELECT * from format WHERE format ='".$format."'");				
	$connf->setFetchMode(PDO::FETCH_CLASS, 'Format');
	$resf = $connf->fetch();
       // echo $resf;
        
        
        $connf2 = $pdo->query("SELECT * from format WHERE format ='".$format2."'");				
	$connf2->setFetchMode(PDO::FETCH_CLASS, 'Format');
	$resf2 = $connf2->fetch();
        
         $connde = $pdo->query("SELECT * from produit WHERE Descp ='".$desc."'");				
	$connde->setFetchMode(PDO::FETCH_CLASS, 'Produit');
	$resde = $connde->fetch();
        //echo $resde;
        
         $connde2 = $pdo->query("SELECT * from produit WHERE Descp ='".$desc2."'");				
	$connde2->setFetchMode(PDO::FETCH_CLASS, 'Produit');
	$resde2 = $connde2->fetch();
        
        $connp = $pdo->query("SELECT * from prix WHERE prix ='".(double)$prix."'");				
	$connp->setFetchMode(PDO::FETCH_CLASS, 'Prix');
	$resp = $connp->fetch();
        //echo $resp;
        
        
         $connp2 = $pdo->query("SELECT * from prix WHERE prix ='".(double)$prix2."'");				
	$connp2->setFetchMode(PDO::FETCH_CLASS, 'Prix');
	$resp2 = $connp2->fetch();
        
       
        
        $connn = $pdo->query("SELECT * from nbr_row_tanl WHERE nb_row ='".(int)$n."'");				
	$connn->setFetchMode(PDO::FETCH_CLASS, 'Nbr_row_tanl');
	$resn = $connn->fetch();
        
        $connn2 = $pdo->query("SELECT * from nbr_row_tanl WHERE nb_row ='".(int)$n2."'");				
	$connn2->setFetchMode(PDO::FETCH_CLASS, 'Nbr_row_tanl');
	$resn2 = $connn2->fetch();
        
        $conrel = $pdo->query("SELECT * from relation WHERE `Id_titre` = '".$res->Id_titre."'and  `Id_domain` ='".$resd->Id_domain."' and `Id_produit` = '".$resde->Id_produit."' and  `Id_mill` = '".$resm->Id_mill."' and   `Id_cep` = '".$resc->Id_cep."' and Id_format= '".$resf->Id_format."'  and nbr_row_table = '".$n."' ");				
	$conrel->setFetchMode(PDO::FETCH_CLASS, 'Relation');
	$resre = $conrel->fetch();
       // echo $resre;
         
       //echo 'resltass';
         
       /////////////////////////////////////////////////////////////////////////////////////////////////::
        
       
       if(isset($_POST['delete'])){ 
       if($resre == true){
           $conn = $pdo->query("DELETE from  relation where ID = '".$resre->ID."' ");
       }}
       
       
    if(isset($_POST['alter'])){ 
        if($resre == true){
      
       
    
      if ($res2 == false and $titre2 != "" ){
	$conne = $pdo->query("INSERT INTO Titre VALUES ('".$titre2."') ");
	 
        }
        
      if ($resd2 == false and $domain2 != ""){
	
        $conn = $pdo->query("SELECT * from titre WHERE Titre ='".$titre."'");				
	$conn->setFetchMode(PDO::FETCH_CLASS, 'Titre');
	$res = $conn->fetch();
       
       $conn2 = $pdo->query("INSERT INTO domain (Domain,Id_titre ) VALUES ('".$domain2."','".$res->Id_titre."') ");
            
        }
        
        if ($resn2 === false and $n2 != ""){
        $conn1 = $pdo->query("INSERT INTO  nbr_row_tanl (domain,nb_row ) VALUES ('".$domain2."','".$n2."') ");
        }
       
        
       //echo $resde2;
       //echo $desc2;
        if ($resde2 == false and $desc2 != ""){
        //echo' ddddddddddddescc';
        $conn = $pdo->query("INSERT INTO produit (Descp,Id_domain) VALUES ('".$desc2."','".$resd->Id_domain."' ) ");
	        
        
        
          
        }
       
        
        if ($resc2 == false and $cepage2 != ""){
	$conn = $pdo->query("INSERT INTO cepage (cepage ) VALUES ('".$cepage2."') ");
        }
     
        if ($resm2 === false and $millesime2 !=""){
	$conn2 = $pdo->query("INSERT INTO millesime (Mill)  VALUES ('".$millesime2."') ");
	      
        }
        
        if ($resf2 === false and $format2 != ""){
        $conn = $pdo->query("INSERT INTO format (format) VALUES ('".$format2."') ");
	       
        }
        
         if ($resp2 === false and $prix2 != ""){
	$conn = $pdo->query("INSERT INTO prix (prix) VALUES ('".(double)$prix2."') ");
	       
         }
          
      
        if ( $titre2 != "" ){
          
       
        $conn = $pdo->query("SELECT * from titre WHERE Titre ='".(string)$titre2."'");				
	$conn->setFetchMode(PDO::FETCH_CLASS, 'Titre');
	$res = $conn->fetch();
       
         $conn2 = $pdo->query("UPDATE relation  SET Id_titre = '".$res->Id_titre."'  where ID = '".$resre->ID."' ");
        }

        if ($domain2 != ""){
            
        $connd = $pdo->query("SELECT * from domain WHERE Domain ='".$domain2."'");				
	$connd->setFetchMode(PDO::FETCH_CLASS, 'Domain');
	$resd = $connd->fetch(); 
        $conn2 = $pdo->query("UPDATE relation  SET Id_domain = '".$resd->Id_domain."'  where ID = '".$resre->ID."' ");

        }
        
                
        
        
        if ( $desc2 != NULL){
            
            $connde = $pdo->query("SELECT * from produit WHERE Descp ='".$desc2."'");				
            $connde->setFetchMode(PDO::FETCH_CLASS, 'Produit');
            $resde = $connde->fetch();
            $conn2 = $pdo->query("UPDATE relation  SET Id_produit = '".$resde->Id_produit."'  where ID = '".$resre->ID."' ");
            //echo 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj';
        }

        
        
        
   
        
        if ($cepage2 != ""){
            $connc = $pdo->query("SELECT * from cepage WHERE cepage ='".$cepage2."'");
            $connc->setFetchMode(PDO::FETCH_CLASS, 'Cepage');
            $resc = $connc->fetch();
            //echo $resc;
            $conn2 = $pdo->query("UPDATE relation  SET Id_cep = '".$resc->Id_cep."'  where ID = '".$resre->ID."' ");
          
        }
        
        
         if ($millesime2 != ""){
            //echo $millesime2;
            $connm = $pdo->query("SELECT * from Millesime WHERE Mill ='".$millesime2."'");				
            $connm->setFetchMode(PDO::FETCH_CLASS, 'Millesime');
            $resm = $connm->fetch();
            $conn2 = $pdo->query("UPDATE relation  SET Id_mill = '".$resm->Id_mill."'  where ID = '".$resre->ID."' ");
              
        }
        
        
        if ($format2 != ""){
           // echo $format2;
            $connf = $pdo->query("SELECT * from format WHERE format ='".$format2."'");				
            $connf->setFetchMode(PDO::FETCH_CLASS, 'Format');
            $resf = $connf->fetch();
            $conn2 = $pdo->query("UPDATE relation  SET Id_format = '".$resf->Id_format."'  where ID = '".$resre->ID."' ");
        
        }
        
        if ($prix2 != ""){
            //echo $prix2;
            $connp = $pdo->query("SELECT * from prix WHERE prix ='".(double)$prix2."'");				
            $connp->setFetchMode(PDO::FETCH_CLASS, 'Prix');
            $resp = $connp->fetch();
        
            
            $conn2 = $pdo->query("UPDATE relation  SET Id_prix = '".$resp->Id_prix."'  where ID = '".$resre->ID."' ");
              
        }
        
    
        
        
    } else {
        echo 'linge non trouver';
    }
    
    
    
    }
 

 
        
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     
        if(isset($_POST['add'])){ 

            
        
        
	if ($res === false and $titre != "" ){
         
	$conne = $pdo->query("INSERT INTO Titre VALUES ('".$titre."') ");
	 
        }
      
        
        if ($resd === false and $domain != ""){
	
        $conn = $pdo->query("SELECT * from titre WHERE Titre ='".$titre."'");				
	$conn->setFetchMode(PDO::FETCH_CLASS, 'Titre');
	$res = $conn->fetch();
       
       $conn2 = $pdo->query("INSERT INTO domain (Domain,Id_titre ) VALUES ('".$domain."','".$res->Id_titre."') ");
            
        }
      
        if ($resn === false and $n != ""){
        $conn1 = $pdo->query("INSERT INTO  nbr_row_tanl (domain,nb_row ) VALUES ('".$domain."','".$n."') ");
        }
       
        
       
        if ($resde == false and $desc != ""){
       
        $conn = $pdo->query("INSERT INTO produit (Descp,Id_domain) VALUES ('".$desc."','".$resd->Id_domain."' ) ");
	        
        }
       
        
        if ($resc === false and $cepage != ""){
	$conn = $pdo->query("INSERT INTO cepage (cepage ) VALUES ('".$cepage."') ");
        }
     
        if ($resm === false and $millesime !=""){
	$conn = $pdo->query("INSERT INTO millesime (Mill)  VALUES ('".$millesime."') ");
	      
        }
        
        if ($resf === false and $format != ""){
        $conn = $pdo->query("INSERT INTO format (format) VALUES ('".$format."') ");
	       
        }
        
         if ($resp === false and $prix != ""){
	$conn = $pdo->query("INSERT INTO prix (prix) VALUES ('".(double)$prix."') ");
	       
         }
          
        $conn = $pdo->query("SELECT * from titre WHERE Titre ='".$titre."'");				
	$conn->setFetchMode(PDO::FETCH_CLASS, 'Titre');
	$res = $conn->fetch();
        
        
        $connd = $pdo->query("SELECT * from domain WHERE Domain ='".$domain."'");				
	$connd->setFetchMode(PDO::FETCH_CLASS, 'Domain');
	$resd = $connd->fetch();
        
        $connc = $pdo->query("SELECT * from cepage WHERE cepage ='".$cepage."'");				
	$connc->setFetchMode(PDO::FETCH_CLASS, 'Cepage');
	$resc = $connc->fetch();
        
         $connm = $pdo->query("SELECT * from Millesime WHERE Mill ='".$millesime."'");				
	$connm->setFetchMode(PDO::FETCH_CLASS, 'Millesime');
	$resm = $connm->fetch();
        
         $connf = $pdo->query("SELECT * from format WHERE format ='".$format."'");				
	$connf->setFetchMode(PDO::FETCH_CLASS, 'Format');
	$resf = $connf->fetch();
        
         $connde = $pdo->query("SELECT * from produit WHERE Descp ='".$desc."'");				
	$connde->setFetchMode(PDO::FETCH_CLASS, 'Produit');
	$resde = $connde->fetch();
        
        $connp = $pdo->query("SELECT * from prix WHERE prix ='".(double)$prix."'");				
	$connp->setFetchMode(PDO::FETCH_CLASS, 'Prix');
	$resp = $connp->fetch();
        
        $connn = $pdo->query("SELECT * from nbr_row_tanl WHERE nb_row ='".$n."'");				
	$connn->setFetchMode(PDO::FETCH_CLASS, 'Nbr_row_tanl');
	$resn = $connn->fetch();
         
        
        
        /*
        echo "\n id titre ";
         echo $res->Id_titre;
         echo "\n id domain";
         echo $resd->Id_domain;
         echo "\n id desc";
         echo $resde->Id_produit;
         echo "\n id cep";
         echo $resc->Id_cep;
         echo " \n id mill";
         echo $resm->Id_mill;
         echo " \n id prix";
         echo $resp->Id_prix;
          echo "\n id nombre \n";
         echo $resn->nb_row;
         
       */
         
     
         
        $conrel = $pdo->query("SELECT ID from relation WHERE `Id_titre` = '".(int)$res->Id_titre."'and  `Id_domain` ='".$resd->Id_domain."' and `Id_produit` = '".$resde->Id_produit."' and  `Id_mill` = '".$resm->Id_mill."' and   `Id_cep` = '".$resc->Id_cep."' and Id_format= '".$resf->Id_format."'  and nbr_row_table = '".$resn->nb_row."' ");				
	$conrel->setFetchMode(PDO::FETCH_CLASS, 'Relation');
	$resre = $conrel->fetch();
        echo $resre;
            
         
          if ($resre === false and $prix != "" and $format != "" and $millesime != "" and $desc != ""  and $domain != ""and $titre != "" ){
        
	  $conn = $pdo->query("INSERT INTO relation (Id_titre,Id_domain,Id_produit,Id_mill,Id_cep,Id_format,Id_prix,nbr_row_table)  VALUES ('".$res->Id_titre."','".$resd->Id_domain."','".$resde->Id_produit."','".$resm->Id_mill."','".$resc->Id_cepage."','".$resf->Id_format."','".$resp->Id_prix."','".$n."' ) ");

	        echo " add linge";
        }else{
	         echo "exist";
	}
         
     
     
    }
    
    
          
   
  
        
       
        
      
    unset($_POST['titre']);
    @$_POST['titre2']="";
    @$_POST['domain']="";
    @$_POST['desc']="";
    @$_POST['cepage']="";
    @$_POST['format']="";
    @$_POST['millesime']="";
    @$_POST['prix']="";
    @$_POST['nbr']="";
        

 

?>
</body>
</html> 
