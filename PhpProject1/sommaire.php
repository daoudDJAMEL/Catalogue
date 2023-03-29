<?php include('conn.php');
?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <title>Catalogue D'or et de vins</title>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style type="text/css">


   


.wrapper1{
            max-width:1090px; 
             padding-right: 10px;
            padding-left: 10px;
            padding-bottom: 20px;
            margin: auto;
            margin-bottom: 400px;
            border: 1px solid black;
           height: fit-content;
  
}





.container-titre-left {
   
    background-color: red;
    margin-left:150px;
        
}

.container-domaine {
    display: flex;
  margin: auto;
  border: 3px solid #73AD21;
  padding: 10px;

    
}

.container-domaine-right {
    width: 500px;
    height: 100px;
    margin-left:200px;
}

 .ligne-tableau {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            margin-bottom: 20px;
         
        }

.ligne-tableau .titre {
            width: 40%;
            margin-left: 100px;
            font-size: 12px;
           font-weight: bold;
             text-align: end;
        }

        img {
            width: 30px;
            height: 20px;
            margin-left: 20px;
            margin-top: 6px;
           
        }
        p{
            margin-top: 0px;
            
        }

 .ligne-tableau-right {
            width: 60%;
             margin-bottom: 30px;
        }

        .ligne-tableau-right-container {
            display: flex;
           background-color:white;
           margin-left: 0px;
          
           
        }
        .ligne-tableau-right-container domaine-name {
            display: flex;
         
           margin-left: 10px;
           background-color: blue;
           margin-top: 0px;
        }
        a {
           margin-top: 0px;
           margin-right: 80px; 
        }
        
        .ligne-tableau-right-container span {
            width: 50%;
            margin-right: 20px;
            text-align: center;
            height: 25px;
          
           
        }
        
        
        
        .ligne-tableau-right-img{
             height: fit-content;
             
            
        }
        
        .ligne-tableau-right-container p{
            font-size: 20px;
            margin-bottom: 5px;
            font-weight: bold;
            
              
          
        }
        
        .titre-a{
            margin-left: 100px;
            
        }
        
   </style>

  </head>
  <body>

 

      <article class="wrapper1" id ="pag1" style="//background-color:red;">
       <h3 style="text-align: center;font-size: 2.5em;color: #ceb54d; "><b>Sommaire</b></h3>
   
        <div class="ligne-tableau" id="line1" style="//background-color:yellow;margin-bottom: 0px; ">
            
            
            <span  id="titree1" class="titre ligne-tableau-right-container " > </span>
            
            <span class="ligne-tableau-right" id="domaine1" style="//background-color:pink;"></span>
        </div>
              
                
      </article>
            
       
   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
       <?php
       $image ="logbio.png";
       $image2 ="hve.jpeg";
        
              
                  $id_domain = 1;
                  $stacke6 = array();
                  $stacke7 = array();
                  $id_dom = array();
                  $n_page = array();
                  
                  $index = 0;
                  $nrowt =0;
                  $id_titre = array();
                  array_push($id_titre," ");
                  array_push($id_dom," ");
                  array_push($n_page," ");
                  
                $conntrt = $pdo->query("SELECT * FROM titre " );
                $conntrt->setFetchMode(PDO::FETCH_CLASS, 'Titre');
                
                while($restrt = $conntrt->fetch()){
                 array_push($id_titre, $restrt->Id_titre);
                 $nrowt =$nrowt +1; 
                }
                $nrowt =$nrowt +1; 
               
                for(  $y = 1;  $y < $nrowt;   $y++) { 

                $connt = $pdo->query("SELECT * FROM titre  where Id_titre =  '".$id_titre[$y]."'" );
                $connt->setFetchMode(PDO::FETCH_CLASS, 'Titre');
                $rest = $connt->fetch();
                
                $connd = $pdo->query("SELECT * FROM domain  where Id_titre=  '".$id_titre[$y]."'" );
                $connd->setFetchMode(PDO::FETCH_CLASS, 'Domain');

               
                while ($resd = $connd->fetch()){
                     array_push($id_dom,$resd->Id_domain);
                    
                 
                }
               
        
         
                 
         }
         
         
                
                for($x = 1; $x < count($id_dom); $x++) {
                 $conndp = $pdo->query("SELECT * FROM page  where Id_domain=  '".$id_dom[$x]."'" );
                $conndp->setFetchMode(PDO::FETCH_CLASS, 'Page');
                $resdp = $conndp->fetch();
                array_push($n_page,$resdp->npage);
                     
                 }
                 
                 /*
                 for($x = 1; $x < count($n_page); $x++) {
                     $i = $x+1;
                     
                     echo "nombre de domaine " .$x."=";
                     echo $n_page[$x];
                 }
                 */
                 
                 
                 $conntr = $pdo->query("SELECT * FROM domain " );
                $conntr->setFetchMode(PDO::FETCH_CLASS, 'Domain');
                $nrow =0;
                while($restr = $conntr->fetch()){
                 $nrow = $nrow +1;
                // echo $restr->Id_domain;
                }
                 
                 
                 
                 
                 
                 
                 
               for(  $y = 1;  $y < $nrowt;   $y++) { 
               
                //echo $resa->Domain;
              
                array_push($stacke6," ");
                array_push($stacke7," ");
                $connt = $pdo->query("SELECT * FROM titre  where Id_titre =  '".$id_titre[$y]."'" );
                $connt->setFetchMode(PDO::FETCH_CLASS, 'Titre');
                $rest = $connt->fetch();
                
                $connd = $pdo->query("SELECT * FROM domain  where Id_titre=  '".$id_titre[$y]."'" );
                $connd->setFetchMode(PDO::FETCH_CLASS, 'Domain');
                
                
                
                $titre= $rest->Titre;
                 array_push($stacke7,$rest->Titre);
                  //echo $rest->Titre;
                //  echo $stacke7[0];
                while ($resd = $connd->fetch()){
                     array_push($stacke6,$resd->Domain);
                    // array_push($id_dom,$resd->Id_domain);
                    
                  //  echo $resd->Domain;
                }
               
              
       
         ?>
        <?php if($y != $nrowt) :?>     
        <script>
         var clone = $("#line"+<?php echo json_encode($y); ?>).clone();
    
        clone.attr("id", "line"+ <?php echo json_encode($y+1); ?>);        
        clone.find("#titree"+<?php echo json_encode($y); ?>).attr("id","titree" + <?php echo json_encode($y+1); ?>);
        clone.find("#domaine"+<?php echo json_encode($y); ?>).attr("id","domaine" + <?php echo json_encode($y+1); ?>);
      
        
         
        
    clone.appendTo("#pag1");
         
          var titre ;
          var domain;
          var p = document.createElement("p");
          p.setAttribute('class', 'titre-a');
          titre= document.getElementById("titree" + <?php echo json_encode($y); ?>  );
         // titre.innerHTML =<?php echo json_encode($titre." :"); ?>;
          p.innerHTML =<?php echo json_encode($titre." :"); ?>;
          titre.appendChild(p);
          domain= document.getElementById("domaine" + <?php echo json_encode($y); ?>  );
         
       
   </script>
        

   
   <?php
 
      endif;
            
  for($x = 1; $x < count($stacke6); $x++) {
  
    ?>
        
  <script> 
     // textd = document.getElementById("text-domain" + <?php echo json_encode( $y); ?>  );
           var div  = document.createElement("div");
        div.setAttribute('class', 'ligne-tableau-right-container');
        
         
        
         var span  = document.createElement("div");
         span.setAttribute('class', 'ligne-tableau-right-container');
         
         var element = document.createElement("p");
          var element2 = document.createElement("p");
        var a = document.createElement("a");
        a.setAttribute('href', '#page'+<?php echo json_encode($id_dom[$id_domain]);?>);
        element.innerHTML =<?php echo json_encode("- ".$stacke6[$x]); ?>;
        
        element2.innerHTML =<?php echo json_encode("p".$n_page[$id_domain]); ?>;
        a.append(element);
        
        div.appendChild(a);
        span.appendChild(element2);
        //div.appendChild(element);
      // 
      //  
      //   
      //   
     // div.appendChild(span);
       div.appendChild(span);
       domain.appendChild(div);
     
           
     </script>

   
 <?php  
    if( $stacke6[$x] == "Domaine Roland Schmitt" or  $stacke6[$x] == "Domaine Peyrat-Fourthon" or  $stacke6[$x] == "Château Bonnange" or  $stacke6[$x] == "Saint Armettu" or  $stacke6[$x] == "Domaine Gentile" or  $stacke6[$x] == "Château La calisse" or  $stacke6[$x] == "Sauveroy" or  $stacke6[$x] == "Château de Poncé"  or  $stacke6[$x] == "Domaine du Cassard" or  $stacke6[$x] == "Comte Montebello" or  $stacke6[$x] =="Castellu di Baricci" or  $stacke6[$x] == "Château Saint-Maur" or  $stacke6[$x] =="Grandes Serres"or   $stacke6[$x] =="Paul Jaboulet Ainé" ){
 ?> 
      
       <script> 
       //var d = document.createElement("div");
        var div2  = document.createElement("div");
       div2.setAttribute('class', 'ligne-tableau-right-img');
      
       
       var elementimg = document.createElement("img");
        elementimg.src ="img/" + <?php echo json_encode($image); ?>;
        elementimg.alt="logo";
        
        div2.append(elementimg);
        
        div.appendChild(div2);
       
       
      
     </script>
    <?php }  
else{
 ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

     <script>
        
        var div2  = document.createElement("div");
       div2.setAttribute('class', 'ligne-tableau-right-img');
      
       
       var elementimg = document.createElement("img");
        elementimg.src ="img/" + <?php echo json_encode($image2); ?>;
        elementimg.alt="logo";
        
        div2.append(elementimg);
        
        div.appendChild(div2);
       
       
      
     </script>
      
<?php  

}
            $id_domain =  $id_domain+1;   
            
}

             $stacke6 = array();
        }
        
        
          
                             
 ?>  
 