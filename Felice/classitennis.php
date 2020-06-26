<?php
//CLASSE SOCI
class soci{
      private $db="";
      public function __construct($db){
       $this->db=$db;
      }
      public function getListaSoci(){
            $listSoci="SELECT * FROM `ct_soci`";
            $soci = $this->db->query($listSoci);
            foreach($soci as $socio){
            echo "<option value=".$socio['id'].">".$socio['nome']." ".$socio['cognome']."</option>";
            }
      }
      public function getSoci(){
        $richiesta="SELECT s.id AS u, s.*, t.* FROM `ct_soci` s INNER JOIN ct_tessera t ON (s.id=t.id_user) WHERE s.stato=1";
        $elencosoci=$this->db->query($richiesta);
        
        if(!$elencosoci){
          echo "Sei fallito";
        }else{
     echo '<table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Cognome</th>
          <th scope="col">Codice fiscale</th>
          <th scope="col">Tessera</th>
          <th scope="col">Azioni</th>

        </tr>
      </thead>
      <tbody>';
       foreach($elencosoci as $socii){
         $idsocio=$socii["u"];
         echo '<tr><th scope="row">'.$idsocio.'</th>
               <td>'.$socii["nome"].'</td>
               <td>'.$socii["cognome"].'</td>
               <td>'.$socii["codice_fiscale"].'</td>
               <td>'.$socii["codice_tessera"].'</td>
               <td><img onclick="update('.$socii["u"].",'".$socii["nome"]."','".$socii["cognome"]."','".$socii["data_nascita"]."','".$socii["codice_fiscale"]."','".$socii["data_rilascio_tessera"]."','".$socii["scadenza_tessera"]."','".$socii["codice_tessera"]."','".$socii["tipo_abbonamento"]."'".')"src="https://img.icons8.com/ios-glyphs/30/000000/design.png/"> <img onclick="cancella('.$socii["u"].')"src="https://img.icons8.com/wired/32/000000/filled-trash.png/"></td>
               </tr>';
            
       }
     echo ' </tbody> </table>';
      } 
}
      function getCard($id,$length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString =$id."_CT_";
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    }

//CLASSE CAMPI
class campi{
  private $db="";
  public function __construct($db){
   $this->db=$db;
  }
  public function getListaCampi(){
          $listCampi="SELECT * FROM `ct_campi`";
          $campi = $this->db->query($listCampi);
          foreach($campi as $campo){
          echo "<option value=".$campo['id'].">".$campo['nome_campo']." ".$campo['tipo_campo']." (".$this->getCopertura($campo['copertura']).")"."</option>";
          }
  }
    public function getCampi(){
              $richiesta="SELECT * FROM `ct_campi`";
              $elencocampi=$this->db->query($richiesta);
              if(!$elencocampi->num_rows){
                echo "Sei fallito 2 volte";
              }else{
          echo '<table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome campo</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Copertura</th>
              </tr>
            </thead>
            <tbody>';
          
            foreach($elencocampi as $campii){
              echo '<tr><th scope="row">'.$campii["id"].'</th>
                    <td>'.$campii["nome_campo"].'</td>
                    <td>'.$campii["tipo_campo"].'</td><td>'.
                    $this->getCopertura($campii["copertura"]).
                    '</td></tr>';
            }
          echo ' </tbody> </table>';
            } 
        }
        public function getCopertura($copertura){
          if($copertura==0){
            return 'Scoperto';
          }else{
            return 'Coperto';
          }
     }


}