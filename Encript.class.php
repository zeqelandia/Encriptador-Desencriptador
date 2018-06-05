<?php
    class Mensaje{
        private $abecedario = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z"];
        
        public function encriptar($msj,$clave){
            $msjEncriptado=""; $letra; $nuevaLetra;
            for($i=0;$i<strlen($msj);$i++){
                if($msj[$i]!=" "){
                    $letra= array_search($msj[$i], $this->abecedario);
                    $nuevaLetra= $letra + $clave;

                    if($nuevaLetra>26){
                        $nuevaLetra-= 27;
                    }

                    if($msj[$i]=="ñ"){
                        echo "aca toys";
                        $msjEncriptado= $msjEncriptado."0";
                    }else{
                        $msjEncriptado= utf8_encode($msjEncriptado.$this->abecedario[$nuevaLetra]);
                    }

                }else{
                    $msjEncriptado=$msjEncriptado." ";
                }
            }
            return $msjEncriptado;
        }

        public function desencriptar($msj,$clave){
            $msjDesencriptado=""; $letra; $nuevaLetra;
            for($i=0;$i<strlen($msj);$i++){
                if($msj[$i]!=" "){
                    $letra= array_search($msj[$i], $this->abecedario);
                    $nuevaLetra= $letra - $clave;

                    if($nuevaLetra<0){
                        $nuevaLetra+= 27;
                    }

                    if($msj[$i]=="0"){
                        $msjDesencriptado= $msjDesencriptado."ñ";
                    }else{
                        $msjDesencriptado= $msjDesencriptado.$this->abecedario[$nuevaLetra];
                    }
                }else{
                    $msjDesencriptado=$msjDesencriptado." ";
                }
            }
            return $msjDesencriptado;
        }
    }
?>