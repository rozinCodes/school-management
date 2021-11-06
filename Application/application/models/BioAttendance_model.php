<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BioAttendance_model extends CI_Model
{



    // public function getattendanceDataSqlServerToOracle()
    // {
    //     $sql = "SELECT E.nUserID, K.sEventName,E.nDateTime, R.sName, D.sName
    // FROM BioStar.dbo.TB_EVENT_LOG E,BioStar.dbo.TB_READER R,BioStar.dbo.TB_EVENT_DATA D
    // ,BioStar.dbo.TB_TA_DEVICE_EVENT_KEY K ----Need all Log disable this time
    // ---,OTHER_DATA.dbo.EMPLOYEES_ALL EM
    // WHERE E.nReaderIdn=R.nReaderIdn AND E.nEventIdn=D.nEventIdn 
    // AND E.nReaderIdn=K.nReaderIdn AND E.nTNAEvent=k.nKeyIdn --- Need all log disable this line
    // -- AND E.nUserID in('3')
    // --AND EM.EMP_CODE='18871'
    // --AND R.sName in ('101.83_Worker_T-10_IN','Tripod-4_131.206_IN','T-6_Link_136.179_IN')
    // AND D.sName like 'Verify Success%'
    // --AND BioStar.dbo.bp1_time(E.nDateTime) between '2020-01-05 00:00' AND '2020-01-07 23:59'
    // --ORDER BY PUNCH_TIME DESC;";
    //     $query = $this->db3->query($sql);
    //     $r = $query->result();
    //     return $r;
    // }

 public function TestDataView()
    {
        $sql = "SELECT * FROM [AASFF].[dbo].[tmpTRecords] ORDER BY [ID] DESC";
        $query = $this->db3->query($sql);
        $r = $query->result();
        return $r;
    }
     // for AASFF start
    public function getattendanceDataSqlServerToOracle()
    {
        $sql = "SELECT * FROM [AASFF].[dbo].[tmpTRecords] ORDER BY [ID] DESC";
        $query = $this->db3->query($sql);
        $r = $query->result();
        return $r;
    }

    public function findAdmissionNo($userId)
    {
        $sql = "SELECT STUDENTS.ADMISSION_NO FROM STUDENTS WHERE ID=$userId";
    
            $query = $this->db->query($sql);
    
            $r = $query->row();
            return $r;

    }
     // for AASFF end


    public function check_attendance($table, $where)
    {
        $this->db->select($table . '.*');
        $this->db->from($table);
        $this->db->where($where);
        // if(count($this->db->get()->result())>=2)
        if ($this->db->get()->result()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getFirstAttendance($table, $where,$sid)
    {
        $sql = "SELECT MIN(EVENT_TIME) AS INTIME
    FROM $table
    WHERE ATTENDANCE_DATE='$where' AND USER_ID=$sid";

        $query = $this->db->query($sql);

        $r = $query->row();
        return $r;
    }
   
    public function getLastAttendance($table, $where,$sid)
    {

        $sql = "SELECT MAX(EVENT_TIME) AS EXITTIME
    FROM $table
    WHERE ATTENDANCE_DATE='$where' AND USER_ID=$sid";

        $query = $this->db->query($sql);

        $r = $query->row();
        return $r;
    }
    

    // public function getFirstAndLastAttendance($table, $where)
    // {
    //     $sql = "SELECT MAX(EVENT_TIME) AS EXITTIME,MIN(EVENT_TIME) AS INTIME,USER_ID
    //     FROM $table
    //     WHERE ATTENDANCE_DATE='$where' GROUP BY USER_ID ";
    
    //         $query = $this->db->query($sql);
    
    //         $r = $query->result();
    //         return $r;
    // }
    public function getFirstAndLastAttendance($table)
    {
        $sql = "SELECT MAX(EVENT_TIME) AS EXITTIME,MIN(EVENT_TIME) AS INTIME,USER_ID,ATTENDANCE_DATE
        FROM $table GROUP BY ATTENDANCE_DATE,USER_ID ";
    
            $query = $this->db->query($sql);
    
            $r = $query->result();
            return $r;
    }

    public function totalCardExecuteToday($table)
    {
        $date=date("Y-m-d");
        $sql = "SELECT count(*) as TODAYTOTALCARDEXECUTE
    FROM $table
    WHERE ATTENDANCE_DATE='$date'";

        $query = $this->db->query($sql);

        $r = $query->row();
        return $r;

    }
    public function totalNumberofCardExecuteToday($table)
    {
        $date=date("Y-m-d");
        $sql = "SELECT count( DISTINCT USER_ID) as TODAYNUMBEROFCARDEXECUTE
    FROM $table
    WHERE ATTENDANCE_DATE='$date'" ;

        $query = $this->db->query($sql);

        $r = $query->row();
        return $r;

    }

    public function totalCardExecute($table)
    {
       
        $sql = "SELECT count(*)  as TOTALCARDEXECUTE
    FROM $table";

        $query = $this->db->query($sql);

        $r = $query->row();
        return $r;

    }
    public function totalNumberCardExecute($table)
    {
       
        $sql = "SELECT count(DISTINCT USER_ID)  as TOTALNUMBEROFCARDEXECUTE
    FROM $table";

        $query = $this->db->query($sql);

        $r = $query->row();
        return $r;

    }

    public function getStudentShift($table1,$table2,$cls,$sec,$sess)
    {
        $sql = "SELECT $table1.*,$table2.START_TIME,$table2.END_TIME, $table2.DURATION, $table2.SHIFT_NAME  FROM $table1,$table2 WHERE $table1.SHIFT_ID=$table2.ID 
        AND $table1.CLASS_ID=$cls
         AND $table1.SECTION_ID=$sec
          AND $table1.SESSION_ID=$sess ";
    
            $query = $this->db->query($sql);
    
            $r = $query->row();
            return $r;
    }

    public function getReportDayAndIdWise($table,$from_date,$to_date,$user_id)
    {
        $sql = "SELECT * FROM $table WHERE ATTENDANCE_DATE>='$from_date' AND ATTENDANCE_DATE<='$to_date' AND USER_ID=$user_id ORDER BY  ATTENDANCE_DATE ASC";
    
            $query = $this->db->query($sql);
    
            $r = $query->result();
            return $r;
    }

    public function getStudentInfo($user_id)
    {
            
                $sql = "SELECT ID FROM STUDENTS WHERE ADMISSION_NO=$user_id ";
    
                $query = $this->db->query($sql);
        
                $r = $query->row();


                if($r)
                {
                    $sql2 = "SELECT * FROM ENROLL WHERE STUDENT_ID=$r->ID AND STATUS=1 ";
            
                    $query2 = $this->db->query($sql2);
            
                    $r2 = $query2->row();
                    return $r2;
                }
                else
                {
                    return false;
                }
          
        
            
    }

    public function getStudentInfoDetails($table,$user_id)
    {
        $this->db->select('STUDENTS.*,ENROLL.*,CLASSES.CLASSES AS CLASS_NAME,SECTIONS.NAME AS SECTION_NAME,SESSIONS.SESSIONS,VERSIONS.VERSION');
        $this->db->from($table);
        $this->db->join('ENROLL', 'ENROLL.STUDENT_ID = STUDENTS.ID');
        $this->db->join('CLASSES', 'CLASSES.ID = ENROLL.CLASS_ID');
        $this->db->join('SECTIONS', 'SECTIONS.ID = ENROLL.SECTION_ID');
        $this->db->join('SESSIONS', 'SESSIONS.ID = ENROLL.SESSION_ID');
        $this->db->join('VERSIONS', 'VERSIONS.ID = STUDENTS.VERSION');
        $this->db->where("STUDENTS.ID", $user_id);
        $this->db->where("ENROLL.STATUS", 1);
        return $this->db->get()->row();

    }

    public function allActiveStudents()
    {
        $sql = "SELECT * FROM ENROLL,STUDENTS WHERE ENROLL.STUDENT_ID=STUDENTS.ID AND ENROLL.STATUS=1 ";
    
        $query = $this->db->query($sql);

        $r = $query->result();
        return $r;
    }
}
