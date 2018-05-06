<?php 
/* 

         $miarray=array();
        
        //echo var_dump($miarray);


            $miarray[0]="hola mundo";
            $miarray[1]="banana";
            $miarray[2]="undo";
            $miarray[3]="manzana";
            echo var_dump($miarray);
            unset($miarray[1]);
            echo var_dump($miarray); */

    class Clase
    {
        public $atributo1;
        public $atributo2;
        public $atributo3;
        function __construct($a,$b,$c)
        {
            $this->atributo1=$a;
            $this->atributo2=$b;
            $this->atributo3=$c;
            //$this->Write();
        }
        public function ToString()
        {
            echo var_dump($this);
            return $this->atributo1." - ".$this->atributo2;
        }
        public function Write()
        {
            $recurso=fopen("pruebaJSON.txt","w");
            fwrite($recurso,json_encode($this));
        }
    }
    $miobjeto=new clase("hola","mundo","leon");
    $miobjeto->ToString();

?>