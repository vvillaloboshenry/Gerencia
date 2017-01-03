<?php

class Users {

    public $objDb;
    public $objSe;
    public $result;
    public $rows;
    public $useropc;
    public $idPerfil;
    public $arr_permisos;

    public function __construct() {
        $this->objDb = new Database();
        $this->objSe = new Sessions();
    }

    public function login_in() {

        $query = "SELECT * FROM users, profiles WHERE users.loginUsers = '" . $_POST["login_username"] . "' 
			AND users.passUsers = '" . $_POST["login_password"] . "' AND users.idprofile = profiles.idProfile ";
        $this->result = $this->objDb->select($query);
        $this->rows = mysql_num_rows($this->result);
        
        if ($this->rows > 0) {
            if ($row = mysql_fetch_array($this->result)) {
                $this->objSe->init();
                $this->objSe->set('user', $row["loginUsers"]);
                $this->objSe->set('iduser', $row["idUsers"]);
                $this->objSe->set('idprofile', $row["idprofile"]);
                $this->useropc = $row["nameProfi"];
                $this->idPerfil = $row["idprofile"];
                header('Location: ./#/administrador');
            }
            
           $this->objSe->set('arr_permisos', $this->getpermisos($this->idPerfil));
        } else {
            header('Location: login.php?error=1');
        }
    }

    public function getpermisos($id_perfil) {
       $query = "SELECT pe.tag as permisos FROM dt_permiso_perfil dp inner join profiles p on p.idProfile = dp.id_Perfil inner join permisos pe on dp.id_permiso=pe.id where p.idprofile ='" . $id_perfil . "'";
       $this->result = $this->objDb->select($query);
  
       $rpta;
       while ($q = mysql_fetch_assoc($this->result)) {
        $rpta[] = $q["permisos"];
       }
       mysql_free_result($this->result);
       return $rpta;
    }
}

?>