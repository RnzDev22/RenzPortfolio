<?php
class CSFCls {
    private $_db,
            $_Input,
            $_user;

    public function __construct(){
        $this->_db = DB::getInstance();
        $this->_Input = new Input();      
        $this->_user = new User();      
    }
    
    function csf_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = array()){
        switch($action){
            case 'Check':
                $parameters = array();
                foreach($params as $param=>$data) {
                    $parameters[] = '' . $param . ' = \'' . $data . '\'';
                }
                
                switch($qrytype){
                        
                    case 'HasRecord':
                        
                        try {
                            $stmt = $this->_db->query("SELECT Count(`ID`) AS `rowCount` FROM `ra_csf` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
                            return ($stmt > 0 ? true : false);
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;

                    case 'Cnt':
                        
                        try {
                            $stmt = $this->_db->query("SELECT COUNT(`ID`) AS `rowCount` FROM `ra_csf` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
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
                
                switch($qrytype){
                    case 'Cnt':
                        
                        try {
                            $stmt = $this->_db->query("SELECT COUNT(`ID`) AS `rowCount` FROM `ra_csf` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
                            return ($stmt);
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                    break;
                        
                    case 'csf':
                        $data = array();
                        $stmt = $this->_db->query("SELECT * FROM `ra_csf` WHERE ". implode(' AND ', $parameters) ."")->results();
                        
                        foreach($stmt as $row) {
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'CompanyName'   =>  $row -> CompanyName,
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
                        
                    case 'csflist':
                        $data = array();
                        $stmt = $this->_db->query("SELECT ra_csf.*, ra_testing_companies.CompanyName, ra_requestors.Representative, ra_requestors.Designation, ra_requestors.Address, ra_requestors.ContactNumber, ra_requestors.EMail
                        FROM `ra_csf` 
                        LEFT OUTER JOIN ra_testing_companies ON ra_testing_companies.ID = ra_csf.CompanySrcID
                        LEFT OUTER JOIN ra_requestors ON ra_requestors.ID = ra_csf.ClientSrcID

                        WHERE YEAR(ra_csf.CreationDate) = YEAR(NOW()) AND MONTH(ra_csf.CreationDate) = MONTH(NOW()) AND ra_csf.VoidStatus = 0 AND ra_testing_companies.VoidStatus = 0 AND ra_requestors.VoidStatus = 0 AND  ". implode(' AND ', $parameters) ."")->results();
                        
                        foreach($stmt as $row) {
                            $data[] = array(
                                'ID'                    =>  $row -> ID,
                                'CSFNumber'             =>  $row -> CSFNumber,
                                'AttendingStaffSrcID'   =>  $row -> AttendingStaffSrcID,
                                'ClientSrcID'           =>  $row -> ClientSrcID,
                                'Representative'        =>  $row -> Representative,
                                'CompanySrcID'          =>  $row -> CompanySrcID,
                                'CompanyName'           =>  $row -> CompanyName,
                                                                
                                'Designation'           =>  $row -> Designation,
                                'Address'               =>  $row -> Address,
                                'ContactNumber'         =>  $row -> ContactNumber,
                                'EMail'                 =>  $row -> EMail,
                                
                                'Professionalism'       =>  $row -> Professionalism, 
                                'Courtesy'              =>  $row -> Courtesy, 
                                'Rediness'              =>  $row -> Rediness, 
                                'Communication'         =>  $row -> Communication, 
                                'Knowledge'             =>  $row -> Knowledge,
                                'Accuracy'              =>  $row -> Accuracy,
                                'Overall'               =>  $row -> Overall,

                                'VoidStatus'            =>  $row -> VoidStatus,
                                'CreationDate'          =>  $row -> CreationDate,
                                'CreatedBy'             =>  $row -> CreatedBy,
                                'LastEditDate'          =>  $row -> LastEditDate,
                                'LastEditBy'            =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                    break;     
                        
                    case 'allcsf':
                        $data = array();
                        $stmt = $this->_db->query("SELECT ra_csf.*, ra_testing_companies.CompanyName, ra_requestors.Representative, ra_requestors.Designation, ra_requestors.Address, ra_requestors.ContactNumber, ra_requestors.EMail
                        FROM `ra_csf` 
                        LEFT OUTER JOIN ra_testing_companies ON ra_testing_companies.ID = ra_csf.CompanySrcID
                        LEFT OUTER JOIN ra_requestors ON ra_requestors.ID = ra_csf.ClientSrcID

                        WHERE YEAR(ra_csf.CreationDate) = YEAR(NOW()) AND ra_testing_companies.VoidStatus = 0 AND ra_requestors.VoidStatus = 0 AND  ". implode(' AND ', $parameters) ."")->results();
                        
                        foreach($stmt as $row) {
                            $data[] = array(
                                'ID'                    =>  $row -> ID,
                                'CSFNumber'             =>  $row -> CSFNumber,
                                'AttendingStaffSrcID'   =>  $row -> AttendingStaffSrcID,
                                'ClientSrcID'           =>  $row -> ClientSrcID,
                                'Representative'        =>  $row -> Representative,
                                'CompanySrcID'          =>  $row -> CompanySrcID,
                                'CompanyName'           =>  $row -> CompanyName,
                                                                
                                'Designation'           =>  $row -> Designation,
                                'Address'               =>  $row -> Address,
                                'ContactNumber'         =>  $row -> ContactNumber,
                                'EMail'                 =>  $row -> EMail,
                                
                                'Professionalism'       =>  $row -> Professionalism, 
                                'Courtesy'              =>  $row -> Courtesy, 
                                'Rediness'              =>  $row -> Rediness, 
                                'Communication'         =>  $row -> Communication, 
                                'Knowledge'             =>  $row -> Knowledge,
                                'Accuracy'              =>  $row -> Accuracy,
                                'Overall'               =>  $row -> Overall,

                                'VoidStatus'            =>  $row -> VoidStatus,
                                'CreationDate'          =>  $row -> CreationDate,
                                'CreatedBy'             =>  $row -> CreatedBy,
                                'LastEditDate'          =>  $row -> LastEditDate,
                                'LastEditBy'            =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                    break;
                        
                }
                
                
            break;
                
             case 'Generate':
                switch($qrytype){
                    case 'CSF_Number':
//                        $gen        =   new GeneralCls();
//                        $nRows      =   $this->_db->query("SELECT MAX(`ID`) as MaxID FROM `ra_csf`")->first()->MaxID; 
                        $nRows      =   $this->_db->query("SELECT CSFNumber as MaxID FROM ra_csf WHERE VoidStatus = 0  ORDER BY ID DESC LIMIT 1")->first()->MaxID; 
                        $highid     =   $nRows + 1;
//                        $OfficeCode =   $gen->offices_functions('GetDetails','OfficeCode',NULL,array('RegSrcID' => $field1),NULL,NULL);
                        
//                        return 'CSF-'.sprintf('%06d',$highid);
                        return sprintf('%05d',$highid);
                    break;
                }
            break;
                
            case 'Insert':

                switch($qrytype){
                    case 'Insert':
                        if(!$this->_db->insert('ra_csf', $fields)) {
                            throw new Exception('There was a problem creating new record.');
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
                    case 'Update':
                        $stmt = $this->_db->query("UPDATE `ra_csf` SET ".implode(', ', $update)." WHERE ".implode(' AND ', $parameters)."");
                    break;
                }
                
            break;

        }
    }
        
}