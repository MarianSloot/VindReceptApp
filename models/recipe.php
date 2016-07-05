<?php
  class Recipe {
    // we define 5 attributes
    // they are public so that we can access them using $recipe->receptNaam directly
    public $receptID;
    public $receptNaam;
    public $boekNaam;
    public $pagina;
    public $receptType;
    public $opmerking;

    public function __construct($receptID, $receptNaam, $boekNaam, $pagina, $receptType, $opmerking) {
      $this->receptID  = $receptID;
      $this->receptNaam  = $receptNaam;
      $this->boekNaam  = $boekNaam;
      $this->pagina = $pagina;
      $this->receptType = $receptType;
      $this->opmerking = $opmerking;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
    //  $req = $db->query('SELECT * FROM marian_newdb.recept');
       $req = $db->query('SELECT receptID, receptNaam,boekNaam,pagina,receptType,opmerking
from marian_newdb.recept join marian_newdb.boek on marian_newdb.recept.boekID = marian_newdb.boek.boekID;');

      // we create a list of Recipe objects from the database results
      foreach($req->fetchAll() as $recipe) {
        $list[] = new Recipe($recipe['receptID'], $recipe['receptNaam'], $recipe['boekNaam'], $recipe['pagina'],
        $recipe['receptType'], $recipe['opmerking']);
      }

      return $list;
    }

    public static function find($receptID) {
      $db = Db::getInstance();
      // we make sure $receptID is an integer
      $receptID = intval($receptID);
      $req = $db->prepare('SELECT receptID, receptNaam,boekNaam,pagina,receptType, opmerking
        from marian_newdb.recept join marian_newdb.boek on marian_newdb.recept.boekID = marian_newdb.boek.boekID;
        WHERE receptID = :receptID');
      // the query was prepared, now we replace :receptID with our actual $receptID value
      $req->execute(array('receptID' => $receptID));
      $recipe = $req->fetch();

      return new Recipe($recipe['receptID'], $recipe['receptNaam'], $recipe['boekNaam'], $recipe['pagina'],
      $recipe['receptType'], $recipe['opmerking']);
    }
  }
?>
