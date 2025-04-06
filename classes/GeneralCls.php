<?php 
class GeneralCls {
    private $_db,
            $_Input,
            $_user;

    public function __construct(){
        $this->_db = DB::getInstance();
        $this->_Input = new Input();      
        $this->_user = new User();      
    }
    
    /* System Validation */
    public function output_errors($errors) {
        $output = array();
        foreach($errors as $error) {
            $output[] = '<li>'. $error. '</li>';
        }
        return '<ul>'.implode('', $output).'</ul>';

    }
    
    public function clean_input($string){
        return str_replace("'","''",$string);
    }
    /* End System Validation */
    
    /*URL Safe Encode*/
    function url_encode($str){
        return strtr(base64_encode($str), '+/', '-_');
    }
    
    function url_decode($base64url){
        return base64_decode(strtr($base64url, '-_', '+/'));
    }
    /*End URL Safe Encode*/
    
    /*Jeru Custom Encrypt Decrypt*/
    function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'MyLifeMyLoveMySoul093029';
        $secret_iv = 'ZgvyZwynG3r@nc3J3ru';
        
        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
    /*End Jeru Custom Encrypt Decrypt*/
    
    function NumOfWeeks() {
        $date = new DateTime;
        $date->setISODate(date("Y"), 53);
        return ($date->format("W") === "53" ? 53 : 52);
    }
    
    function getStartAndEndDate($week) {
        $dto = new DateTime();
        $ret['week_start'] = $dto->setISODate(date("Y"), $week)->modify('-1 days')->format('Y-m-d');
        $ret['week_end'] = $dto->modify('+6 days')->format('Y-m-d');
        $ret['week_end_add_1'] = $dto->setISODate(date("Y"), $week)->modify('-1 days')->modify('+7 days')->format('Y-m-d');
        return $ret;
    }

    function NumOfMonths() {
        $date = new DateTime;
        $date->setISODate(date("Y"), 12);
        return ($date->format("M") === "12" ? 12 : 12);
    }
    
    function GetMonthName($SelMonth){
        $dateObj   = DateTime::createFromFormat('!m', $SelMonth);
        return $dateObj->format('F');
    }
    
    function days_in_month($month, $year) { 
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31); 
    }
    
    function get_time_difference($time1, $time2) {
        $time1 = strtotime("1980-01-01 $time1");
        $time2 = strtotime("1980-01-01 $time2");

        if ($time2 < $time1) {
            $time2 += 86400;
        }

        return date("H:i:s", strtotime("1980-01-01 00:00:00") + ($time2 - $time1));
    }

    function DaysPass($qrytype,$Date = null){
        switch ($qrytype){
            case "All":
                if ($Date){
                    $time = strtotime($Date) - strtotime(date("Y-m-d H:i")); 
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time");
                    return $dtF->diff($dtT)->format('%a day(s), %h hour(s), %i minute(s)');
                }
            break;
            case "Days":
                if ($Date){
                    $time = strtotime($Date) - strtotime(date("Y-m-d H:i")); 
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time");
                    return $dtF->diff($dtT)->format('%a day(s)');
                }
            break;
            case "NoMins":
                if ($Date){
                    $time = strtotime($Date) - strtotime(date("Y-m-d H:i")); 
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time");
                    return $dtF->diff($dtT)->format('%a day(s), %h hour(s)');
                }
            break;
        }

    }

    function DaysPass_By_RtvDate($qrytype,$DateFrom = null, $DateTo = null){
        switch ($qrytype){
            case "All":
                if ($DateFrom){
                    $time = strtotime($DateFrom) - strtotime($DateTo); 
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time");
                    return $dtF->diff($dtT)->format('%a day(s), %h hour(s), %i minute(s)');
                }
            break;
            case "Days":
                if ($DateFrom){
                    $time = strtotime($DateFrom) - strtotime($DateTo); 
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time");
                    return $dtF->diff($dtT)->format('%a day(s)');
                }
            break;
            case "NoMins":
                if ($DateFrom){
                    $time = strtotime($DateFrom) - strtotime($DateTo); 
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time");
                    return $dtF->diff($dtT)->format('%a day(s), %h hour(s)');
                }
            break;
            case 'Months':
                if ($DateFrom){
                    $time = strtotime($DateFrom) - strtotime($DateTo); 
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time");
                    return $dtF->diff($dtT)->format('%m');
                }
                break;
            case 'Figures':
                if ($DateFrom){
                    $time = strtotime($DateFrom) - strtotime($DateTo); 
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time");
                    return $dtF->diff($dtT)->format('%a');
                }
                break;
        }
    }
    
    function getDatesFromRange($start, $end, $format = 'Y-m-d') {
        $array = array();
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        foreach($period as $date) { 
            $array[] = $date->format($format); 
        }

        return $array;
    }
    
    function cnv_mysql_date($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('Y/m/d H:i:s',$CnvDate);
    }
    
    function cnv_mysql_date_AMPM($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('Y/m/d H:i:s A',$CnvDate);
    }
    
    function cnv_mysql_date_only($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('Y/m/d',$CnvDate);
    }
    
    function cnv_mysql_time_only($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('H:i:s',$CnvDate);
    }
    
    function cnv_get_month_only($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('m',$CnvDate);
    }
    
    function cnv_get_date_only($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('d',$CnvDate);
    }
    
    function cnv_get_year_only($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('Y',$CnvDate);
    }
    
    function cnv_sql_date_only($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('m/d/Y',$CnvDate);
    }
    
    function cnv_sql_date_time_ampm($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('m/d/Y h:i:s A',$CnvDate);
    }
    
    function cnv_sql_date_dash($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('m-d-Y',$CnvDate);
    }
    
    function cnv_date_display($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('F d, Y',$CnvDate);
    }
    
    function cnv_short_month_date_display($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('M. d, Y',$CnvDate);
    }
    
    function cnv_short_month_date_AMPM_display($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('M. d, Y H:i:s',$CnvDate);
    }
    
    function cnv_long_month_date_AMPM_display($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('F d, Y H:i:s',$CnvDate);
    }
    
    function cnv_month_num($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('m',$CnvDate);
    }
    
    function cnv_month_year($Date = NULL){
        $CnvDate  = strtotime($Date);
        return date('m-Y',$CnvDate);
    }
    
    function cnv_month($monthNum = NULL){
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        return $monthName;
    }
    
    function isValidYear($year) {
         // Convert to timestamp
         $start_year         =   strtotime(date('Y') - 100); //100 Years back
         $end_year           =   strtotime(date('Y')); // Current Year
         $received_year      =   strtotime($year);

        // Check that user date is between start & end
        return (($received_year >= $start_year) && ($received_year <= $end_year));
    }
    
    function civil_status_functions($value){
        switch($value){
            case 1:
                return 'Married';
                break;
            case 2:
                return 'Widowed';
                break;
            case 3:
                return 'Separated';
                break;
            case 4:
                return 'Divorced';
                break;
            case 5:
                return 'Single';
                break;
        }
    }
    
    /*Employee*/
    function employee_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = NULL){
        
        switch($action){
                
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                      
                    case "All":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_employees` WHERE ". implode(' AND ', $parameters) ." ORDER BY FirstName ASC";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $Name  = $row -> FirstName." ".$row -> LastName;    
                            $data[] = array(
                                'ID'                =>  $row -> ID,
                                'EmpID'             =>  $row -> EmpID,
                                'StationID'         =>  $row -> StationID,
                                'Designation'       =>  $row -> Designation,
                                'EmpLvl'            =>  $row -> EmpLvl,
                                'EmpType'           =>  $row -> EmpType,
                                'EmpName'           =>  $Name,
                                'FirstName'         =>  $row -> FirstName,
                                'MiddleName'        =>  $row -> MiddleName,
                                'LastName'          =>  $row -> LastName,
                                'ExtName'           =>  $row -> ExtName,
                                'DateofBirth'       =>  $row -> DateofBirth,
                                'Gender'            =>  $row -> Gender,
                                'MaritalStatus'     =>  $row -> MaritalStatus,
                                'BloodGroup'        =>  $row -> BloodGroup,
                                'ContactNum1'       =>  $row -> ContactNum1,
                                'ContactNum2'       =>  $row -> ContactNum2,
                                'EmailAdd'          =>  $row -> EmailAdd,
                                'EmpAddress'        =>  $row -> EmpAddress,
                                'ZipCode'           =>  $row -> ZipCode,
                                'EmgcContPer'       =>  $row -> EmgcContPer,
                                'PhoneNum'          =>  $row -> PhoneNum,
                                'EmgcContPerAddr'   =>  $row -> EmgcContPerAddr,
                                'Relationship'      =>  $row -> Relationship,
                                'ImgPath'           =>  $row -> ImgPath,
                                'JoiningDate'       =>  $row -> JoiningDate,
                                'SSID'              =>  $row -> SSID,
                                'TINNumber'         =>  $row -> TINNumber,
                                'PHNo'              =>  $row -> PHNo,
                                'HDMFNO'            =>  $row -> HDMFNO,
                                'EmpStatus'         =>  $row -> EmpStatus,
                                'EmpStatusRemarks'  =>  $row -> EmpStatusRemarks,
                                'SysAccntStat'      =>  $row -> SysAccntStat,
                                'IBMSUID'           =>  $row -> IBMSUID,
                                'ImdtSup'           =>  $row -> ImdtSup,
                                'Status'            =>  $row -> Status,
                                'CreationDate'      =>  $row -> CreationDate,
                                'CreatedBy'         =>  $row -> CreatedBy,
                                'LastEditDate'      =>  $row -> LastEditDate,
                                'LastEditBy'        =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                      
                    break;
                 
                    case "CSF":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_employees` WHERE Department IN (1,6) AND EmpStatus = 1 AND ". implode(' AND ', $parameters) ." ORDER BY FirstName ASC";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $Name  = $row -> FirstName." ".$row -> LastName;    
                            $data[] = array(
                                'ID'                =>  $row -> ID,
                                'EmpID'             =>  $row -> EmpID,
                                'StationID'         =>  $row -> StationID,
                                'Designation'       =>  $row -> Designation,
                                'EmpLvl'            =>  $row -> EmpLvl,
                                'EmpType'           =>  $row -> EmpType,
                                'EmpName'           =>  $Name,
                                'FirstName'         =>  $row -> FirstName,
                                'MiddleName'        =>  $row -> MiddleName,
                                'LastName'          =>  $row -> LastName,
                                'ExtName'           =>  $row -> ExtName,
                                'DateofBirth'       =>  $row -> DateofBirth,
                                'Gender'            =>  $row -> Gender,
                                'MaritalStatus'     =>  $row -> MaritalStatus,
                                'BloodGroup'        =>  $row -> BloodGroup,
                                'ContactNum1'       =>  $row -> ContactNum1,
                                'ContactNum2'       =>  $row -> ContactNum2,
                                'EmailAdd'          =>  $row -> EmailAdd,
                                'EmpAddress'        =>  $row -> EmpAddress,
                                'ZipCode'           =>  $row -> ZipCode,
                                'EmgcContPer'       =>  $row -> EmgcContPer,
                                'PhoneNum'          =>  $row -> PhoneNum,
                                'EmgcContPerAddr'   =>  $row -> EmgcContPerAddr,
                                'Relationship'      =>  $row -> Relationship,
                                'ImgPath'           =>  $row -> ImgPath,
                                'JoiningDate'       =>  $row -> JoiningDate,
                                'SSID'              =>  $row -> SSID,
                                'TINNumber'         =>  $row -> TINNumber,
                                'PHNo'              =>  $row -> PHNo,
                                'HDMFNO'            =>  $row -> HDMFNO,
                                'EmpStatus'         =>  $row -> EmpStatus,
                                'EmpStatusRemarks'  =>  $row -> EmpStatusRemarks,
                                'SysAccntStat'      =>  $row -> SysAccntStat,
                                'IBMSUID'           =>  $row -> IBMSUID,
                                'ImdtSup'           =>  $row -> ImdtSup,
                                'Status'            =>  $row -> Status,
                                'CreationDate'      =>  $row -> CreationDate,
                                'CreatedBy'         =>  $row -> CreatedBy,
                                'LastEditDate'      =>  $row -> LastEditDate,
                                'LastEditBy'        =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                      
                    break;
                        
                    case "ShortName":
                        $stmt = $this->_db->query("SELECT `FirstName`, `MiddleName`,`LastName`,`ExtName` FROM `nsqcs_employees` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> FirstName.' '.$row -> LastName;
                        }
                    break;
                        
                    case "Designation":
                        
                        $qry = "SELECT * FROM `nsqcs_employees` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Designation;
                        }
                        
                        break;
                }
                
                break;
                
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_employees', $fields)) {
                            throw new Exception('There was a problem creating a new Designation information.');
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_employees` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End Employee*/
    
    /*Company Functions*/
    function company_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = array(),$field1 = NULL,$field2 = NULL){
        switch($action){
            
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                        
                    case "Company":
                        
                        try {
                            $data = array();
                            $qry = "SELECT * FROM `ra_testing_companies` WHERE ". implode(' AND ', $parameters) ." ORDER BY `CompanyName` ASC";
                            $stmt = $this->_db->query($qry)->results();
                            foreach($stmt as $row){
                                $data[] = array(
                                    'ID'            =>  $row -> ID,
                                    'CompanyName'   =>  $row -> CompanyName,
                                    'NameOfOwner'   =>  $row -> NameOfOwner,
                                    'Address'       =>  $row -> Address,
                                    'ContactNumber' =>  $row -> ContactNumber,
                                    'EMail'         =>  $row -> EMail
                                );
                            }
                            return $data;
                            
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;
                
                    case "CompanyName":
                        $stmt = $this->_db->query("SELECT `CompanyName` FROM `ra_testing_companies` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> CompanyName;
                        }
                        break;
                }

            break;

        }
    }
    /*End Company Functions*/
     
    /*Location Functions*/
    function location_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = array(),$field1 = NULL,$field2 = NULL){
        switch($action){
            
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                        
                    case "Regions":
                        
                        try {
                            $data = array();
                            $qry = "SELECT * FROM `loc_regions` WHERE ". implode(' AND ', $parameters) ." ORDER BY `ID` ASC";
                            $stmt = $this->_db->query($qry)->results();
                            foreach($stmt as $row){
                                $data[] = array(
                                    'ID'            =>  $row -> ID,
                                    'Code'          =>  $row -> Code,
                                    'Name'          =>  $row -> Name,
                                    'Region_ID'     =>  $row -> Region_ID,
                                    'Status'        =>  $row -> Status
                                );
                            }
                            return $data;
                            
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;
                        
                    case "Province":
                        
                        try {
                        
                            $data = array();
                        
                            $qry = "SELECT * FROM `loc_provinces` WHERE ". implode(' AND ', $parameters) ." ORDER BY `province_id` ASC";
                            $stmt = $this->_db->query($qry)->results();
                            foreach($stmt as $row){
                                $data[] = array(
                                    'ID '           =>  $row -> ID,
                                    'Code'          =>  $row -> Code,
                                    'Name'          =>  $row -> Name,
                                    'Region_ID'     =>  $row -> Region_ID,
                                    'Province_ID'   =>  $row -> Province_ID,
                                    'Status'        =>  $row -> Status
                                );
                            }
                            return $data;
                            
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;
                        
                    case "CityList":
                        
                        try {
                        
                            $data = array();
                        
                            $qry = "SELECT * FROM `loc_cities` WHERE ". implode(' AND ', $parameters) ." ORDER BY `city_id` ASC";
                            $stmt = $this->_db->query($qry)->results();
                            foreach($stmt as $row){
                                $data[] = array(
                                    'ID'            =>  $row -> ID,
                                    'Code'          =>  $row -> Code,
                                    'Name'          =>  $row -> Name,
                                    'Region_ID'     =>  $row -> Region_ID,
                                    'Province_ID'   =>  $row -> Province_ID,
                                    'City_ID'       =>  $row -> City_ID,
                                    'Status'        =>  $row -> Status
                                );
                            }
                            return $data;
                            
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;
                        
                    case "BarangayList":
                        
                        try {
                        
                            $data = array();
                        
                            $qry = "SELECT * FROM `loc_barangay` WHERE ". implode(' AND ', $parameters) ." ORDER BY `city_id` ASC";
                            $stmt = $this->_db->query($qry)->results();
                            foreach($stmt as $row){
                                $data[] = array(
                                    'ID'            =>  $row -> ID,
                                    'Code'          =>  $row -> Code,
                                    'Name'          =>  $row -> Name,
                                    'Region_ID'     =>  $row -> Region_ID,
                                    'Province_ID'   =>  $row -> Province_ID,
                                    'City_ID'       =>  $row -> City_ID,
                                    'Status'        =>  $row -> Status
                                );
                            }
                            return $data;
                            
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;                    
                        
                    case "RegionName":
                        $stmt = $this->_db->query("SELECT `name` FROM `loc_regions` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> name;
                        }
                        break;
                        
                    case "ProvinceName":
                        $stmt = $this->_db->query("SELECT `name` FROM `loc_provinces` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> name;
                        }
                        break;
                        
                    case "CityName":
                        $stmt = $this->_db->query("SELECT `name` FROM `loc_cities` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> name;
                        }
                        break;
                        
                    case "BarangayName":
                        $stmt = $this->_db->query("SELECT `name` FROM `loc_barangay` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> name;
                        }
                        break;
                }

            break;

        }
    }
    /*End Location Functions*/
    
    /*Offices/Branch Functions*/
    function offices_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = NULL){
        
        switch($action){
                
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                      
                    case "All":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_offices_list` WHERE ". implode(' AND ', $parameters) ." ORDER BY `DataArrange` ASC";

                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'RegSrcID'      =>  $row -> RegSrcID,
                                'LabNum'        =>  $row -> LabNum,
                                'OfficeCode'    =>  $row -> OfficeCode,
                                'OfficeName'    =>  $row -> OfficeName,
                                'TempChief'     =>  $row -> TempChief,
                                'Office_Type'   =>  $row -> Office_Type,
                                'HeadSrcID'     =>  $row -> HeadSrcID,
                                'Address'       =>  $row -> Address,
                                'ContactNum1'   =>  $row -> ContactNum1,
                                'ContactNum2'   =>  $row -> ContactNum2,
                                'EMail'         =>  $row -> EMail,
                                'DataArrange'   =>  $row -> DataArrange,
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
                        
                    case "Name":
                        
                        $qry = "SELECT * FROM `nsqcs_offices_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> LabNum;
                        }
                        
                        break;
                        
                    case "OfficeName":
                        
                        $qry = "SELECT * FROM `nsqcs_offices_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> OfficeName;
                        }
                        
                        break;
                        
                    case "Office_Type":
                        
                        $qry = "SELECT * FROM `nsqcs_offices_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Office_Type;
                        }
                        
                        break;
                        
                    case "Office_Head":
                        
                        $qry = "SELECT * FROM `nsqcs_offices_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> TempChief;
                        }
                        
                        break;
                        
                    case "OfficeCode":
                        $qry = "SELECT * FROM `nsqcs_offices_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
//                        print_r($qry);
                        foreach($stmt as $row){
                            return $row -> OfficeCode;
                        }
                        break;
                        
                    case "GenerateCode":
                        $qry = "SELECT COUNT(`ID`) as MaxID FROM `data_sample` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
//                        print_r($qry);
                        foreach($stmt as $row){
                            return $row -> GenerateCode;
                        }
                        break;
                }
                
                break;
                
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_offices_list', $fields)) {
                            throw new Exception('There was a problem creating a new Regional Office information.');
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_offices_list` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End Offices/Branch Functions*/
    
    /*Designation*/
    function designation_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = NULL){
        
        switch($action){
                
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                      
                    case "All":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_designation_list` WHERE ". implode(' AND ', $parameters) ."";

                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'Name'          =>  $row -> Name,
                                'Salary'        =>  $row -> Salary,
                                'Status'        =>  $row -> Status,
                                'CreationDate'  =>  $row -> CreationDate,
                                'CreatedBy'     =>  $row -> CreatedBy,
                                'LastEditDate'  =>  $row -> LastEditDate,
                                'LastEditBy'    =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                      
                        break;
                        
                    case "Name":
                        
                        $qry = "SELECT * FROM `nsqcs_designation_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Name;
                        }
                        
                        break;
                    
                    case "Salary":
                        
                        $qry = "SELECT * FROM `nsqcs_designation_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Salary;
                        }
                        
                        break;
                }
                
                break;
                
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_designation_list', $fields)) {
                            throw new Exception('There was a problem creating a new Designation information.');
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_designation_list` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End Designation*/

    /*NSQCS Crops - March 02, 2021 - Jeru*/
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
                            $stmt = $this->_db->query("SELECT Count(`ID`) AS `rowCount` FROM `nsqcs_crops` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
                            return ($stmt > 0 ? true : false);
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        
                        break;
                        
                    case 'NumofDays';
                        
                        try {
                            $stmt = $this->_db->query("SELECT `RAEstNumDays` AS `rowCount` FROM `nsqcs_crops` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
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
                        $qry = "SELECT * FROM `nsqcs_crops` WHERE ". implode(' AND ', $parameters) ." ORDER BY `ID` ASC";
                        
                        $data = array();
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'Crop'          =>  $row -> Crop,
                                'RAEstNumDays'  =>  $row -> RAEstNumDays,
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
                        
                    case "Crop":
                        $stmt = $this->_db->query("SELECT `Crop` FROM `nsqcs_crops` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> Crop;
                        }
                        break;
                }
            break;
                
            case 'Insert':

                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_crops', $fields)) {
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_crops` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                    break;
                }
                
            break;
        }
    }
    /*End NSQCS Crops*/
    
    /*NSIC Variety*/
    function variety_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = array(),$field1 = NULL,$field2 = NULL){
        switch($action){
            case 'Check':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                    case 'VarCheck':
                        try {
                            $qry = "SELECT Count(`ID`) AS `rowCount` FROM `nsic_variety`";
                            $stmt = $this->_db->query($qry)->first()->rowCount;
                            return ($stmt > 0 ? true : false);
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        break;
                        
                    case 'HasRecord':
                        
                        try {
                            $stmt = $this->_db->query("SELECT Count(`ID`) AS `rowCount` FROM `nsic_variety` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
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
                
                switch($qrytype){
                        
                    case 'All':
                        try {
                            $data = array();
                            $qry = "SELECT * FROM `nsic_variety`";
                            $stmt = $this->_db->query($qry)->results();
                            foreach($stmt as $row){
                                $data[] = array(
                                    'ID'        =>  $row -> ID,
                                    'Code'      =>  $row -> Code,
                                    'Name'      =>  $row -> Name,
                                    'OthName'   =>  $row -> OthName,
                                    'VarType'   =>  $row -> VarType,
                                    'Year'      =>  $row -> Year,
                                    'EcoSystem' =>  $row -> EcoSystem,
                                    'Breeder'   =>  $row -> Breeder,
                                    'CropType'  =>  $row -> CropType
                                );
                            }
                            return $data;
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }

                        break;
                    
                    case 'VarID':
                        $qry = "SELECT * FROM `nsic_variety` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> ID;
                        }
                        
                        break;
                        
                    case 'Name':
                        $qry = "SELECT * FROM `nsic_variety` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Name;
                        }
                        
                        break;
                        
                    case 'Code':
                        $qry = "SELECT * FROM `nsic_variety` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Code;
                        }
                        
                        break;
                }
                
            break;
            
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsic_variety', $fields)) {
                            throw new Exception('There was a problem creating a new variety information.');
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
                        $stmt = $this->_db->query("UPDATE `nsic_variety` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End NSIC Variety*/
    
    /*Temp For RCEF*/
    function temp_variety_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = array(),$field1 = NULL,$field2 = NULL){
        switch($action){
            case 'Check':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                    case 'VarCheck':
                        try {
                            $qry = "SELECT Count(`ID`) AS `rowCount` FROM `nsic_variety_rcef`";
                            $stmt = $this->_db->query($qry)->first()->rowCount;
                            return ($stmt > 0 ? true : false);
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        break;
                        
                    case 'HasRecord':
                        
                        try {
                            $stmt = $this->_db->query("SELECT Count(`ID`) AS `rowCount` FROM `nsic_variety_rcef` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
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
                
                switch($qrytype){
                        
                    case 'All':
                        try {
                            $data = array();
                            $qry = "SELECT * FROM `nsic_variety_rcef`";
                            $stmt = $this->_db->query($qry)->results();
                            foreach($stmt as $row){
                                $data[] = array(
                                    'ID'    =>  $row -> ID,
                                    'Code'  =>  $row -> Code,
                                    'Name'  =>  $row -> Name,
                                );
                            }
                            return $data;
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }

                        break;
                    
                    case 'VarID':
                        $qry = "SELECT * FROM `nsic_variety_rcef` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> ID;
                        }
                        
                        break;
                        
                    case 'Name':
                        $qry = "SELECT * FROM `nsic_variety_rcef` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Name;
                        }
                        
                        break;
                        
                    case 'Code':
                        $qry = "SELECT * FROM `nsic_variety_rcef` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Code;
                        }
                        
                        break;
                }
                
            break;
            
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsic_variety_rcef', $fields)) {
                            throw new Exception('There was a problem creating a new variety information.');
                        }
                        break;
                }
                
                break;
                
        }
    }
    /*Temp For RCEF*/
    
    /*Temp for RA Varieties - 03022021 - Jeru*/
    
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
                            $stmt = $this->_db->query("SELECT Count(`ID`) AS `rowCount` FROM `ra_varieties` WHERE ". implode(' AND ', $parameters) ."")->first()->rowCount;
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
                        $qry = "SELECT * FROM `ra_varieties` WHERE ". implode(' AND ', $parameters) ." ORDER BY `ID` ASC";
                        
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
                        $stmt = $this->_db->query("SELECT `Variety` FROM `ra_varieties` WHERE ". implode(' AND ', $parameters) ."")->results();
                        foreach($stmt as $row){
                            return $row -> Variety;
                        }
                        break;
                }
            break;
                
            case 'Insert':

                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('ra_varieties', $fields)) {
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
                        $stmt = $this->_db->query("UPDATE `ra_varieties` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                    break;
                }
                
            break;
        }
    }
    /*End Varieties Functions*/
    
    /*End Temp for RA Varieties - 03022021 - Jeru*/
    
    /*Seed Class*/
    function seedclass_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = NULL){
        
        switch($action){
                
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                      
                    case "All":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_seed_class_list` WHERE ". implode(' AND ', $parameters) ."";

                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'SeedClass'     =>  $row -> SeedClass,
                                'TransRegion'   =>  $row -> TransRegion,
                                'TransOffice'   =>  $row -> TransOffice,
                                'Status'        =>  $row -> Status,
                                'CreationDate'  =>  $row -> CreationDate,
                                'CreatedBy'     =>  $row -> CreatedBy,
                                'LastEditDate'  =>  $row -> LastEditDate,
                                'LastEditBy'    =>  $row -> LastEditBy
                            );
                        }
                        return $data;
                      
                        break;
                        
                    case "Name":
                        
                        $qry = "SELECT * FROM `nsqcs_seed_class_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> SeedClass;
                        }
                        
                        break;
                        
                    case "GetID":
                        $qry = "SELECT * FROM `nsqcs_seed_class_list` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> ID;
                        }
                        break;
                }
                
                break;
                
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_seed_class_list', $fields)) {
                            throw new Exception('There was a problem creating a new Seed Class information.');
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_seed_class_list` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End Seed Class*/
    
    /*Seed Type*/
    function seedtype_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = NULL){
        
        switch($action){
                
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                      
                    case "All":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_seed_type` WHERE ". implode(' AND ', $parameters) ."";

                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'Seed'          =>  $row -> Seed,
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
                        
                    case "Name":
                        
                        $qry = "SELECT * FROM `nsqcs_seed_type` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Seed;
                        }
                        
                        break;
                        
                    case "GetID":
                        $qry = "SELECT * FROM `nsqcs_seed_type` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> ID;
                        }
                        break;
                }
                
                break;
                
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_seed_type', $fields)) {
                            throw new Exception('There was a problem creating a new Seed Type information.');
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_seed_type` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End Seed Type*/
    
    /*Irrigation*/
    function irrigation_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = NULL){
        
        switch($action){
                
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                      
                    case "List":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_irrigation` WHERE ". implode(' AND ', $parameters) ."";

                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'                =>  $row -> ID,
                                'IrrigationType'    =>  $row -> IrrigationType,
                                'Status'            =>  $row -> Status
                            );
                        }
                        return $data;
                      
                        break;
                        
                    case "Name":
                        
                        $qry = "SELECT * FROM `nsqcs_seed_type` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> IrrigationType;
                        }
                        
                        break;
                }
                
                break;
                
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_irrigation', $fields)) {
                            throw new Exception('There was a problem creating a new Irrigation information.');
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_irrigation` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End Irrigation*/
    
    /*Facilities and Equipment*/
    function facility_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = NULL){
        
        switch($action){
                
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                      
                    case "List":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_facilities` WHERE ". implode(' AND ', $parameters) ."";

                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'                =>  $row -> ID,
                                'FacilityName'    =>  $row -> FacilityName,
                                'Status'            =>  $row -> Status
                            );
                        }
                        return $data;
                      
                        break;
                        
                    case "Name":
                        
                        $qry = "SELECT * FROM `nsqcs_facilities` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> FacilityName;
                        }
                        
                        break;
                }
                
                break;
                
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_facilities', $fields)) {
                            throw new Exception('There was a problem creating a new Facility information.');
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_facilities` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End Facilities and Equipment*/
    
    /*Holidays*/
    function holiday_functions($action = NULL,$qrytype = NULL,$fields = array(),$params = NULL){
        
        switch($action){
                
            case 'GetDetails':
                
                if($params != NULL){
                    $parameters = array();
                    foreach($params as $param=>$data) {
                        $parameters[] = '' . $param . ' = \'' . $data . '\'';
                    }
                }
                
                switch($qrytype){
                      
                    case "List":
                      
                        $data = array();
                        $qry = "SELECT * FROM `nsqcs_holidays` WHERE ". implode(' AND ', $parameters) ."";

                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'Description'   =>  $row -> Description,
                                'HolidDate'     =>  $row -> HolidDate,
                                'HoliDay'       =>  $row -> HoliDay
                            );
                        }
                        return $data;
                      
                        break;
                        
                    case "Get_Holidays":
                        
                        $qry = "SELECT * FROM `nsqcs_holidays` WHERE `VoidStatus` = 0 AND ". implode(' AND ', $parameters) ." ORDER BY `nsqcs_holidays`.`HolidDate` ASC";
                        
                        $data = array();
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            $data[] = array(
                                'ID'            =>  $row -> ID,
                                'Description'   =>  $row -> Description,
                                'HoliDate'      =>  $row -> HoliDate,
                                'HoliDay'       =>  $row -> HoliDay
                            );
                        }
                        return $data;
                        break;
                        
                    case "Description":
                        
                        $qry = "SELECT * FROM `nsqcs_holidays` WHERE ". implode(' AND ', $parameters) ."";
                        $stmt = $this->_db->query($qry)->results();
                        foreach($stmt as $row){
                            return $row -> Description;
                        }
                        
                        break;
                }
                
                break;
                
            case 'Insert':
                
                switch($qrytype){
                    case 'Data':
                        if(!$this->_db->insert('nsqcs_holidays', $fields)) {
                            throw new Exception('There was a problem creating a new Holiday information.');
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
                        $stmt = $this->_db->query("UPDATE `nsqcs_holidays` SET ".implode(', ', $update)." WHERE ".implode('AND', $parameters)."");
                        break;
                }
                
                break;
                
        }
    }
    /*End Holidays*/
}