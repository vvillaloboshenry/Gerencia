<?php

class Users {

    public $objDb;
    public $objSe;
    public $result;
    public $rows;
    public $useropc;
    public $idRol;
    public $arr_permisos;

    public function __construct() {
        $this->objDb = new Database();
        $this->objSe = new Sessions();
    }

    public function login_in() {

        $query = "SELECT * FROM Funcionario WHERE usuario = '" . mysql_real_escape_string($_POST["login_username"]) . "' 
			AND clave = '" . md5(mysql_real_escape_string($_POST["login_password"])) . "' AND dropState=1;";
        $this->result = $this->objDb->select($query);
        $this->rows = mysql_num_rows($this->result);

        if ($this->rows > 0) {
            if ($row = mysql_fetch_array($this->result)) {
                $this->objSe->init();
                $this->objSe->set('usuario', $row["usuario"]);
                $this->objSe->set('idFuncionario', $row["idFuncionario"]);
                $this->objSe->set('idRol', $row["idRol"]);
                $this->idRol = $row["idRol"];
                header('Location: ./#/administrador');
            }
            $this->objSe->set('arr_permisos', $this->getpermisos($this->idRol));
        } else {
            header('Location: login.php?error=1');
        }
    }

    public function getpermisos($idRol) {
        $query = "SELECT p.tag as permisos FROM dt_permiso_rol dp INNER JOIN Rol r ON dp.idRol=r.idRol INNER JOIN permisos p ON dp.idPermiso=p.idPermiso WHERE r.idRol ='" . $idRol . "'";
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