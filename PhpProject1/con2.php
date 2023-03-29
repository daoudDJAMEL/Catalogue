<?php

class Test
{
    public $id;
    public $name;
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}


class Intro
{
    public $Id;
    public $nbr_domain;
    public $domain;
    public $intro;
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}

class Cepage
{
    public $Id_cep;
    public $cepage;
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}

class Domain
{
    public $Id_domain;
    public $domain;
    public $Id_titre;
   
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}

class Page
{
    public $id;
    public $Id_domain;
    public $npage;
   
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}
class Format
{
    public $Id_format;
    public $format;
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}
class Millesime
{
    public $Id_mill;
    public $Mill;
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}
class Prix
{
    public $Id_prix;
    public $prix;
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}
class Produit
{
    public $Id_produit;
    public $descp;
    public $Id_domain;
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}
class Titre
{
    public $Id_titre;
    public $Titre;
    
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}

class Nbr_row_tanl
{
    public $id;
    public $domain;
    public $nb_row;
    
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}

class Relation
{
    public $id;
    public $Id_titre;
    public $Id_domain;
    public $Id_produit;
    public $Id_mill;
    public $Id_cep;
    public $Id_format;
    public $Id_prix;
    public $nbr_row_table;
    
    public function __toString()
    {
        return "<a>" . print_r($this, True) . "</a>";
    }
}


/*
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=dor_etde_vin", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/
class Connexion
	{
		private static $instance = null;
		private static $pdoInstance = null;
		private static $HOST = 'catalogue-mycgf-mariadb.external.kinsta.app:31205';
		private static $PORT = 31205;
                private static $DB = 'Catalogue';
		private static $USER = 'contact@doretdevins.com';
		private static $PWD = 'Contact123!';

		private function __construct()
		{
			$dsn = "mysql:host=" . self::$HOST . ";dbname=" . self::$DB . ";user=" . self::$USER . ";password=" . self::$PWD;

			try
			{
				self::$pdoInstance = new PDO($dsn);
			}
			catch (PDOException $e)
			{
				echo $e->getMessage();
			}
		}

		public static function getInstance()
		{
			if(is_null(self::$instance))
			{
				self::$instance = new Connexion();
			}

			return self::$instance;
		}

		public function query($query)
		{
			return self::$pdoInstance->query($query);
		}
	}

	$pdo = Connexion::getInstance();
        
      
	
        


?>