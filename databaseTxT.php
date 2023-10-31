<?php




class DataBase {

    public $header;
    public $db_name;
    
    public $ArrayBD;
    
    public function __construct($db_name, $header) {
        
        $this->db_name = $db_name;
        $this->header = $header;
        $this->Init();

    }

    public function Init() {
        
        if (!$this->ArrayBD) {
            $result = $this->CreateDB()["status"];

            if ($this->DBExist()) {
                $this->ArrayBD = $this->OpenDB();
            }
        }

    }

    public function OpenDB(){

        if ($this->DBExist()["status"]) {
            $result = $this->ReadDB();

            if ($result["status"]) {
                return $result["obj"];
            } else {
                return $result;
            }

        }
    }

    public function ReadDB() {
        
        $arquivo = file_get_contents($this->db_name);
        $result = $this->ConvertBD_to_ArrayBD($arquivo)["obj"]; 

        if ($result["status"]) {
            $this->ArrayBD = $result["obj"];
            return ["status"=>true,"msg"=>"Dados $this->db_name.txt convertido em ArrayBD"];
        } else {
            return ["status"=>false,"msg"=>"Não foi possível converter $this->db_name.txt em ArrayBD"];
        }
    }


    public function ConvertBD_to_ArrayBD($data=null) {
    
        if ($data) {
            $result = $this->Verificar_Headers($data);

            if ($result["status"]) {
            
                $result = $this->ConvertTxT_to_Array($data);
                var_dump($result);

            }

        }

    }


    public function ConvertTxT_to_Array($data) {
        
        return 1;


    }
    
    public function Verificar_Headers($textoDB) {
    
        $head = explode(",",explode("\n", $textoDB)[0]);

        $head[count($head)-1] = rtrim($head[count($head)-1], $head[count($head)-1][-1]);

        if ($this->arrays_are_equal($head, $this->header)) {
            return ["status"=>true,"msg"=> "Os headers batem!"];
        } else {
            return ["status"=>false,"msg"=> "Os headers não batem!"];
        }



    }

    function arrays_are_equal($array1, $array2) {
        if (count($array1) !== count($array2)) {
            return false;
        }
    
        foreach ($array1 as $key => $value) {
            if (!array_key_exists($key, $array2) || $array2[$key] !== $value) {
                return false;
            }
        }
    
        return true;
    }


    public function DBExist() {
        if (file_exists($this->db_name)) {
            return ["status" => true, "msg" => "O Banco de dados $this->db_name existe"];
            
        } else {
            return ["status" => false, "msg" => "O Banco de dados $this->db_name não existe!"];
        
        }
    }

    public function CreateDB() {

        if (file_exists($this->db_name)) {
            
            $arquivo = file_get_contents($this->db_name);
            return ["status" => false, "msg" => "Arquivo já existe"];
            
        } else {
            
            $texto = $this->GetHeadertoString();
            $arquivo = fopen($this->db_name,"w");
            fwrite($arquivo, $texto);

            return ["status" => true, "msg" => "Arquivo foi criado"];

        }

    }

    public function GetHeadertoString() {

        $texto = "";
        foreach ($this->header as $key => $value) {
            if ($key == 0) {
                $texto .= "$value";
            } else {
                $texto .= ",$value";
            }
        }
        
        return $texto;

    }


}


$data = new DataBase("pacientes",["id","nome","data_nascimento"]);






?>