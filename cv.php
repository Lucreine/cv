<?php
    class CV{
        private $nom;
        private $prenom;        
        private $adresse;
        private $telephone;
        private $email;
        private $situation;
        private $cursus;
        private $experiences;
        private $formations;
        private $atouts;
        private $competences;
        private $logiciels;
        private $langues;
        

        public function __construct($nom, $prenom, $adresse, $telephone, $email, $situation,$cursus,$experiences, $formations,$atouts,$competences,$logiciels,$langues){
            $this->nom = $nom;
            $this->prenom = $prenom; 
            $this->adresse = $adresse;
            $this->telephone = $telephone;
            $this->email = $email;
            $this->situation = $situation;
            $this->cursus = $cursus;
            $this->experiences = $experiences;
            $this->formations = $formations;
            $this->atouts=$atouts;
            $this->competences = $competences;
            $this->logiciels = $logiciels;
            $this->langues = $langues;
        }        
        public function afficher():string {
            $aff = " <h1> MON CURRICULUM VITAE</h1>";
            $aff .= "Nom : " . $this->nom . "<br>";
            $aff.= "Prénom : " . $this->prenom . "<br>";
            $aff .= "Adresse : " . $this->adresse . "<br>";
            $aff .= "Téléphone : " . $this->telephone . "<br>";
            $aff .= "Email : " . $this->email . "<br>";
            $aff .= "Situation Matrimoniale:" . $this-> situation. "<br><br>";
            
            $aff .= "<h2>Cursus Scolaire</h2>";
            foreach ($this->cursus as $cursus) {
                $aff .= "<p>" . $cursus . "</p>";
            }
            $aff .= "<h2>Expériences professionnelles</h2>";
            foreach ($this->experiences as $experience) {
                $aff .= "<p>" . $experience . "</p>";
            }
            
            $aff.= "<h2>Formations</h2>";
            foreach ($this->formations as $formation) {
                $aff .= "***";
                $aff .= "<p>DIPLOME :<strong> " . $formation['diplôme'] . "</strong><br>";
                $aff .= "DATE : ".$formation['date'] ."</p>";
                $aff .= "NOM DE L'ENTREPRISE:".$formation["nom de l'entreprise"] ."</p>";
            }

            $aff .= "<h2>Atouts</h2>";
            foreach ($this->atouts as $atout) {
                $aff .= "<p>" . $atout ."</p>";
            }
            $aff .= "<h2>Compétences</h2>";
            foreach ($this->competences as $competence) {
                $aff .= "<p>" . $competence . "</p>";
            }
            $aff .= "<h2>Langues</h2>";
            foreach ($this->langues as $langue) {
                $aff .= "<p>" . $langue. "</p>";
            }
            $aff .= "<h2>Logiciels</h2>";
            foreach ($this->logiciels as $logiciel) {
                $aff .= "<p>" . $logiciel. "</p>";
            }
            
            return $aff;
          }
           
        public function genererPDF(string $aff) {
            require_once("tcpdf/tcpdf.php");
            ob_start();
            $p= new TCPDF();
            $p->Addpage();
            $p->writeHTML($aff);
            $p->Output("mon cv.pdf","I");
        
        }
    }
    $cursus = array(
      " * 2020-2023 Licence en Informatique Réseaux et Télécommunications <br> 
      Spécialisé en Achitecture des Logiciels a ESGIS/ Cotonou",
      " * 2019-2020 BAC C au Collège de la Paix a COTONOU"
    );
    $experiences = array(
        " * Gestion d'un magasin avec le Lamgage PHP",
        " * Creation du jeu le mot le plus long en Langage C"
      );
    $formation = array(
        array(
          "diplôme" => "formation en informatique option Operatrice de saisie",
          "date" => "fevrier 2015 - juillet 2015",
          "nom de l'entreprise"=>"Projet NTIC , AVRANKOU"
        ),
        array(
          "diplôme" => "certification en Introduction a C#",
          "date" => "janvier 2023",
          "nom de l'entreprise"=>"Sololearn"
          ),
        
      );
      $atouts=array(
        " * Travail en équipe",
        " * Dynamisme",
        " * Bonne qualités morales"
      );
    $competences=array(
        " * Création de site web a partir d'HTML,CSS ,ET JAVASRIPT ET PHP",
        " * Gestion de Base de donnée SQL",
        " * Niveau moyen en Langage C et JAVA"
      );
      $logiciels=array(
        " * Excel",
        " * Word",
        " * PowerPoint",
        " * Visual Studio Code",
        " * Xampp",
        " * PyCharm",
        " * Visual Studio"
      );
      $langues=array(
        " * Français",
        " * Gun",
        " * Tori",
        " * Fon"
      );
      
    $contenu = new CV("ADANDE","Lucresse Reine",'Calavi/Kanglohe','67535145','adandelucressereine@gmail.com',"Célibataire sans enfants",$cursus,$experiences,$formation,$atouts,$competences,$logiciels,$langues);
    $contenu->genererPDF($contenu->afficher());
?>