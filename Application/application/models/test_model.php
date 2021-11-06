<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class test_model extends CI_Model {

   
   public function get()
   {
   
    
    $sql="select * from test_table";
    $query = $this->db2->query($sql);
    $r= $query->result();
     return $r;
   }
   public function get2()
   {
    $sql="SELECT E.nUserID, K.sEventName,E.nDateTime, R.sName, D.sName
    FROM BioStar.dbo.TB_EVENT_LOG E,BioStar.dbo.TB_READER R,BioStar.dbo.TB_EVENT_DATA D
    ,BioStar.dbo.TB_TA_DEVICE_EVENT_KEY K ----Need all Log disable this time
    ---,OTHER_DATA.dbo.EMPLOYEES_ALL EM
    WHERE E.nReaderIdn=R.nReaderIdn AND E.nEventIdn=D.nEventIdn 
    AND E.nReaderIdn=K.nReaderIdn AND E.nTNAEvent=k.nKeyIdn --- Need all log disable this line
    AND E.nUserID in('3')
    --AND EM.EMP_CODE='18871'
    --AND R.sName in ('101.83_Worker_T-10_IN','Tripod-4_131.206_IN','T-6_Link_136.179_IN')
    AND D.sName like 'Verify Success%'
    --AND BioStar.dbo.bp1_time(E.nDateTime) between '2020-01-05 00:00' AND '2020-01-07 23:59'
    --ORDER BY PUNCH_TIME DESC;";
    $query = $this->db3->query($sql);
    $r= $query->result();
     return $r;
   }

   public function get3()
   {
   
    
    $sql="select * from ENROLL";
    $query = $this->db->query($sql);
    $r= $query->result();
     return $r;
   }
   public function check_attendance($table,$where)
    {
        $this->db->select($table.'.*');
        $this->db->from($table);
        $this->db->where($where);
        // if(count($this->db->get()->result())>=2)
         if($this->db->get()->row())
        {
           return TRUE;
        }
        else
        {
            return FALSE;
        }

    }
   
   public function getFirstAttendance($table,$where)
   {
    $sql="SELECT MIN(EVENT_TIME) AS INTIME
    FROM $table
    WHERE ATTENDANCE_DATE='$where'";

    $query = $this->db->query($sql);

    $r= $query->row();
     return $r;
   }
   public function getLastAttendance($table,$where)
   {

    $sql="SELECT MAX(EVENT_TIME) AS EXITTIME
    FROM $table
    WHERE ATTENDANCE_DATE='$where'";

    $query = $this->db->query($sql);

    $r= $query->row();
     return $r;
    
   }
   
   
   

}
