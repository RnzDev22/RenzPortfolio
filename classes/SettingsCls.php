<?php
class SettingsCls {
    private $_db,
            $_Input,
            $_user;

    public function __construct(){
        $this->_db = DB::getInstance();
        $this->_Input = new Input();      
        $this->_user = new User();      
    }
    
    function settings_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = array()){
        switch($action){
            
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){                        
                        
                    case 'Company':
                        $data = array();
                        $stmt = $this->_db->query("SELECT * FROM `ra_testing_companies` WHERE ". implode(' AND ', $parameters) ."")->results();
                        
                        foreach($stmt as $row) {
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'CompanyName'   =>  $row -> CompanyName,
                                'Address'       =>  $row -> Address,
                                'NameOfOwner'   =>  $row -> NameOfOwner,
                                'ContactNumber' =>  $row -> ContactNumber,
                                'EMail'         =>  $row -> EMail,
                                'Status'        =>  $row -> Status,
                                'VoidStatus'    =>  $row -> VoidStatus,
                                'CreationDate'  =>  $row -> CreationDate,
                                'CreatedBy'     =>  $row -> CreatedBy,
                                'LastEditDate'  =>  $row -> LastEditDate,
                                'LastEditBy'    =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                    break;
                        
                    case 'Client':
                        $data = array();
                        $stmt = $this->_db->query("SELECT ra_requestors.ID, ra_requestors.CompanySrcID, ra_testing_companies.CompanyName, ra_testing_companies.NameOfOwner, ra_requestors.Representative, ra_requestors.Designation, ra_requestors.Address, ra_requestors.ContactNumber, ra_requestors.EMail, ra_requestors.Status, ra_requestors.VoidStatus, ra_requestors.CreationDate, ra_requestors.CreatedBy, ra_requestors.LastEditDate, ra_requestors.LastEditBy FROM `ra_requestors` LEFT OUTER JOIN ra_testing_companies ON ra_testing_companies.ID = ra_requestors.CompanySrcID
                        WHERE ". implode(' AND ', $parameters) ."")->results();
                        
                        foreach($stmt as $row) {
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'CompanySrcID'  =>  $row -> CompanySrcID,
                                'CompanyName'   =>  $row -> CompanyName,
                                'NameOfOwner'   =>  $row -> NameOfOwner,
                                'Representative'=>  $row -> Representative,
                                'Designation'   =>  $row -> Designation,
                                'Address'       =>  $row -> Address,
                                'ContactNumber' =>  $row -> ContactNumber,
                                'EMail'         =>  $row -> EMail,
                                'Status'        =>  $row -> Status,
                                'VoidStatus'    =>  $row -> VoidStatus,
                                'CreationDate'  =>  $row -> CreationDate,
                                'CreatedBy'     =>  $row -> CreatedBy,
                                'LastEditDate'  =>  $row -> LastEditDate,
                                'LastEditBy'    =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                    break;
                        
                    case 'Warehouse':
                        $data = array();
                        $stmt = $this->_db->query("SELECT ra_warehouse.ID, ra_warehouse.CompanySrcID, ra_testing_companies.CompanyName, ra_warehouse.Warehouse, ra_warehouse.Address, ra_warehouse.Status, ra_warehouse.VoidStatus, ra_warehouse.CreationDate, ra_warehouse.CreatedBy, ra_warehouse.LastEditDate, ra_warehouse.LastEditBy FROM `ra_warehouse` LEFT OUTER JOIN ra_testing_companies ON ra_testing_companies.ID = ra_warehouse.CompanySrcID
                        WHERE ". implode(' AND ', $parameters) ."")->results();
                        
                        foreach($stmt as $row) {
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'CompanySrcID'  =>  $row -> CompanySrcID,
                                'CompanyName'   =>  $row -> CompanyName,
                                'Warehouse'     =>  $row -> Warehouse,
                                'Address'       =>  $row -> Address,
                                'Status'        =>  $row -> Status,
                                'VoidStatus'    =>  $row -> VoidStatus,
                                'CreationDate'  =>  $row -> CreationDate,
                                'CreatedBy'     =>  $row -> CreatedBy,
                                'LastEditDate'  =>  $row -> LastEditDate,
                                'LastEditBy'    =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                    break;
                        
                     case 'Users':
                        $data = array();
                        $stmt = $this->_db->query("SELECT ra_users_pub.ID, ra_users_pub.CompanySrcID, ra_testing_companies.CompanyName, ra_users_pub.Firstname, ra_users_pub.Lastname, ra_users_pub.Address, ra_users_pub.EMail, ra_users_pub.Password, ra_users_pub.DisplayPassword, ra_users_pub.Status, ra_users_pub.VoidStatus, ra_users_pub.CreationDate, ra_users_pub.CreatedBy, ra_users_pub.LastEditDate, ra_users_pub.LastEditBy FROM `ra_users_pub` LEFT OUTER JOIN ra_testing_companies ON ra_testing_companies.ID = ra_users_pub.CompanySrcID
                        WHERE ". implode(' AND ', $parameters) ."")->results();
                        
                        foreach($stmt as $row) {
                            $data[] = array(
                                'ID'                =>  $row -> ID,
                                'CompanySrcID'      =>  $row -> CompanySrcID,
                                'CompanyName'       =>  $row -> CompanyName,
                                'Firstname'         =>  $row -> Firstname,
                                'Lastname'          =>  $row -> Lastname,
                                'Address'           =>  $row -> Address,
                                'EMail'             =>  $row -> EMail,
                                'Password'          =>  $row -> Password,
                                'DisplayPassword'   =>  $row -> DisplayPassword,
                                'Status'            =>  $row -> Status,
                                'VoidStatus'        =>  $row -> VoidStatus,
                                'CreationDate'      =>  $row -> CreationDate,
                                'CreatedBy'         =>  $row -> CreatedBy,
                                'LastEditDate'      =>  $row -> LastEditDate,
                                'LastEditBy'        =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                    break;
                }
                
                
            break;
                
            case 'InsertCompany':

                switch($qrytype){
                    case 'InsertCompany':
                        if(!$this->_db->insert('ra_testing_companies', $fields)) {
                            throw new Exception('There was a problem creating new record.');
                        }
                    break;
                }
                
                
            break;
            
            case 'InsertClient':

                switch($qrytype){
                    case 'InsertClient':
                        if(!$this->_db->insert('ra_requestors', $fields)) {
                            throw new Exception('There was a problem creating new record.');
                        }
                    break;
                }
                
                
            break;
                
            case 'InsertWarehouse':

                switch($qrytype){
                    case 'InsertWarehouse':
                        if(!$this->_db->insert('ra_warehouse', $fields)) {
                            throw new Exception('There was a problem creating new record.');
                        }
                    break;
                }
                
                
            break;
                
                
            
                
            case 'InsertUsers':
                case 'Register_User':
                    $options = ['cost' => 11];
                    $fields['Password'] = password_hash($fields['Password'], PASSWORD_BCRYPT, $options);

                    if(!$this->_db->insert('ra_users_pub', $fields)) {
                        throw new Exception('There was a problem creating an account.');
                    }
                break;

                switch($qrytype){
                    case 'InsertUsers':
                        $options = ['cost' => 11];
                        $fields['Password'] = password_hash($fields['Password'], PASSWORD_BCRYPT, $options);
                        
                        if(!$this->_db->insert('ra_users_pub', $fields)) {
                            throw new Exception('There was a problem creating new record.');
                        }
                    break;
                }
                
                
            break;
                
            case 'UpdateCompany':
                
                $update = array();
                foreach($fields as $field=>$data) {
                    $update[] = '`' . $field . '` = \'' . $data . '\'';
                }

                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '`' . $param . '` = \'' . $data . '\'';
                }
        
                switch($qrytype){
                    case 'UpdateCompany':
                        $stmt = $this->_db->query("UPDATE `ra_testing_companies` SET ".implode(', ', $update)." WHERE ".implode(' AND ', $parameters)."");
                    break;
                }
                
            break;
                
            case 'UpdateClient':
                
                $update = array();
                foreach($fields as $field=>$data) {
                    $update[] = '`' . $field . '` = \'' . $data . '\'';
                }

                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '`' . $param . '` = \'' . $data . '\'';
                }
        
                switch($qrytype){
                    case 'UpdateClient':
                        $stmt = $this->_db->query("UPDATE `ra_requestors` SET ".implode(', ', $update)." WHERE ".implode(' AND ', $parameters)."");
                    break;
                }
                
            break;
                
            case 'UpdateWarehouse':
                
                $update = array();
                foreach($fields as $field=>$data) {
                    $update[] = '`' . $field . '` = \'' . $data . '\'';
                }

                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '`' . $param . '` = \'' . $data . '\'';
                }
        
                switch($qrytype){
                    case 'UpdateWarehouse':
                        $stmt = $this->_db->query("UPDATE `ra_warehouse` SET ".implode(', ', $update)." WHERE ".implode(' AND ', $parameters)."");
                    break;
                }
                
            break;
                
            case 'UpdateUsers':
                
                $update = array();
                foreach($fields as $field=>$data) {
                    $update[] = '`' . $field . '` = \'' . $data . '\'';
                }

                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '`' . $param . '` = \'' . $data . '\'';
                }
                
                switch($qrytype){
                    case 'UpdateUsers':
                        $stmt = $this->_db->query("UPDATE `ra_users_pub` SET ".implode(', ', $update)." WHERE ".implode(' AND ', $parameters)."");
                    break;
                }
                
            break;

        }
    }
    
    /*Crop Functions*/
    function crop_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = array(),$startdate = NULL,$enddate = NULL){
        switch($action){

            case 'Check':
                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '' . $param . ' = \'' . $data . '\'';
                }
                
                switch($qrytype){
                        
                    case 'HasRecord':
                        
                        try {
                            $stmt = $this->_db->query("SELECT Count(`ID`) AS `rowCount` FROM `crop_list` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
                            return ($stmt > 0 ? true : false);
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;
                        
                    case 'NumofDays';
                        
                        try {
                            $stmt = $this->_db->query("SELECT `EstNumDays` AS `rowCount` FROM `crop_list` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
                            return ($stmt);
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;
                        
                }
            break;
            
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype) {
                    case "List":
                        $qry = "SELECT * FROM `crop_list` WHERE ". implode(' AND ', $parameters) ." ORDER BY `ID` ASC";
                        
                        $data = array();
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'ScientificName'=>  $row -> ScientificName,
                                'CommonName'    =>  $row -> CommonName,
                                'Substrate'     =>  $row -> Substrate,
                                'Temperature'   =>  $row -> Temperature,
                                'FirstCount'    =>  $row -> FirstCount,
                                'FinalCount'    =>  $row -> FinalCount,
                                'Additional'    =>  $row -> Additional,
                                'Status'        =>  $row -> Status,
                                'CreationDate'  =>  $row -> CreationDate,
                                'CreatedBy'     =>  $row -> CreatedBy,
                                'LastEditDate'  =>  $row -> LastEditDate,
                                'LastEditBy'    =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                        
                        break;
                        
                    case "Crop":
                        $stmt = $this->_db->query("SELECT `CommonName` FROM `crop_list` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> CommonName;
                        }
                        break;
                }
            break;
                
            case 'Insert':

                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('crop_list', $fields)) {
                            throw new Exception('There was a problem creating a new crop information.');
                        }
                    break;
                }
                
            break;
                
            case 'Update':
                
                $update = array();
                foreach($fields as $field=>$data) {
                    $update[] = '`' . $field . '` = \'' . $data . '\'';
                }

                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '`' . $param . '` = \'' . $data . '\'';
                }
        
                switch($qrytype){
                    case 'Data':
                        $stmt = $this->_db->query("UPDATE `crop_list` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                    break;
                }
                
            break;
        }
    }
    /*End Crop Functions*/
    
    /*Varieties Functions*/
    function varieties_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = array(),$startdate = NULL,$enddate = NULL){
        switch($action){

            case 'Check':
                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '' . $param . ' = \'' . $data . '\'';
                }
                
                switch($qrytype){
                        
                    case 'HasRecord':
                        
                        try {
                            $stmt = $this->_db->query("SELECT Count(`ID`) AS `rowCount` FROM `crop_varieties_list` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
                            return ($stmt > 0 ? true : false);
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                    break;
                        
                }
            break;
            
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype) {
                    case "List":
                        $qry = "SELECT * FROM `crop_varieties_list` WHERE ". implode(' AND ', $parameters) ." ORDER BY `ID` ASC";
                        
                        $data = array();
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'Crop'          =>  $row -> Crop,
                                'Variety'       =>  $row -> Variety,
                                'Status'        =>  $row -> Status,
                                'CreationDate'  =>  $row -> CreationDate,
                                'CreatedBy'     =>  $row -> CreatedBy,
                                'LastEditDate'  =>  $row -> LastEditDate,
                                'LastEditBy'    =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                        
                        break;
                        
                    case "Variety":
                        $stmt = $this->_db->query("SELECT `Variety` FROM `crop_varieties_list` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> Variety;
                        }
                        break;
                }
            break;
                
            case 'Insert':

                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('crop_varieties_list', $fields)) {
                            throw new Exception('There was a problem creating a new crop information.');
                        }
                    break;
                }
                
            break;
                
            case 'Update':
                
                $update = array();
                foreach($fields as $field=>$data) {
                    $update[] = '`' . $field . '` = \'' . $data . '\'';
                }

                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '`' . $param . '` = \'' . $data . '\'';
                }
        
                switch($qrytype){
                    case 'Data':
                        $stmt = $this->_db->query("UPDATE `crop_varieties_list` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                    break;
                }
                
            break;
        }
    }
    /*End Varieties Functions*/
        
}