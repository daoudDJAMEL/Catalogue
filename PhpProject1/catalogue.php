<?php
//include('sommaire.php');
include('conn2.php');
?>
<html>
  <head>
    <title>Catalogue D'or et de vins</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.wrapper{
            max-width:1090px; 
            padding-right: 10px;
            padding-left: 10px;
            padding-bottom: 20px;
            margin: auto;
            margin-bottom: 400px;
            border: 1px solid black;
           height: 1050px;
  
}
.headline {
     display: flex;

}
table tr:nth-child(even) {
  background-color: #ceb54d ;


}
.image-content{
    margin-top: 10px;
}
#exemple{
    padding-top: 30px;
    margin: auto;
    display: none;

}
.extra-table{
    margin-top: 5px;
}
.table, th, td {
  border: 1px solid black;
  border-collapse: collapse;

}

.table-div{
    margin: auto;

}

</style>

<?php

                   $id_titre = array();
                  $id_dom = array();
                  $n_page = array();
                  array_push($id_titre," ");
                  array_push($id_dom," ");
                  array_push($n_page," ");
                 $nrowt =0;
                 $conntrt = $pdo->query("SELECT * FROM titre " );
                $conntrt->setFetchMode(PDO::FETCH_CLASS, 'Titre');
                
                while($restrt = $conntrt->fetch()){
                 array_push($id_titre, $restrt->Id_titre);
                 $nrowt =$nrowt +1; 
                }
                $nrowt =$nrowt +1; 
                $nrow =0;
                for(  $y = 1;  $y < $nrowt;   $y++) {                 
                $connd = $pdo->query("SELECT * FROM domain  where Id_titre=  '".$id_titre[$y]."'" );
                $connd->setFetchMode(PDO::FETCH_CLASS, 'Domain');

               
                    while ($resd = $connd->fetch()){
                   
                     array_push($id_dom,$resd->Id_domain);
                    
                  $nrow = $nrow +1;
                 }
               
        
         
                 
                }

                $prix ="prix  € H.T";
                 $nbr_prix = array();
                  array_push($nbr_prix," ");
                $conntr = $pdo->query("SELECT * FROM domain " );
                $conntr->setFetchMode(PDO::FETCH_CLASS, 'Domain');
                $id_domain =array();
               
               
                 array_push($id_domain," ");
               

                while($restr = $conntr->fetch()){
               
                 array_push($id_domain,$restr->Id_domain);
                // echo $restr->Id_domain;
                }
                 $stack = array();
                  $stack2 = array();
                  $stack3 = array();
                  $stack4 = array();
                  $stack5 = array();
                  $stack6 = array();
                  $stack7 = array();
                  $stack8 = array();
                   $test = array();
                   $img =array();
                   $te1 = array();
                   $te2 = array();
                   $te3 = array();

                 $img =array("","Domaine de Marzilly.png","Domaine Flûteau.png","Domaine Roland Schmitt.png","Domaine du Cassard.webp",
                     "Domaine Peyrat-Fourthon.png","Château d’Arche.png","Château Bonnange.png","Domaine Rollan de by.png",
                    "Jean Paul et Benoit Droin.jpg","Au pied du mont Chauve.png", "Domaine Levert -Barault.png","Domaine Voarick.jpg","Château de davenay.png","Domaine Castellu di Baricci.jfif",
                     "Clos Capitoro.jfif","Domaine Sant Armettu.png","Domaine Gentile.png","domainePieretti.jpg","Domaine de Torraccia.jpg",
                     "Château Saint-Maur.png","Château La Calisse.png", "Domaine Gavotty.png","Domaine La suffrene.jpg",
                     "Grandes Serres.png","Domaine Saint Patrice.png","Domaine Orénia.png",
                     "Domaine La Soumade.png","La Chapelle Hermitage.png","Domaine Denuzière.png",
                     "Sauveroy.png","Les Souterrains.jpeg",
                   "Marielle Michot.jpeg", "Maison Foucher.png", "Domaine Brana.png","Château de Poncié.png",
                     
                    );
                 array_push($stack7," ");
                array_push($stack6," ");
                array_push($stack8," ");

                
                 for(  $f = 1;  $f <=  $nrow;   $f++) {
                     
                $conn1a = $pdo->query('SELECT * FROM relation where Id_domain ="'.$id_dom[$f].'"');
                $conn1a->setFetchMode(PDO::FETCH_CLASS, 'Relation');
                $resa = $conn1a->fetch();


                //echo $resa->Domain;
                if($resa ==true){
                $connt = $pdo->query("SELECT * FROM titre  where Id_titre =  '".$resa->Id_titre."'" );
                $connt->setFetchMode(PDO::FETCH_CLASS, 'Titre');
                $rest = $connt->fetch();

                 $connd = $pdo->query("SELECT * FROM domain  where Id_domain=  '".$resa->Id_domain."'" );
                $connd->setFetchMode(PDO::FETCH_CLASS, 'Domain');
                $resd = $connd->fetch();

                $conint = $pdo->query('SELECT * FROM introd where nbr_d ="'.$id_dom[$f].'"');
                $conint->setFetchMode(PDO::FETCH_CLASS, 'Intro');
                $resint = $conint->fetch();
                 if ($resd == false) {
                       array_push($stack7," ");
                } else {
                         array_push($stack7,htmlspecialchars($resd->Domain));
               }
                if ($rest == false) {
                       array_push($stack6," ");
                    } else {
                         array_push($stack6,htmlspecialchars($rest->Titre));
                    }
                    
                    
                if ($resint == false) {
                      array_push($stack8," ");
                 } else {
                     array_push($stack8,htmlspecialchars($resint->intro));
                }
                  }
                 }



?>








  <section id="catalogue">

       <div  id="table-contente1" style="">
           <div  id="exemple" class="extra-table" style="">

            <table style="text-align: center;" class="table-dive w3-table">
                <tr id="table-cole1">
                <th style ="text-align: center;" >Produit</th>
                <th style ="text-align: center;">Format</th>
                <th style ="text-align: center;">Millésime</th>
                <th style ="text-align: center;">CEPAGES</th>
                </tr>
              <tbody id="elemnt-tablee1">
              </tbody>
            </table>
           </div>
        </div>

   <div class="wrapper" id ="page1">
      <div class="headline" style="margin-bottom:0px;" >
        <div class="w3-threequarter w3-container  ">
            <h1 id="titre1"><b></b></h1>
            <h2 id="domain1"><b></b></h2>
        </div>
        <div class=" w3-container image-content  " style ="width: 30%; ">
            <img id ="image1" src="" alt="logo" style="height:100px;width: 100%;">
        </div>
      </div>


        <span style="margin-bottom:0px;">
            <h2 >Introduction</h2>
             <p id="intro1">
            </p>
        </span>


       <div  id="table-content1 " class="" style="margin-top:0px ;">
            <table style="text-align: center;" class="table-div w3-table ">

                <tr id="table-col1">
                <th style ="text-align: center;">Produit</th>
                <th style ="text-align: center;">Format</th>
                <th style ="text-align: center;">Millésime</th>
                <th style ="text-align: center;">CEPAGES</th>
                </tr>
              <tbody id="elemnt-table1">
              </tbody>
            </table>
           </div>







  </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<?php



                $check1 = 0;
                $check2 = 0;
                $check3 =  0;
                $check4 =  0;
                $onece = 0;
                $nrowt = 0;
               $numbre_page = 0;
               $n_page = array();
                array_push($n_page,0);

              
                  for(  $y = 1;  $y <=  $nrow;   $y++) {
                          // echo "domaine =";
                      //echo $id_dom[$y];
                       echo "\n";
                        echo "\n";
                         echo "\n";
                  }
                  
               // $suiv = $y +1;
            for(  $y = 1;  $y <=  $nrow;   $y++) {
                
                    
                    array_push($test,"NUll");
                  if ($id_dom[$y] == 13){
                   $prix1 ="36 cols prix € H.T";
                   $prix2 ="60 cols prix € H.T";
                   $prix3 ="120 cols prix € H.T";
                   $prix4 ="300 cols prix € H.T";
                }else if($id_dom[$y] ==14){
                     $prix1 ="48 cols prix € H.T";
                   $prix2 ="72 cols prix € H.T";
                   $prix3 ="120 cols prix € H.T";
                }else if($id_dom[$y] ==15){
                     $prix1 ="6 cols prix € H.T";
                   $prix2 ="12 cols prix € H.T";
                   $prix3 ="18 a 36 cols prix € H.T";
                   $prix4 ="42 a 72 cols prix € H.T";
                   $prix5 ="78 a 120 cols prix € H.T";
                }else if($id_dom[$y] == 16){
                     $prix1 ="48 cols prix € H.T";
                   $prix2 ="60 cols prix € H.T";
                   $prix3 ="90 cols prix € H.T";
                   $prix4 ="120 et + cols prix € H.T";                   
                   $prix5 ="prix de vent conseillé TTC";

                }else if($id_dom[$y] ==17){
                     $prix1 ="PRIX € Franco 48cols";
                   $prix2 ="PRIX € Franco 72cols";
                   $prix3 ="PRIX € Franco 120cols";
                   $prix4 ="PRIX € Franco 300cols";
                }else if($id_dom[$y] ==18){
                     $prix1 ="prix € H.T de 6 a 35 cols";
                   $prix2 ="prix € H.T de 36 a 59 cols";
                   $prix3 ="prix € H.T de 60 a 119 cols";
                   $prix4 ="prix € H.T de 120 a 299 cols";
                   
                }else if($id_dom[$y] ==19){
                     $prix1 ="PRIX € Franco 24cols";
                   $prix2 ="PRIX € Franco 60cols";
            
                }else if($id_dom[$y] ==24){
                     $prix1 ="PRIX € Franco 12cols";
                   $prix2 =" PRIX € Franco 36cols";
                   $prix3 =" PRIX € Franco 60cols";
                }else if($id_dom[$y] ==25){
                     $prix1 ="prix € H.T de 24 a 60 cols";
                   $prix2 ="prix € H.T de 66 a 120 cols";
                   $prix3 ="prix € H.T de +126 cols";
                }else if($id_dom[$y] ==26){
                     $prix1 ="6 cols prix € H.T";
                   $prix2 ="12 cols prix € H.T";
                   $prix3 ="24 cols prix € H.T";
                   $prix4 ="60 cols prix € H.T";
                } else if($id_domain[$y] ==77){
                    $prix1 = "prix € H.T";
                    $prix = "prix € H.T";
                } else if($id_dom[$y] == 1002 || $id_dom[$y] == 1003 || $id_dom[$y] == 1004 ||  $id_dom[$y] == 1005){
                    $prix1 = "prix € H.T de 24cols";
                    $prix2 ="prix € H.T de 60cols";
                }
                 else if($id_dom[$y] == 1008  ){
                    $prix1 = "prix € H.T de 36 à 71 blles";
                    $prix2 ="prix € H.T de de 72 à 119 blles";
                    $prix3 ="prix € H.T de +120 cols";
                } else if($id_dom[$y] == 1009  ){
                    $prix1 = "prix € H.T - 120 bouteilles";
                    $prix2 ="prix € H.T de  121 à 312 bouteilles";
                    $prix3 ="prix € H.T  + 312 bouteilles";
                }
                else if($id_dom[$y] == 1010  ){
                    $prix1 = "prix € H.T de 24cols";
                    $prix2 ="prix € H.T de 60cols";
                 
                }else if($id_dom[$y] == 1011  ){
                    $prix1 = "prix € H.T - 120 bouteilles";
                    $prix2 ="prix € H.T de  121 à 312 bouteilles";
                   
                }
                
                else {
                    
                    $prix = "prix € H.T";
                }
                
                
                $suiv = $y +1;
                $nbr_linge = 0;
                
                $conn1 = $pdo->query('SELECT * FROM relation where Id_domain ="'.$id_dom[$y].'"');
                $conn1->setFetchMode(PDO::FETCH_CLASS, 'Relation');
                

                $cn = $pdo->query('SELECT * FROM nbr_row_tanl where id ="'.$id_dom[$y].'"');
                $cn->setFetchMode(PDO::FETCH_CLASS, 'Nbr_row_tanl');
                $rn = $cn->fetch();
                //if ($rn != NULL ){
                    $nbr_col = $rn->nb_row;
                //}

                while ($res = $conn1->fetch()):
                    $connp = $pdo->query("SELECT * FROM produit  where Id_produit =  '".$res->Id_produit."'" );
                    $connp->setFetchMode(PDO::FETCH_CLASS, 'Produit');
                    $resp = $connp->fetch();

                    $connf = $pdo->query("SELECT * FROM format  where Id_format =  '".$res->Id_format."'" );
                    $connf->setFetchMode(PDO::FETCH_CLASS, 'Format');
                    $resf = $connf->fetch();

                    $connm = $pdo->query("SELECT * FROM millesime  where Id_mill = '".$res->Id_mill."'" );
                    $connm->setFetchMode(PDO::FETCH_CLASS, 'Millesime');
                    $resm = $connm->fetch();

                    $connc = $pdo->query("SELECT * FROM cepage  where Id_cep =  '".$res->Id_cep."'" );
                    $connc->setFetchMode(PDO::FETCH_CLASS, 'Cepage');
                    $resc = $connc->fetch();

                    $connpr = $pdo->query("SELECT * FROM prix  where Id_prix =  '".$res->Id_prix."'" );
                    $connpr->setFetchMode(PDO::FETCH_CLASS, 'Prix');
                    $respr = $connpr->fetch();
                    if ($resp == false) {
                        array_push($stack," ");
                     }
                    else {  array_push($stack,htmlspecialchars($resp->Descp)); }


                    if ($resf == false) {
                       array_push($stack2," ");
                    }
                    else {
                          array_push($stack2,$resf->format);}

                    if ($resm == false) {
                       array_push($stack3," ");
                     }
                       else { array_push($stack3,$resm->Mill);}

                    if ( $resc == false) {
                       array_push($stack4," ");
                        }
                    else { array_push($stack4,$resc->cepage); }

                    if ( $respr == false) {
                         array_push($stack5," ");
                    }
                    else {
                          array_push($stack5, $respr->prix); }



                    if ($nbr_col>=2) {

                        if($check1 != $res->Id_produit || $check2 != $res->Id_format || $check3 != $res->Id_mill  || $check4 != $res->Id_cep ){
                        array_push($te1,$res->Id_produit);
                        array_push($te2,$res->Id_format);
                        array_push($te3,$res->Id_mill);
                        $check1 = $res->Id_produit;
                        $check2 = $res->Id_format;
                        $check3 = $res->Id_mill ;
                        $check4 = $res->Id_cep ;
                        
                       
                        }
                    }

                endwhile;

              if ($nbr_col>=2) {
                    for($j = 0; $j < count($te1); $j++) {
                        for($v= 1; $v < $nbr_col+1; $v++){
                            $c = $pdo->query("SELECT * FROM relation  where Id_produit ='".$te1[$j]."' and Id_mill ='".$te3[$j]."' and Id_format ='".$te2[$j]."'  and nbr_row_table = '".$v."' " );
                            $c->setFetchMode(PDO::FETCH_CLASS, 'relation');

                       while ( $r = $c->fetch()):
                        $cr = $pdo->query("SELECT * FROM prix  where Id_prix =  '".$r->Id_prix."'" );
                        $cr->setFetchMode(PDO::FETCH_CLASS, 'Prix');
                        $rr = $cr->fetch();
                        //echo $rr;
                            if($rr == true){
                           //echo $rr->prix;
                            $array_push = array_push($test, $rr->prix);
                            }
                            else { array_push($test,' ');}
                        endwhile;

                        }
                    }


               }

      

?>
    
    
 <?php
 /*
if($y == $nrow){
      $numbre_page = $numbre_page + 1;
}
*/
 if($y != $nrow +1):
            $numbre_page = $numbre_page + 1;
           
 ?>
 <script>

    var clone = $("#page"+ <?php echo json_encode($y); ?>).clone();
        clone.attr("id", "page"+ <?php echo json_encode($suiv); ?>);
        
        
        clone.find("#titre"+<?php echo json_encode($y); ?>).attr("id","titre" + <?php echo json_encode($suiv); ?>);
        clone.find("#domain"+<?php echo json_encode($y); ?>).attr("id","domain" + <?php echo json_encode($suiv); ?>);
        clone.find("#image"+<?php echo json_encode($y); ?>).attr("id","image" + <?php echo json_encode($suiv); ?>);
        clone.find("#intro"+<?php echo json_encode($y); ?>).attr("id","intro" + <?php echo json_encode($suiv); ?>);

        clone.find("#table-div"+ <?php echo json_encode($y); ?>).attr("id","table-div" + <?php echo json_encode($suiv); ?>);
        clone.find("#table-content"+<?php echo json_encode($y); ?>).attr("id","table-content" + <?php echo json_encode($suiv); ?>);
        clone.find("#elemnt-table"+<?php echo json_encode($y); ?>).attr("id","elemnt-table" + <?php echo json_encode($suiv); ?>);
        clone.find("#table-col"+<?php echo json_encode($y); ?>).attr("id","table-col" + <?php echo json_encode($suiv); ?>);

        clone.appendTo("#catalogue");

   </script>
   
<?php endif; ?>

 <?php


 if($nbr_col>= 2){
       $t =count($test);
        $nbr_linge = (integer)($t/$nbr_col);
     
}else {
       $t = count($stack5);
       $nbr_linge = count($stack5);
}
//echo " nombre de linge ";
//echo $nbr_linge;
//echo "::::::";



//// cree extra page:::::::::::::::::::::::::::::::::::::::
if ($id_dom[$y] == 25){
 $nbr_linge = 10;   
 
}
//echo 'NOMBRE DE LINGE ++';
//echo $nbr_linge;
 if($nbr_linge > 11 || $id_dom[$y] == 17  ):
    $index = $y + 100;
    $one = 1;
    $numbre_page = $numbre_page + 1;
 ?>
   <script>
           var clonet = $("#table-contente"+ <?php echo json_encode($one); ?>).clone();
           clonet.attr("id", "table-content-extra"+ <?php echo json_encode($index); ?>);

        clonet.find("#table-dive1").attr("id","table-div-extra" + <?php echo json_encode($index); ?>);



        clonet.find("#exemple" ).attr("id","new-table" + <?php echo json_encode($index);?> );

        clonet.find("#elemnt-tablee1").attr("id","elemnt-table-extra" + <?php echo json_encode($index); ?>);
        clonet.find("#table-cole1").attr("id","table-col-extra" + <?php echo json_encode($index); ?>);


     var wrapper  = document.createElement("div");
     wrapper.setAttribute('class', 'wrapper');
     wrapper.setAttribute('id', 'page-extra'+ <?php echo json_encode($index); ?>);

      catalogue = document.getElementById("catalogue");
      page = document.getElementById("page" + <?php echo json_encode($y+1); ?> );
      //page.appendChild(div);
       catalogue.insertBefore(wrapper, page);


        //var table_content  = document.createElement("div");
        //table_content.setAttribute('id', 'table-content' );

       // var table  = document.createElement("table");
        //wrapper.setAttribute('id', 'table-content' );

      clonet.appendTo("#page-extra"+ <?php echo json_encode($index); ?>);
      //clonet.appendTo("#");
      //div.appendTo(page);

   </script>



   <script>

     var col ;
    col= document.getElementById("table-col-extra" + <?php echo json_encode($index); ?>  );


      var theeec = document.createElement("th");

      <?php if ($nbr_col>=2) {?>
      var theee2c = document.createElement("th");
      <?php  } if ($nbr_col>=3) {?>
      var theee3c = document.createElement("th");
       <?php  } if ($nbr_col>=4) {?>
      var theee4c = document.createElement("th");
        <?php  } if ($nbr_col>=5) {?>
      var theee5c = document.createElement("th");
         <?php  } ?>


     <?php if ($nbr_col >= 2) {?>
      theeec.innerHTML =<?php echo json_encode($prix1); ?>;
       <?php  }else {?>
       theeec.innerHTML =<?php echo json_encode($prix);} ?>;


            <?php if ($nbr_col>=2) {?>
      theee2c.innerHTML =<?php echo json_encode($prix2); ?>;
       <?php  } if ($nbr_col>=3) {?>
      theee3c.innerHTML =<?php echo json_encode($prix3); ?>;
       <?php  } if ($nbr_col>=4) {?>
      theee4c.innerHTML =<?php echo json_encode($prix4); ?>;
        <?php  } if ($nbr_col>=5) {?>
      theee5c.innerHTML =<?php echo json_encode($prix5); ?>;
        <?php  } ?>

       col.appendChild(theeec);


        <?php if ($nbr_col>=2) {?>
       col.appendChild(theee2c);
         <?php  } if ($nbr_col>=3) {?>
       col.appendChild(theee3c);
         <?php  } if ($nbr_col>=4) {?>
       col.appendChild(theee4c);
         <?php  } if ($nbr_col>=5) {?>
       col.appendChild(theee5c);
        <?php  } ?>



    </script>



<?php endif; ?>

<!-- //////////////////////////////////////////////////////:::::::::::-->
<?php
 if($nbr_linge > 30 || $id_dom[$y] == 16  ){
    $index = $y + 200;
    $one = 1;
    $numbre_page = $numbre_page + 1;
 ?>
   <script>
           var clonet = $("#table-contente"+ <?php echo json_encode($one); ?>).clone();
           clonet.attr("id", "table-content-extra"+ <?php echo json_encode($index); ?>);

        clonet.find("#table-dive1").attr("id","table-div-extra" + <?php echo json_encode($index); ?>);



        clonet.find("#exemple" ).attr("id","new-table" + <?php echo json_encode($index);?> );

        clonet.find("#elemnt-tablee1").attr("id","elemnt-table-extra" + <?php echo json_encode($index); ?>);
        clonet.find("#table-cole1").attr("id","table-col-extra" + <?php echo json_encode($index); ?>);


     var wrapper  = document.createElement("div");
     wrapper.setAttribute('class', 'wrapper');
     wrapper.setAttribute('id', 'page-extra'+ <?php echo json_encode($index); ?>);

      catalogue = document.getElementById("catalogue");
      page = document.getElementById("page" + <?php echo json_encode($y+1); ?> );
      //page.appendChild(div);
       catalogue.insertBefore(wrapper, page);


        //var table_content  = document.createElement("div");
        //table_content.setAttribute('id', 'table-content' );

       // var table  = document.createElement("table");
        //wrapper.setAttribute('id', 'table-content' );

      clonet.appendTo("#page-extra"+ <?php echo json_encode($index); ?>);
      //clonet.appendTo("#");
      //div.appendTo(page);

   </script>



   <script>

     var col ;
    col= document.getElementById("table-col-extra" + <?php echo json_encode($index); ?>  );


      var theeec = document.createElement("th");

      <?php if ($nbr_col>=2) {?>
      var theee2c = document.createElement("th");
      <?php  } if ($nbr_col>=3) {?>
      var theee3c = document.createElement("th");
       <?php  } if ($nbr_col>=4) {?>
      var theee4c = document.createElement("th");
        <?php  } if ($nbr_col>=5) {?>
      var theee5c = document.createElement("th");
         <?php  } ?>

        <?php if ($nbr_col>=2) {?>
      theeec.innerHTML =<?php echo json_encode($prix1); ?>;
       <?php  } if ($nbr_col==1) {?>
       theeec.innerHTML =<?php echo json_encode($prix);} ?>;


       <?php if ($nbr_col>=2) {?>
      theee2c.innerHTML =<?php echo json_encode($prix2); ?>;
       <?php  } if ($nbr_col>=3) {?>
      theee3c.innerHTML =<?php echo json_encode($prix3); ?>;
       <?php  } if ($nbr_col>=4) {?>
      theee4c.innerHTML =<?php echo json_encode($prix4); ?>;
        <?php  } if ($nbr_col>=5) {?>
      theee5c.innerHTML =<?php echo json_encode($prix5); ?>;
        <?php  } ?>

       col.appendChild(theeec);


        <?php if ($nbr_col>=2) {?>
       col.appendChild(theee2c);
         <?php  } if ($nbr_col>=3) {?>
       col.appendChild(theee3c);
         <?php  } if ($nbr_col>=4) {?>
       col.appendChild(theee4c);
         <?php  } if ($nbr_col>=5) {?>
       col.appendChild(theee5c);
        <?php  } ?>



    </script>



 <?php } ?>

<!-- //////////////////////////////////////////////////////:::::::::::-->
<?php
 if( $nbr_linge > 45 ||$id_dom[$y] == 23 || $id_dom[$y] == 26 || $id_dom[$y] ==1010 ){
    $index = $y + 300;
    $one = 1;
    $numbre_page = $numbre_page + 1;
 ?>
   <script>
           var clonet = $("#table-contente"+ <?php echo json_encode($one); ?>).clone();
           clonet.attr("id", "table-content-extra"+ <?php echo json_encode($index); ?>);

        clonet.find("#table-dive1").attr("id","table-div-extra" + <?php echo json_encode($index); ?>);



        clonet.find("#exemple" ).attr("id","new-table" + <?php echo json_encode($index);?> );

        clonet.find("#elemnt-tablee1").attr("id","elemnt-table-extra" + <?php echo json_encode($index); ?>);
        clonet.find("#table-cole1").attr("id","table-col-extra" + <?php echo json_encode($index); ?>);


     var wrapper  = document.createElement("div");
     wrapper.setAttribute('class', 'wrapper');
     wrapper.setAttribute('id', 'page-extra'+ <?php echo json_encode($index); ?>);

      catalogue = document.getElementById("catalogue");
      page = document.getElementById("page" + <?php echo json_encode($y+1); ?> );
      //page.appendChild(div);
       catalogue.insertBefore(wrapper, page);


        //var table_content  = document.createElement("div");
        //table_content.setAttribute('id', 'table-content' );

       // var table  = document.createElement("table");
        //wrapper.setAttribute('id', 'table-content' );

      clonet.appendTo("#page-extra"+ <?php echo json_encode($index); ?>);
      //clonet.appendTo("#");
      //div.appendTo(page);

   </script>



   <script>

     var col ;
    col= document.getElementById("table-col-extra" + <?php echo json_encode($index); ?>  );


      var theeec = document.createElement("th");

      <?php if ($nbr_col>=2) {?>
      var theee2c = document.createElement("th");
      <?php  } if ($nbr_col>=3) {?>
      var theee3c = document.createElement("th");
       <?php  } if ($nbr_col>=4) {?>
      var theee4c = document.createElement("th");
        <?php  } if ($nbr_col>=5) {?>
      var theee5c = document.createElement("th");
         <?php  } ?>


      <?php if ($nbr_col>=2) {?>
      theeec.innerHTML =<?php echo json_encode($prix1); ?>;
       <?php  } if ($nbr_col==1) {?>
       theeec.innerHTML =<?php echo json_encode($prix);} ?>;


       <?php if ($nbr_col>=2) {?>
      theee2c.innerHTML =<?php echo json_encode($prix2); ?>;
       <?php  } if ($nbr_col>=3) {?>
      theee3c.innerHTML =<?php echo json_encode($prix3); ?>;
       <?php  } if ($nbr_col>=4) {?>
      theee4c.innerHTML =<?php echo json_encode($prix4); ?>;
        <?php  } if ($nbr_col>=5) {?>
      theee5c.innerHTML =<?php echo json_encode($prix5); ?>;
        <?php  } ?>

       col.appendChild(theeec);


        <?php if ($nbr_col>=2) {?>
       col.appendChild(theee2c);
         <?php  } if ($nbr_col>=3) {?>
       col.appendChild(theee3c);
         <?php  } if ($nbr_col>=4) {?>
       col.appendChild(theee4c);
         <?php  } if ($nbr_col>=5) {?>
       col.appendChild(theee5c);
        <?php  } ?>



    </script>



 <?php } ?>

<!-- //////////////////////////////////////////////////////:::::::::::-->
<?php
if( $nbr_linge > 60 && $nbr_linge <= 80 ){
 //if( $id_dom[$y] == 1010 ){
    $index = $y + 400;
    $one = 1;
    $numbre_page = $numbre_page + 1;
 ?>
   <script>
           var clonet = $("#table-contente"+ <?php echo json_encode($one); ?>).clone();
           clonet.attr("id", "table-content-extra"+ <?php echo json_encode($index); ?>);

        clonet.find("#table-dive1").attr("id","table-div-extra" + <?php echo json_encode($index); ?>);



        clonet.find("#exemple" ).attr("id","new-table" + <?php echo json_encode($index);?> );

        clonet.find("#elemnt-tablee1").attr("id","elemnt-table-extra" + <?php echo json_encode($index); ?>);
        clonet.find("#table-cole1").attr("id","table-col-extra" + <?php echo json_encode($index); ?>);


     var wrapper  = document.createElement("div");
     wrapper.setAttribute('class', 'wrapper');
     wrapper.setAttribute('id', 'page-extra'+ <?php echo json_encode($index); ?>);

      catalogue = document.getElementById("catalogue");
      page = document.getElementById("page" + <?php echo json_encode($y+1); ?> );
      //page.appendChild(div);
       catalogue.insertBefore(wrapper, page);


        //var table_content  = document.createElement("div");
        //table_content.setAttribute('id', 'table-content' );

       // var table  = document.createElement("table");
        //wrapper.setAttribute('id', 'table-content' );

      clonet.appendTo("#page-extra"+ <?php echo json_encode($index); ?>);
      //clonet.appendTo("#");
      //div.appendTo(page);

   </script>



   <script>

     var col ;
    col= document.getElementById("table-col-extra" + <?php echo json_encode($index); ?>  );


      var theeec = document.createElement("th");

      <?php if ($nbr_col>=2) {?>
      var theee2c = document.createElement("th");
      <?php  } if ($nbr_col>=3) {?>
      var theee3c = document.createElement("th");
       <?php  } if ($nbr_col>=4) {?>
      var theee4c = document.createElement("th");
        <?php  } if ($nbr_col>=5) {?>
      var theee5c = document.createElement("th");
         <?php  } ?>


      <?php if ($nbr_col>=2) {?>
      theeec.innerHTML =<?php echo json_encode($prix1); ?>;
       <?php  } if ($nbr_col==1) {?>
       theeec.innerHTML =<?php echo json_encode($prix);} ?>;


       <?php if ($nbr_col>=2) {?>
      theee2c.innerHTML =<?php echo json_encode($prix2); ?>;
       <?php  } if ($nbr_col>=3) {?>
      theee3c.innerHTML =<?php echo json_encode($prix3); ?>;
       <?php  } if ($nbr_col>=4) {?>
      theee4c.innerHTML =<?php echo json_encode($prix4); ?>;
        <?php  } if ($nbr_col>=5) {?>
      theee5c.innerHTML =<?php echo json_encode($prix5); ?>;
        <?php  } ?>

       col.appendChild(theeec);


        <?php if ($nbr_col>=2) {?>
       col.appendChild(theee2c);
         <?php  } if ($nbr_col>=3) {?>
       col.appendChild(theee3c);
         <?php  } if ($nbr_col>=4) {?>
       col.appendChild(theee4c);
         <?php  } if ($nbr_col>=5) {?>
       col.appendChild(theee5c);
        <?php  } ?>



    </script>



 <?php } ?>

<!-- //////////////////////////////////////////////////////:::::::::::-->
<?php
if( $nbr_linge > 80 && $nbr_linge <= 100 ){
 //if( $id_dom[$y] ==1010 ){
    $index = $y + 500;
    $one = 1;
    $numbre_page = $numbre_page + 1;
 ?>
   <script>
           var clonet = $("#table-contente"+ <?php echo json_encode($one); ?>).clone();
           clonet.attr("id", "table-content-extra"+ <?php echo json_encode($index); ?>);

        clonet.find("#table-dive1").attr("id","table-div-extra" + <?php echo json_encode($index); ?>);



        clonet.find("#exemple" ).attr("id","new-table" + <?php echo json_encode($index);?> );

        clonet.find("#elemnt-tablee1").attr("id","elemnt-table-extra" + <?php echo json_encode($index); ?>);
        clonet.find("#table-cole1").attr("id","table-col-extra" + <?php echo json_encode($index); ?>);


     var wrapper  = document.createElement("div");
     wrapper.setAttribute('class', 'wrapper');
     wrapper.setAttribute('id', 'page-extra'+ <?php echo json_encode($index); ?>);

      catalogue = document.getElementById("catalogue");
      page = document.getElementById("page" + <?php echo json_encode($y+1); ?> );
      //page.appendChild(div);
       catalogue.insertBefore(wrapper, page);


        //var table_content  = document.createElement("div");
        //table_content.setAttribute('id', 'table-content' );

       // var table  = document.createElement("table");
        //wrapper.setAttribute('id', 'table-content' );

      clonet.appendTo("#page-extra"+ <?php echo json_encode($index); ?>);
      //clonet.appendTo("#");
      //div.appendTo(page);

   </script>



   <script>

     var col ;
    col= document.getElementById("table-col-extra" + <?php echo json_encode($index); ?>  );


      var theeec = document.createElement("th");

      <?php if ($nbr_col>=2) {?>
      var theee2c = document.createElement("th");
      <?php  } if ($nbr_col>=3) {?>
      var theee3c = document.createElement("th");
       <?php  } if ($nbr_col>=4) {?>
      var theee4c = document.createElement("th");
        <?php  } if ($nbr_col>=5) {?>
      var theee5c = document.createElement("th");
         <?php  } ?>


      <?php if ($nbr_col>=2) {?>
      theeec.innerHTML =<?php echo json_encode($prix1); ?>;
       <?php  } if ($nbr_col==1) {?>
       theeec.innerHTML =<?php echo json_encode($prix);} ?>;


       <?php if ($nbr_col>=2) {?>
      theee2c.innerHTML =<?php echo json_encode($prix2); ?>;
       <?php  } if ($nbr_col>=3) {?>
      theee3c.innerHTML =<?php echo json_encode($prix3); ?>;
       <?php  } if ($nbr_col>=4) {?>
      theee4c.innerHTML =<?php echo json_encode($prix4); ?>;
        <?php  } if ($nbr_col>=5) {?>
      theee5c.innerHTML =<?php echo json_encode($prix5); ?>;
        <?php  } ?>

       col.appendChild(theeec);


        <?php if ($nbr_col>=2) {?>
       col.appendChild(theee2c);
         <?php  } if ($nbr_col>=3) {?>
       col.appendChild(theee3c);
         <?php  } if ($nbr_col>=4) {?>
       col.appendChild(theee4c);
         <?php  } if ($nbr_col>=5) {?>
       col.appendChild(theee5c);
        <?php  } ?>



    </script>



 <?php } ?>

<!-- //////////////////////////////////////////////////////:::::::::::-->
<?php
if( $nbr_linge > 100 && $nbr_linge <= 120 ){
 //if( $id_dom[$y] ==1010 ){
    $index = $y + 600;
    $one = 1;
    $numbre_page = $numbre_page + 1;
 ?>
   <script>
           var clonet = $("#table-contente"+ <?php echo json_encode($one); ?>).clone();
           clonet.attr("id", "table-content-extra"+ <?php echo json_encode($index); ?>);

        clonet.find("#table-dive1").attr("id","table-div-extra" + <?php echo json_encode($index); ?>);



        clonet.find("#exemple" ).attr("id","new-table" + <?php echo json_encode($index);?> );

        clonet.find("#elemnt-tablee1").attr("id","elemnt-table-extra" + <?php echo json_encode($index); ?>);
        clonet.find("#table-cole1").attr("id","table-col-extra" + <?php echo json_encode($index); ?>);


     var wrapper  = document.createElement("div");
     wrapper.setAttribute('class', 'wrapper');
     wrapper.setAttribute('id', 'page-extra'+ <?php echo json_encode($index); ?>);

      catalogue = document.getElementById("catalogue");
      page = document.getElementById("page" + <?php echo json_encode($y+1); ?> );
      //page.appendChild(div);
       catalogue.insertBefore(wrapper, page);


        //var table_content  = document.createElement("div");
        //table_content.setAttribute('id', 'table-content' );

       // var table  = document.createElement("table");
        //wrapper.setAttribute('id', 'table-content' );

      clonet.appendTo("#page-extra"+ <?php echo json_encode($index); ?>);
      //clonet.appendTo("#");
      //div.appendTo(page);

   </script>



   <script>

     var col ;
    col= document.getElementById("table-col-extra" + <?php echo json_encode($index); ?>  );


      var theeec = document.createElement("th");

      <?php if ($nbr_col>=2) {?>
      var theee2c = document.createElement("th");
      <?php  } if ($nbr_col>=3) {?>
      var theee3c = document.createElement("th");
       <?php  } if ($nbr_col>=4) {?>
      var theee4c = document.createElement("th");
        <?php  } if ($nbr_col>=5) {?>
      var theee5c = document.createElement("th");
         <?php  } ?>


      <?php if ($nbr_col>=2) {?>
      theeec.innerHTML =<?php echo json_encode($prix1); ?>;
       <?php  } if ($nbr_col==1) {?>
       theeec.innerHTML =<?php echo json_encode($prix);} ?>;


       <?php if ($nbr_col>=2) {?>
      theee2c.innerHTML =<?php echo json_encode($prix2); ?>;
       <?php  } if ($nbr_col>=3) {?>
      theee3c.innerHTML =<?php echo json_encode($prix3); ?>;
       <?php  } if ($nbr_col>=4) {?>
      theee4c.innerHTML =<?php echo json_encode($prix4); ?>;
        <?php  } if ($nbr_col>=5) {?>
      theee5c.innerHTML =<?php echo json_encode($prix5); ?>;
        <?php  } ?>

       col.appendChild(theeec);


        <?php if ($nbr_col>=2) {?>
       col.appendChild(theee2c);
         <?php  } if ($nbr_col>=3) {?>
       col.appendChild(theee3c);
         <?php  } if ($nbr_col>=4) {?>
       col.appendChild(theee4c);
         <?php  } if ($nbr_col>=5) {?>
       col.appendChild(theee5c);
        <?php  } ?>



    </script>



 <?php } ?>

    
    
    <!-- //////////////////////////////////////////////////////:::::::::::-->
<?php
 if( $nbr_linge > 120 ){
    $index = $y + 700;
    $one = 1;
    $numbre_page = $numbre_page + 1;
 ?>
   <script>
           var clonet = $("#table-contente"+ <?php echo json_encode($one); ?>).clone();
           clonet.attr("id", "table-content-extra"+ <?php echo json_encode($index); ?>);

        clonet.find("#table-dive1").attr("id","table-div-extra" + <?php echo json_encode($index); ?>);



        clonet.find("#exemple" ).attr("id","new-table" + <?php echo json_encode($index);?> );

        clonet.find("#elemnt-tablee1").attr("id","elemnt-table-extra" + <?php echo json_encode($index); ?>);
        clonet.find("#table-cole1").attr("id","table-col-extra" + <?php echo json_encode($index); ?>);


     var wrapper  = document.createElement("div");
     wrapper.setAttribute('class', 'wrapper');
     wrapper.setAttribute('id', 'page-extra'+ <?php echo json_encode($index); ?>);

      catalogue = document.getElementById("catalogue");
      page = document.getElementById("page" + <?php echo json_encode($y+1); ?> );
      //page.appendChild(div);
       catalogue.insertBefore(wrapper, page);


        //var table_content  = document.createElement("div");
        //table_content.setAttribute('id', 'table-content' );

       // var table  = document.createElement("table");
        //wrapper.setAttribute('id', 'table-content' );

      clonet.appendTo("#page-extra"+ <?php echo json_encode($index); ?>);
      //clonet.appendTo("#");
      //div.appendTo(page);

   </script>



   <script>

     var col ;
    col= document.getElementById("table-col-extra" + <?php echo json_encode($index); ?>  );


      var theeec = document.createElement("th");

      <?php if ($nbr_col>=2) {?>
      var theee2c = document.createElement("th");
      <?php  } if ($nbr_col>=3) {?>
      var theee3c = document.createElement("th");
       <?php  } if ($nbr_col>=4) {?>
      var theee4c = document.createElement("th");
        <?php  } if ($nbr_col>=5) {?>
      var theee5c = document.createElement("th");
         <?php  } ?>


      <?php if ($nbr_col>=2) {?>
      theeec.innerHTML =<?php echo json_encode($prix1); ?>;
       <?php  } if ($nbr_col==1) {?>
       theeec.innerHTML =<?php echo json_encode($prix);} ?>;


       <?php if ($nbr_col>=2) {?>
      theee2c.innerHTML =<?php echo json_encode($prix2); ?>;
       <?php  } if ($nbr_col>=3) {?>
      theee3c.innerHTML =<?php echo json_encode($prix3); ?>;
       <?php  } if ($nbr_col>=4) {?>
      theee4c.innerHTML =<?php echo json_encode($prix4); ?>;
        <?php  } if ($nbr_col>=5) {?>
      theee5c.innerHTML =<?php echo json_encode($prix5); ?>;
        <?php  } ?>

       col.appendChild(theeec);


        <?php if ($nbr_col>=2) {?>
       col.appendChild(theee2c);
         <?php  } if ($nbr_col>=3) {?>
       col.appendChild(theee3c);
         <?php  } if ($nbr_col>=4) {?>
       col.appendChild(theee4c);
         <?php  } if ($nbr_col>=5) {?>
       col.appendChild(theee5c);
        <?php  } ?>



    </script>



 <?php } ?>





<!--parti replir la table -->

<script>

     var col ;
    col= document.getElementById("table-col" + <?php echo json_encode($y); ?>  );
   var theeec = document.createElement("th");

      <?php if ($nbr_col >= 2) {?>
      var theee2c = document.createElement("th");
      <?php  } if ($nbr_col>=3) {?>
      var theee3c = document.createElement("th");
       <?php  } if ($nbr_col>=4) {?>
      var theee4c = document.createElement("th");
        <?php  } if ($nbr_col>=5) {?>
      var theee5c = document.createElement("th");
         <?php  } ?>


      <?php if ($nbr_col >= 2) {?>
      theeec.innerHTML =<?php echo json_encode($prix1); ?>;
       <?php  } if ($nbr_col==1) {?>
       theeec.innerHTML =<?php echo json_encode($prix);} ?>;


       <?php if ($nbr_col>=2) {?>
      theee2c.innerHTML =<?php echo json_encode($prix2); ?>;
       <?php  } if ($nbr_col>=3) {?>
      theee3c.innerHTML =<?php echo json_encode($prix3); ?>;
       <?php  } if ($nbr_col>=4) {?>
      theee4c.innerHTML =<?php echo json_encode($prix4); ?>;
        <?php  } if ($nbr_col>=5) {?>
      theee5c.innerHTML =<?php echo json_encode($prix5); ?>;
        <?php  } ?>

       col.appendChild(theeec);


        <?php if ($nbr_col>=2) {?>
       col.appendChild(theee2c);
         <?php  } if ($nbr_col>=3) {?>
       col.appendChild(theee3c);
         <?php  } if ($nbr_col>=4) {?>
       col.appendChild(theee4c);
         <?php  } if ($nbr_col>=5) {?>
       col.appendChild(theee5c);
        <?php  } ?>



    </script>



<?php

            $index0 = $nbr_col;
            $index1 = 1;
            $index2 = 2;
            $index3 = 3;
            $index4 = 4;
            $index5 = 5;


$nbr_linge = 0;
 // remplir la table //////////////////////////////////////////////////:
for($x = 0; $x <= $t; $x++) {
    $nbr_linge = $nbr_linge +1;
if($id_dom[$y] == 15 || $id_dom[$y] == 16   || $id_dom[$y] == 17  ){
    $taille_tab = 6;
    }elseif( $id_dom[$y] == 23  ){
    $taille_tab = 9;
    }elseif ($id_dom[$y]== 1009){
         $taille_tab = 8;
    } 
     elseif ($id_dom[$y] == 26){
         $taille_tab = 10;
    } 
    else
    {
         $taille_tab = 11;
    }
  
if($nbr_linge <= $taille_tab ){

?>


 <script>
    var el ;
    el= document.getElementById("elemnt-table" + <?php echo json_encode($y); ?>  );

      var e = document.createElement("tr");
      var thh = document.createElement("th");

      var the = document.createElement("th");
      var thee = document.createElement("th");
      var theer = document.createElement("th");
      var theee = document.createElement("th");

       <?php if($nbr_col>=2) {?>
      var theee2 = document.createElement("th");
       <?php }if($nbr_col>=3) {?>
      var theee3 = document.createElement("th");
       <?php }if($nbr_col>=4) {?>
      var theee4 = document.createElement("th");
       <?php }if($nbr_col>=5) {?>
      var theee5 = document.createElement("th");
        <?php  } ?>
 <?php  if($nbr_col>= 2) {
                 $n = $x +$index1 ;
                 $m = $x +$index1 ;
                 $m2 =$x +$index2;
                 $m3 =$x +$index3;
                 $m4 =$x +$index4;
                 $m5 =$x +$index5;}

           else { $n =$x;
                  $m =$x;
                  $m2 =$x ;
                  $m3 =$x;
                  $m4 =$x ;
                  $m5 =$x;

                }
          ?>

      thh.innerHTML =<?php echo json_encode($stack[$n]); ?>;
      the.innerHTML =<?php echo json_encode($stack2[$n]); ?>;
      thee.innerHTML =<?php echo json_encode( $stack3[$n]); ?>;
      theer.innerHTML =<?php echo json_encode( $stack4[$n] ); ?>;
      theee.innerHTML =<?php if($nbr_col>=2){
                                echo json_encode($test[$m]);
                             }else
                             {echo json_encode($stack5[$n]);} ?>;


             <?php if($nbr_col>=2) {?>
      theee2.innerHTML =<?php echo json_encode($test[$m2]); ?>;
             <?php }if($nbr_col>=3) {?>
      theee3.innerHTML =<?php echo json_encode($test[$m3]); ?>;
             <?php } if($nbr_col>=4) {?>
      theee4.innerHTML =<?php echo json_encode($test[$m4]); ?>;
             <?php }if($nbr_col>=5) {?>
      theee5.innerHTML =<?php echo json_encode($test[$m5]); ?>;
                <?php  } ?>

       e.appendChild(thh);
       e.appendChild(the);
       e.appendChild(thee);
       e.appendChild(theer);
       e.appendChild(theee);

        <?php if($nbr_col>=2) {?>
       e.appendChild(theee2);
        <?php  }if($nbr_col>=3) {?>
       e.appendChild(theee3);
        <?php }if($nbr_col>=4) {?>
       e.appendChild(theee4);
        <?php }if($nbr_col>=5) {?>
       e.appendChild(theee5);
        <?php  } ?>


     el.appendChild(e);

    </script>
<?php


       //echo 'prix ====';
       //echo $test[$m];
      $index1  = $index0  + $index1 -1;
      $index2  = $index0 +$index2 -1;
      $index3  = $index0 + $index3 -1;
      $index4  = $index0 + $index4 -1;
      $index5  = $index0 + $index5 -1;

}


   if( $id_dom[$y] == 16 ){
       $limit2 = 20;

    }elseif ($id_dom[$y] ==26) {
         $limit2 = 26;
    }elseif ($id_dom[$y] == 23) {
         $limit2 = 27;
    
    
    }elseif ($id_dom[$y] == 1002) {
         $limit2 = 27;
    
    }else{
        $limit2 = 30;
    }
    
    

     
    
    
if($nbr_linge > $taille_tab  && $nbr_linge <= $limit2){

    $index = $y + 100;
    


?>


<!--   partie extra-->
<!--parti replir table 2 -->

 <script>
    var linge ;
    linge = document.getElementById("elemnt-table-extra"+ <?php echo json_encode($index); ?>  );

      var element = document.createElement("tr");
      var ele = document.createElement("th");
      var th2 = document.createElement("th");
      var th3 = document.createElement("th");
      var th4 = document.createElement("th");
      var th5 = document.createElement("th");

       <?php if($nbr_col>=2) {?>
      var th22 = document.createElement("th");
       <?php }if($nbr_col>=3) {?>
      var th33 = document.createElement("th");
       <?php }if($nbr_col>=4) {?>
      var th44 = document.createElement("th");
       <?php }if($nbr_col>=5) {?>
      var th55 = document.createElement("th");
        <?php  } ?>
 <?php  if($nbr_col>=2) {
                 $n = $x +$index1-1;
                 $m =$x +$index1;
                 $m2 =$x +$index2;
                 $m3 =$x +$index3;
                 $m4 =$x +$index4;
                  $m5 =$x +$index5;}
           else { $n =$x;
                $m =$x;
                $m2 =$x ;
                 $m3 =$x;
                 $m4 =$x ;
                 $m5 =$x;

                }
          ?>
      ele.innerHTML =<?php echo json_encode($stack[$n]); ?>;
      th2.innerHTML =<?php echo json_encode($stack2[$n]); ?>;
      th3.innerHTML =<?php echo json_encode( $stack3[$n]); ?>;
      th4.innerHTML =<?php echo json_encode( $stack4[$n] ); ?>;
      th5.innerHTML =<?php if($nbr_col>=2){  echo json_encode($test[$m]);
                             }  else{echo json_encode($stack5[$n]);} ?>;


             <?php if($nbr_col>=2) {?>
      th22.innerHTML =<?php echo json_encode($test[$m2]); ?>;
             <?php }if($nbr_col>=3) {?>
      th33.innerHTML =<?php echo json_encode($test[$m3]); ?>;
             <?php } if($nbr_col>=4) {?>
      th44.innerHTML =<?php echo json_encode($test[$m4]); ?>;
             <?php }if($nbr_col>=5) {?>
      th55.innerHTML =<?php echo json_encode($test[$m5]); ?>;
                <?php  } ?>

       element.appendChild(ele);
       element.appendChild(th2);
       element.appendChild(th3);
       element.appendChild(th4);
       element.appendChild(th5);

        <?php if($nbr_col>=2) {?>
       element.appendChild(th22);
        <?php  }if($nbr_col>=3) {?>
       element.appendChild(th33);
        <?php }if($nbr_col>=4) {?>
       element.appendChild(th44);
        <?php }if($nbr_col>=5) {?>
       element.appendChild(th55);
        <?php  } ?>


     linge.appendChild(element);

    </script>
<?php
       $index1  = $index0  + $index1 -1;
      $index2  = $index0 +$index2 -1;
      $index3  = $index0 + $index3 -1;
      $index4  = $index0 + $index4 -1;
      $index5  = $index0 + $index5 -1;

     }


      //echo  "index premier colonne =";
      //echo $index1;


    ?>
    <!--     ////////////////////////////////////////////////////////////////////-->

<?php


    if( $id_dom[$y] == 16){
        $limit3 = 28;
    }
    elseif( $id_dom[$y] == 26 ){
       $limit3 = 36;
    }else if($id_dom[$y] == 1009) {
         $limit3 = 42;
    }
    elseif( $id_dom[$y] == 1002 ||$id_dom[$y] == 1010 ){
       $limit3 = 44;
       
    } else if($id_dom[$y] == 23) {
         $limit3 = 45;
    }
    else {
         $limit3 = 45;
    }
   
   
  

     
   

if($nbr_linge > $limit2  && $nbr_linge <= $limit3){

    $index = $y + 200;

?>


<!--   partie extra-->
<!--parti replir table 2 -->

 <script>
    var linge ;
    linge = document.getElementById("elemnt-table-extra"+ <?php echo json_encode($index); ?>  );

      var element = document.createElement("tr");
      var ele = document.createElement("th");
      var th2 = document.createElement("th");
      var th3 = document.createElement("th");
      var th4 = document.createElement("th");
      var th5 = document.createElement("th");

       <?php if($nbr_col>=2) {?>
      var th22 = document.createElement("th");
       <?php }if($nbr_col>=3) {?>
      var th33 = document.createElement("th");
       <?php }if($nbr_col>=4) {?>
      var th44 = document.createElement("th");
       <?php }if($nbr_col>=5) {?>
      var th55 = document.createElement("th");
        <?php  } ?>
 <?php  if($nbr_col>=2) {
                 $n = $x +$index1-1;
                 $m =$x +$index1;
                 $m2 =$x +$index2;
                 $m3 =$x +$index3;
                 $m4 =$x +$index4;
                  $m5 =$x +$index5;}
           else { $n =$x;
                $m =$x;
                $m2 =$x ;
                 $m3 =$x;
                 $m4 =$x ;
                 $m5 =$x;

                }
          ?>
      ele.innerHTML =<?php echo json_encode($stack[$n]); ?>;
      th2.innerHTML =<?php echo json_encode($stack2[$n]); ?>;
      th3.innerHTML =<?php echo json_encode( $stack3[$n]); ?>;
      th4.innerHTML =<?php echo json_encode( $stack4[$n] ); ?>;
      th5.innerHTML =<?php if($nbr_col>=2){  echo json_encode($test[$m]);
                             }  else{echo json_encode($stack5[$n]);} ?>;


             <?php if($nbr_col>=2) {?>
      th22.innerHTML =<?php echo json_encode($test[$m2]); ?>;
             <?php }if($nbr_col>=3) {?>
      th33.innerHTML =<?php echo json_encode($test[$m3]); ?>;
             <?php } if($nbr_col>=4) {?>
      th44.innerHTML =<?php echo json_encode($test[$m4]); ?>;
             <?php }if($nbr_col>=5) {?>
      th55.innerHTML =<?php echo json_encode($test[$m5]); ?>;
                <?php  } ?>

       element.appendChild(ele);
       element.appendChild(th2);
       element.appendChild(th3);
       element.appendChild(th4);
       element.appendChild(th5);

        <?php if($nbr_col>=2) {?>
       element.appendChild(th22);
        <?php  }if($nbr_col>=3) {?>
       element.appendChild(th33);
        <?php }if($nbr_col>=4) {?>
       element.appendChild(th44);
        <?php }if($nbr_col>=5) {?>
       element.appendChild(th55);
        <?php  } ?>


     linge.appendChild(element);

    </script>
<?php
       $index1  = $index0  + $index1 -1;
      $index2  = $index0 +$index2 -1;
      $index3  = $index0 + $index3 -1;
      $index4  = $index0 + $index4 -1;
      $index5  = $index0 + $index5 -1;

     }


      //echo  "index premier colonne =";
      //echo $index1;


    ?>






    
    
    
  
    
    
    <?php
 
   

     if( $id_dom[$y] == 16 ){
       $limit4 = 45;
    }
    else if( $id_dom[$y] == 23  ){
       $limit4 = 60;

    }else{
       $limit4 = 60;
    }
    

    
if($nbr_linge > $limit3  && $nbr_linge <= $limit4){

    $index = $y + 300;

?>


<!--   partie extra-->
<!--parti replir table 2 -->

 <script>
    var linge ;
    linge = document.getElementById("elemnt-table-extra"+ <?php echo json_encode($index); ?>  );

      var element = document.createElement("tr");
      var ele = document.createElement("th");
      var th2 = document.createElement("th");
      var th3 = document.createElement("th");
      var th4 = document.createElement("th");
      var th5 = document.createElement("th");

       <?php if($nbr_col>=2) {?>
      var th22 = document.createElement("th");
       <?php }if($nbr_col>=3) {?>
      var th33 = document.createElement("th");
       <?php }if($nbr_col>=4) {?>
      var th44 = document.createElement("th");
       <?php }if($nbr_col>=5) {?>
      var th55 = document.createElement("th");
        <?php  } ?>
 <?php  if($nbr_col>=2) {
                 $n = $x +$index1-1;
                 $m =$x +$index1;
                 $m2 =$x +$index2;
                 $m3 =$x +$index3;
                 $m4 =$x +$index4;
                  $m5 =$x +$index5;}
           else { $n =$x;
                $m =$x;
                $m2 =$x ;
                 $m3 =$x;
                 $m4 =$x ;
                 $m5 =$x;

                }
          ?>
      ele.innerHTML =<?php echo json_encode($stack[$n]); ?>;
      th2.innerHTML =<?php echo json_encode($stack2[$n]); ?>;
      th3.innerHTML =<?php echo json_encode( $stack3[$n]); ?>;
      th4.innerHTML =<?php echo json_encode( $stack4[$n] ); ?>;
      th5.innerHTML =<?php if($nbr_col>=2){  echo json_encode($test[$m]);
                             }  else{echo json_encode($stack5[$n]);} ?>;


             <?php if($nbr_col>=2) {?>
      th22.innerHTML =<?php echo json_encode($test[$m2]); ?>;
             <?php }if($nbr_col>=3) {?>
      th33.innerHTML =<?php echo json_encode($test[$m3]); ?>;
             <?php } if($nbr_col>=4) {?>
      th44.innerHTML =<?php echo json_encode($test[$m4]); ?>;
             <?php }if($nbr_col>=5) {?>
      th55.innerHTML =<?php echo json_encode($test[$m5]); ?>;
                <?php  } ?>

       element.appendChild(ele);
       element.appendChild(th2);
       element.appendChild(th3);
       element.appendChild(th4);
       element.appendChild(th5);

        <?php if($nbr_col>=2) {?>
       element.appendChild(th22);
        <?php  }if($nbr_col>=3) {?>
       element.appendChild(th33);
        <?php }if($nbr_col>=4) {?>
       element.appendChild(th44);
        <?php }if($nbr_col>=5) {?>
       element.appendChild(th55);
        <?php  } ?>


     linge.appendChild(element);

    </script>
<?php
       $index1  = $index0  + $index1 -1;
      $index2  = $index0 +$index2 -1;
      $index3  = $index0 + $index3 -1;
      $index4  = $index0 + $index4 -1;
      $index5  = $index0 + $index5 -1;

     }


      //echo  "index premier colonne =";
      //echo $index1;

 
?>
    
    
    
    
    
    
<!--    ////////////////////////////////////////////////-->
<?php 



    
    if( $nbr_linge > $limit4 && $nbr_linge <= 80 ){

    $index = $y + 400;

?>


<!--   partie extra-->
<!--parti replir table 2 -->

 <script>
    var linge ;
    linge = document.getElementById("elemnt-table-extra"+ <?php echo json_encode($index); ?>  );

      var element = document.createElement("tr");
      var ele = document.createElement("th");
      var th2 = document.createElement("th");
      var th3 = document.createElement("th");
      var th4 = document.createElement("th");
      var th5 = document.createElement("th");

       <?php if($nbr_col>=2) {?>
      var th22 = document.createElement("th");
       <?php }if($nbr_col>=3) {?>
      var th33 = document.createElement("th");
       <?php }if($nbr_col>=4) {?>
      var th44 = document.createElement("th");
       <?php }if($nbr_col>=5) {?>
      var th55 = document.createElement("th");
        <?php  } ?>
 <?php  if($nbr_col>=2) {
                 $n = $x +$index1-1;
                 $m =$x +$index1;
                 $m2 =$x +$index2;
                 $m3 =$x +$index3;
                 $m4 =$x +$index4;
                  $m5 =$x +$index5;}
           else { $n =$x;
                $m =$x;
                $m2 =$x ;
                 $m3 =$x;
                 $m4 =$x ;
                 $m5 =$x;

                }
          ?>
      ele.innerHTML =<?php echo json_encode($stack[$n]); ?>;
      th2.innerHTML =<?php echo json_encode($stack2[$n]); ?>;
      th3.innerHTML =<?php echo json_encode( $stack3[$n]); ?>;
      th4.innerHTML =<?php echo json_encode( $stack4[$n] ); ?>;
      th5.innerHTML =<?php if($nbr_col>=2){  echo json_encode($test[$m]);
                             }  else{echo json_encode($stack5[$n]);} ?>;


             <?php if($nbr_col>=2) {?>
      th22.innerHTML =<?php echo json_encode($test[$m2]); ?>;
             <?php }if($nbr_col>=3) {?>
      th33.innerHTML =<?php echo json_encode($test[$m3]); ?>;
             <?php } if($nbr_col>=4) {?>
      th44.innerHTML =<?php echo json_encode($test[$m4]); ?>;
             <?php }if($nbr_col>=5) {?>
      th55.innerHTML =<?php echo json_encode($test[$m5]); ?>;
                <?php  } ?>

       element.appendChild(ele);
       element.appendChild(th2);
       element.appendChild(th3);
       element.appendChild(th4);
       element.appendChild(th5);

        <?php if($nbr_col>=2) {?>
       element.appendChild(th22);
        <?php  }if($nbr_col>=3) {?>
       element.appendChild(th33);
        <?php }if($nbr_col>=4) {?>
       element.appendChild(th44);
        <?php }if($nbr_col>=5) {?>
       element.appendChild(th55);
        <?php  } ?>


     linge.appendChild(element);

    </script>
<?php
       $index1  = $index0  + $index1 -1;
      $index2  = $index0 +$index2 -1;
      $index3  = $index0 + $index3 -1;
      $index4  = $index0 + $index4 -1;
      $index5  = $index0 + $index5 -1;

     }


      //echo  "index premier colonne =";
      //echo $index1;

 
?>
    
    
    
    <?php 


    
    
    if( $nbr_linge > 80 && $nbr_linge <= 100 ){

    $index = $y + 500;

?>


<!--   partie extra-->
<!--parti replir table 2 -->

 <script>
    var linge ;
    linge = document.getElementById("elemnt-table-extra"+ <?php echo json_encode($index); ?>  );

      var element = document.createElement("tr");
      var ele = document.createElement("th");
      var th2 = document.createElement("th");
      var th3 = document.createElement("th");
      var th4 = document.createElement("th");
      var th5 = document.createElement("th");

       <?php if($nbr_col>=2) {?>
      var th22 = document.createElement("th");
       <?php }if($nbr_col>=3) {?>
      var th33 = document.createElement("th");
       <?php }if($nbr_col>=4) {?>
      var th44 = document.createElement("th");
       <?php }if($nbr_col>=5) {?>
      var th55 = document.createElement("th");
        <?php  } ?>
 <?php  if($nbr_col>=2) {
                 $n = $x +$index1-1;
                 $m =$x +$index1;
                 $m2 =$x +$index2;
                 $m3 =$x +$index3;
                 $m4 =$x +$index4;
                  $m5 =$x +$index5;}
           else { $n =$x;
                $m =$x;
                $m2 =$x ;
                 $m3 =$x;
                 $m4 =$x ;
                 $m5 =$x;

                }
          ?>
      ele.innerHTML =<?php echo json_encode($stack[$n]); ?>;
      th2.innerHTML =<?php echo json_encode($stack2[$n]); ?>;
      th3.innerHTML =<?php echo json_encode( $stack3[$n]); ?>;
      th4.innerHTML =<?php echo json_encode( $stack4[$n] ); ?>;
      th5.innerHTML =<?php if($nbr_col>=2){  echo json_encode($test[$m]);
                             }  else{echo json_encode($stack5[$n]);} ?>;


             <?php if($nbr_col>=2) {?>
      th22.innerHTML =<?php echo json_encode($test[$m2]); ?>;
             <?php }if($nbr_col>=3) {?>
      th33.innerHTML =<?php echo json_encode($test[$m3]); ?>;
             <?php } if($nbr_col>=4) {?>
      th44.innerHTML =<?php echo json_encode($test[$m4]); ?>;
             <?php }if($nbr_col>=5) {?>
      th55.innerHTML =<?php echo json_encode($test[$m5]); ?>;
                <?php  } ?>

       element.appendChild(ele);
       element.appendChild(th2);
       element.appendChild(th3);
       element.appendChild(th4);
       element.appendChild(th5);

        <?php if($nbr_col>=2) {?>
       element.appendChild(th22);
        <?php  }if($nbr_col>=3) {?>
       element.appendChild(th33);
        <?php }if($nbr_col>=4) {?>
       element.appendChild(th44);
        <?php }if($nbr_col>=5) {?>
       element.appendChild(th55);
        <?php  } ?>


     linge.appendChild(element);

    </script>
<?php
       $index1  = $index0  + $index1 -1;
      $index2  = $index0 +$index2 -1;
      $index3  = $index0 + $index3 -1;
      $index4  = $index0 + $index4 -1;
      $index5  = $index0 + $index5 -1;

     }


      //echo  "index premier colonne =";
      //echo $index1;

 
?>
    
    
    
        
<?php 


 
    
    
    if( $nbr_linge > 100 && $nbr_linge <= 120 ){

    $index = $y + 600;

?>


<!--   partie extra-->
<!--parti replir table 2 -->

 <script>
    var linge ;
    linge = document.getElementById("elemnt-table-extra"+ <?php echo json_encode($index); ?>  );

      var element = document.createElement("tr");
      var ele = document.createElement("th");
      var th2 = document.createElement("th");
      var th3 = document.createElement("th");
      var th4 = document.createElement("th");
      var th5 = document.createElement("th");

       <?php if($nbr_col>=2) {?>
      var th22 = document.createElement("th");
       <?php }if($nbr_col>=3) {?>
      var th33 = document.createElement("th");
       <?php }if($nbr_col>=4) {?>
      var th44 = document.createElement("th");
       <?php }if($nbr_col>=5) {?>
      var th55 = document.createElement("th");
        <?php  } ?>
 <?php  if($nbr_col>=2) {
                 $n = $x +$index1-1;
                 $m =$x +$index1;
                 $m2 =$x +$index2;
                 $m3 =$x +$index3;
                 $m4 =$x +$index4;
                  $m5 =$x +$index5;}
           else { $n =$x;
                $m =$x;
                $m2 =$x ;
                 $m3 =$x;
                 $m4 =$x ;
                 $m5 =$x;

                }
          ?>
      ele.innerHTML =<?php echo json_encode($stack[$n]); ?>;
      th2.innerHTML =<?php echo json_encode($stack2[$n]); ?>;
      th3.innerHTML =<?php echo json_encode( $stack3[$n]); ?>;
      th4.innerHTML =<?php echo json_encode( $stack4[$n] ); ?>;
      th5.innerHTML =<?php if($nbr_col>=2){  echo json_encode($test[$m]);
                             }  else{echo json_encode($stack5[$n]);} ?>;


             <?php if($nbr_col>=2) {?>
      th22.innerHTML =<?php echo json_encode($test[$m2]); ?>;
             <?php }if($nbr_col>=3) {?>
      th33.innerHTML =<?php echo json_encode($test[$m3]); ?>;
             <?php } if($nbr_col>=4) {?>
      th44.innerHTML =<?php echo json_encode($test[$m4]); ?>;
             <?php }if($nbr_col>=5) {?>
      th55.innerHTML =<?php echo json_encode($test[$m5]); ?>;
                <?php  } ?>

       element.appendChild(ele);
       element.appendChild(th2);
       element.appendChild(th3);
       element.appendChild(th4);
       element.appendChild(th5);

        <?php if($nbr_col>=2) {?>
       element.appendChild(th22);
        <?php  }if($nbr_col>=3) {?>
       element.appendChild(th33);
        <?php }if($nbr_col>=4) {?>
       element.appendChild(th44);
        <?php }if($nbr_col>=5) {?>
       element.appendChild(th55);
        <?php  } ?>


     linge.appendChild(element);

    </script>
<?php
       $index1  = $index0  + $index1 -1;
      $index2  = $index0 +$index2 -1;
      $index3  = $index0 + $index3 -1;
      $index4  = $index0 + $index4 -1;
      $index5  = $index0 + $index5 -1;

     }


      //echo  "index premier colonne =";
      //echo $index1;

 
?>
    

    
    
    
    
    



 <?php

}

     ?>


   <script>
        var titre ;
        var domain;
        var intr;
        var image;
     image =  document.getElementById("image" + <?php echo json_encode($y); ?>  );
      image.src ="img/"+ <?php echo json_encode($img[$y]); ?>;
    titre= document.getElementById("titre" + <?php echo json_encode($y); ?>  );
    domain= document.getElementById("domain" + <?php echo json_encode($y); ?>  );
    intr = document.getElementById("intro" + <?php echo json_encode($y); ?>  );
     titre.innerHTML =<?php echo json_encode($stack6[$y]); ?>;
    domain.innerHTML =<?php echo json_encode($stack7[$y]); ?>;
    intr.innerHTML =<?php echo json_encode($stack8[$y]); ?>;

     </script>



 <?php


                   $stack = array();
                  $stack2 = array();
                  $stack3 = array();
                  $stack4 = array();
                  $stack5 = array();
                   $te1 = array();
                   $te2 = array();
                   $te3 = array();
                  $check1 = 0;
                  $check2 = 0;
                  $check3 =  0;
                  $test = array();
                  
                  //echo "nombre de domaine " .$y."=";
                  //echo $numbre_page;
                  
                  array_push($n_page,$numbre_page); 
                 }
                 
                 //echo $nrow;
                 /*
                 for($x = 0; $x < count($n_page); $x++) {
                     $i = $x+1;
                     echo "nombre domaine".count($n_page);
                     echo "nombre de domaine " .$i."=";
                     echo $n_page[$x];
                 }
                  
                  */
                 for($x = 1; $x < count($id_dom); $x++) {
                     $i = $x+1;
                     //echo "id de domaine " .$i."=";
                     //echo $id_domain[$x];
                   //  $conn = $pdo->query("UPDATE page (Id_domain,npage) VALUES ('".$id_domain[$x]."','".$n_page[$x]."' ) ");
                     
                     
                     
     $conn = $pdo->query("UPDATE page set npage = '".$n_page[$x]."' WHERE Id_domain = '".$id_dom[$x]."'  ");

                 }
                  
                  
                  
                 
 ?>


























      </body>

 </html>

