<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fees extends CI_Controller
{



    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }



    public function fees_type()
    {
        //echo "hello";


        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
        $data['content'] = $this->load->view("admin/fees", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    public function add_fees_type()
    {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fees_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "fees";
            $data['title'] = "fees";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/fees", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $data = array(
                "FEES_NAME" => $this->input->post("fees_name"),
                "FEES_CODE" => $this->input->post("fees_code"),
                "FEES_DESCRIPTION" => $this->input->post("fees_des")

            );
            if ($this->common_model->save_data("FEES_TYPE", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/fees/fees_type", "refresh");
        }
    }

    public function edit_fees_type()
    {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fees_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {


            $edit_id = $this->uri->segment('5');

            $data = array();

            $data['active'] = "groups";
            $data['edit'] = $edit_id;
            $data['title'] = "groups";

            $this->load->helper("form");



            $data['allPdt'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
            $data['content'] = $this->load->view("admin/fees", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {





            $data = array(

                "FEES_NAME" => $this->input->post("fees_name"),
                "FEES_CODE" => $this->input->post("fees_code"),
                "FEES_DESCRIPTION" => $this->input->post("fees_des")

            );
            $edit_id = $this->uri->segment('5');





            if ($this->common_model->edit("FEES_TYPE", $data, $edit_id)) {



                $sdata['msg'] = "Edit Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Edit !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/fees/fees_type", "refresh");
        }
    }

    public function delete_fees_type()
    {
        $delete_id = $this->uri->segment('5');


        if ($this->common_model->delete("FEES_TYPE", $delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/fees/fees_type", "refresh");
    }



    public function add_fees()
    {
        // echo "hello";


        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
        $data['allPdt4'] = $this->student_fees_model->view_fees_amount("FEES_AMOUNT", "", "ID", "DESC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");


        $data['content'] = $this->load->view("admin/add_fees", $data, TRUE);
        $this->load->view("admin/master", $data);
    }


    public function show_students()
    {
        // echo "hello";

        $array = array();
        $array['CLASS'] = $this->input->post("class");
        $array['SECTION'] = $this->input->post("section");

        /*print_r($array);
        exit();
*/


        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
        $data['allPdt4'] = $this->student_fees_model->search_student("STUDENTS", $array, "ID", "DESC");

        $data['content'] = $this->load->view("admin/add_fees", $data, TRUE);
        $this->load->view("admin/master", $data);
    }





    public function add_fees_amount()
    {
        $succ = 0;
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fees_name2", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");
            $data['allPdt'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
            $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
            $data['content'] = $this->load->view("admin/add_fees", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $STUDENT_CLASS = $this->input->post("class");
            $STUDENT_SECTION = $this->input->post("section");
            $FEES_TYPE = $this->input->post("fees_name2");
            $MONTH = $this->input->post("month");
            $YEAR = $this->input->post("year");
            $TOTAL_FEES = $this->input->post("fees_amount");

            $y = date("Y");
            if ($YEAR == $y) {

                if (is_numeric($TOTAL_FEES) == 1) {
                    $array = array("CLASS" => $STUDENT_CLASS, "SECTION" => $STUDENT_SECTION, "FEES_TYPE" => $FEES_TYPE, "MONTH" => $MONTH, "YEAR" => $YEAR);

                    if (!$this->student_fees_model->check_data_in_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC")) {
                        $array2 = array("CLASS_ID" => $STUDENT_CLASS, "SECTION_ID" => $STUDENT_SECTION, "STATUS" => 1);

                        $all_students = $this->student_model->get_student_by_class_section("STUDENTS", $array2, "ID", "DESC", 2);







                        /*print_r($all_students->ADMISSION_NO);
            exit();*/
                        if (is_array($all_students)) {
                            foreach ($all_students as $row) {
                                //echo $row->ADMISSION_NO;

                                $data = array(
                                    'ADMISSION_NO' => $row->ADMISSION_NO,
                                    'STUDENT_ID' => $row->ID,
                                    'F_NAME' => $row->F_NAME,
                                    'CLASS' => $row->CLASS_ID,
                                    'SECTION' => $row->SECTION_ID,
                                    "FEES_TYPE" => $this->input->post("fees_name2"),
                                    "STATUS" => "not paid",
                                    "MONTH" => $this->input->post("month"),
                                    "YEAR" => $this->input->post("year"),
                                    "TOTAL_FEES" => $TOTAL_FEES,
                                    "DUE_AMOUNT" => $TOTAL_FEES,
                                    "ADMISSION_SESSION" => $row->ADMISSION_SESSION
                                );
                                $data2 = array(
                                    "STUDENT_CLASS" => $this->input->post("class"),
                                    "STUDENT_SECTION" => $this->input->post("section"),
                                    "FEES_TYPE_ID" => $this->input->post("fees_name2"),
                                    "MONTH" => $this->input->post("month"),
                                    "YEAR" => $this->input->post("year"),
                                    "AMOUNT" => $TOTAL_FEES,
                                    "ADMISSION_SESSION" => $row->ADMISSION_SESSION

                                );


                                if ($this->common_model->save_data("ADD_FEES_AMOUNT", $data)) {
                                    $succ = 1;
                                }
                            }
                        }
                    }
                }
            }

            if ($succ == 1) {
                if ($this->common_model->save_data("FEES_AMOUNT", $data2)) {

                    $sdata['msg'] = "Save Successful";
                }
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/fees/add_fees", "refresh");
        }
    }

    public function due_fees()
    {


        $data = array();
        $array = array();
        $array['CLASS'] = $this->input->post("class");
        $array['SECTION'] = $this->input->post("section");
        $array['FEES_TYPE'] = $this->input->post("fees_type");

        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt'] = $this->student_fees_model->Get_student_fees_list_form_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
        $data['allPdt4'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        /**/
        /*print_r($data['allPdt']);
        exit();*/

        // $data['allPdt']= $this->common_model->view_data("STUDENTS", "","ID","DESC");
        $data['content'] = $this->load->view("admin/due_fees", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    public function due_fees2()
    {


        $data = array();
        $array = array();
        $array['ADMISSION_NO'] = $this->input->post("search_admission");

        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt'] = $this->student_fees_model->Get_student_fees_list_form_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
        $data['allPdt4'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
        /**/
        /*print_r($data['allPdt']);
        exit();*/

        // $data['allPdt']= $this->common_model->view_data("STUDENTS", "","ID","DESC");
        $data['content'] = $this->load->view("admin/due_fees", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function collect_fees()
    {



        $data = array();
        $array = array();
        $array['CLASS'] = $this->input->post("class");
        $array['SECTION'] = $this->input->post("section");
        $array['FEES_TYPE'] = $this->input->post("fees_type");


        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt'] = $this->student_fees_model->Get_student_fees_list_form_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC");

        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
        $data['allPdt4'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        /*print_r($data['allPdt']);
        exit();*/

        // $data['allPdt']= $this->common_model->view_data("STUDENTS", "","ID","DESC");
        $data['content'] = $this->load->view("admin/collect_fees", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function collect_fees2()
    {


        $data = array();
        $array = array();

        $array['ADMISSION_NO'] = $this->input->post("search_admission");

        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");

        $data['allPdt'] = $this->student_fees_model->Get_student_fees_list_form_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC");
        /*$paid_status= $this->student_fees_model->check_paid("COLLECT_FEES", $ADMISSION_NO,"ID","DESC");
print_r($paid_status);
exit()*/

        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
        $data['allPdt4'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
        /*print_r($data['allPdt']);
        exit();*/

        // $data['allPdt']= $this->common_model->view_data("STUDENTS", "","ID","DESC");
        $data['content'] = $this->load->view("admin/collect_fees", $data, TRUE);
        $this->load->view("admin/master", $data);
    }


    public function finaly_collect_fees2()
    {


        $dataupdate[] = array();

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("m_class", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");

            $data['content'] = $this->load->view("admin/collect_fees", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $ADMISSION_NO = $this->input->post("m_admission");
            $STUDENT_ID = $this->input->post("m_student_id");
            $FEES_TYPE = $this->input->post("m_fees_type_id");
            $MONTH = $this->input->post("m_month");
            $YEAR = $this->input->post("m_year");
            $array = array('ADMISSION_NO' => $ADMISSION_NO, 'FEES_TYPE' => $FEES_TYPE, 'MONTH' => $MONTH, 'YEAR' => $YEAR);

            $paid_status = $this->student_fees_model->check_paid2("ADD_FEES_AMOUNT", $array, "ID", "DESC");

            //print_r($paid_status);

            $PAID_AMOUNT = ($this->input->post("m_pay") + $paid_status->PAID_AMOUNT);

            $array2 = array("ADMISSION_NO" => $ADMISSION_NO, "CLASS_ID" => $paid_status->CLASS, "SECTION_ID" => $paid_status->SECTION);

            $students = $this->student_model->get_student_by_class_section("STUDENTS", $array2, "ID", "DESC", 1);



            $payment_history = array(
                'STUDENT_ID' => $STUDENT_ID,
                'ADMISSION_NO' => $ADMISSION_NO,
                'FEES_TYPE' => $FEES_TYPE,
                'MONTH' => $MONTH,
                'YEAR' => $YEAR,
                'CLASS' => $students->CLASS_ID,
                'SECTION' => $students->SECTION_ID,
                'SESSIONS' => $students->ADMISSION_SESSION,
                'PAYMENT_DATE' => $this->oracle_onlydate(),
                'PAYMENT_AMOUNT' => $this->input->post("m_pay")
            );


            if ($paid_status->STATUS == "not paid" || $paid_status->STATUS == "partially paid") {

                if ($PAID_AMOUNT < $paid_status->TOTAL_FEES) {
                    $dataupdate = array(
                        "STATUS" => "partially paid",
                        "PAID_AMOUNT" => $PAID_AMOUNT,
                        "DUE_AMOUNT" => ($this->input->post("m_fees") - $PAID_AMOUNT)
                        //"DUE_FEES"=$find_paid_status_by_sid_and_ftype->TOTAL_FEES-$find_paid_status_by_sid_and_ftype->PAID_AMOUNT;
                    );
                } else if ($PAID_AMOUNT == $paid_status->TOTAL_FEES) {
                    $dataupdate = array(
                        "STATUS" => "paid",
                        "PAID_AMOUNT" => $PAID_AMOUNT,
                        "DUE_AMOUNT" => ($this->input->post("m_fees") - $PAID_AMOUNT)
                        //"DUE_FEES"=$find_paid_status_by_sid_and_ftype->TOTAL_FEES-$find_paid_status_by_sid_and_ftype->PAID_AMOUNT;
                    );
                } else {
                    $sdata['msg'] = "Overflow Fees Amount!!";
                    $this->session->set_userdata($sdata);
                    redirect(base_url() . "admin/fees/collect_fees", "refresh");
                }

                if ($this->student_fees_model->update_status_and_paid_amount(
                    "ADD_FEES_AMOUNT",
                    $paid_status->ID,
                    $dataupdate
                )) {
                    $this->common_model->save_data(
                        "PAYMENT_HISTORY",
                        $payment_history
                    );



                    $sdata['msg'] = "Save Successful";
                } else {
                    $sdata['msg'] = "Not Successfully Data Insert !!";
                }
                $this->session->set_userdata($sdata);
                redirect(base_url() . "admin/fees/collect_fees", "refresh");
            } else if ($paid_status->STATUS == "paid") {
                $sdata['msg'] = "Allready paid Fees Amount!!";
                $this->session->set_userdata($sdata);
                redirect(base_url() . "admin/fees/collect_fees", "refresh");
            }
        }
    }

    public function delete_fees()
    {
        $succ = 0;
        $c = 0;
        $delete_id = $this->uri->segment('5');
        $fees_amount = $this->student_fees_model->getfees("FEES_AMOUNT", $delete_id, "ID", "DESC");
        $array = array("CLASS" => $fees_amount->STUDENT_CLASS, "SECTION" => $fees_amount->STUDENT_SECTION, "FEES_TYPE" => $fees_amount->FEES_TYPE_ID, "MONTH" => $fees_amount->MONTH, "YEAR" => $fees_amount->YEAR);
        if ($this->student_fees_model->check_data_in_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC")) {

            $all_students = $this->student_fees_model->get_student_from_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC");

            // start
            foreach ($all_students as $row) {


                if ($row->PAID_AMOUNT > 0) {
                    $c++;
                }
            }
            // end
            if ($c == 0) {

                foreach ($all_students as $row) {


                    if ($this->common_model->delete("ADD_FEES_AMOUNT", $row->ID)) {
                        $succ = 1;
                    }
                }
            }
        }



        if ($succ == 1) {

            if ($this->common_model->delete("FEES_AMOUNT", $delete_id)) {

                $sdata['msg'] = "Delete Successful";
            }
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/fees/add_fees", "refresh");
    }

    public function edit_fees()
    {
        @$succ;

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fees_amount", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {


            $edit_id = $this->uri->segment('5');
            //echo 
            $data = array();

            $data['active'] = "groups";
            $data['edit'] = $edit_id;

            $data['title'] = "groups";

            $this->load->helper("form");

            /*print_r($data);
                echo $edit_id;
                exit();
*/

            $data['allPdt'] = $this->student_fees_model->view_data2("FEES_AMOUNT", $edit_id, "ID", "DESC");

            //$data['allPdt']= $this->common_model->view_data("FEES_AMOUNT","","ID","DESC");
            /*print_r($data['allPdt']);
        exit();*/



            $data['content'] = $this->load->view("admin/add_fees", $data, TRUE);

            $this->load->view("admin/master", $data);
        } else {







            $data = array(

                "AMOUNT" => $this->input->post("fees_amount"),
                "MONTH" => $this->input->post("month"),
                "YEAR" => $this->input->post("year")

            );
            $edit_id = $this->uri->segment('5');

            /* print_r($data);
                echo $edit_id;
                exit();*/


            $fees_amount = $this->student_fees_model->getfees("FEES_AMOUNT", $edit_id, "ID", "DESC");


            $array = array(
                "CLASS" => $fees_amount->STUDENT_CLASS, "SECTION" => $fees_amount->STUDENT_SECTION,
                "FEES_TYPE" => $fees_amount->FEES_TYPE_ID, "MONTH" => $fees_amount->MONTH, "YEAR" => $fees_amount->YEAR
            );
            /*echo "string";
                exit();
*/
            if ($this->student_fees_model->check_data_in_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC")) {


                $all_students = $this->student_fees_model->get_student_from_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC");
                // print_r($all_students);
                // exit();


                foreach ($all_students as $row) {



                    $data2 = array(
                        'ADMISSION_NO' => $row->ADMISSION_NO,
                        'F_NAME' => $row->F_NAME,
                        'CLASS' => $row->CLASS,
                        'SECTION' => $row->SECTION,
                        "FEES_TYPE" => $this->input->post("fees_name2"),
                        // "STATUS" =>"not paid",
                        "MONTH" => $this->input->post("month"),
                        "YEAR" => $this->input->post("year"),
                        "TOTAL_FEES" => $this->input->post("fees_amount"),
                        "DUE_AMOUNT" => $this->input->post("fees_amount") - $row->PAID_AMOUNT
                    );








                    if ($this->common_model->edit("ADD_FEES_AMOUNT", $data2, $row->ID)) {
                        $succ = 1;
                    }
                }
            }



            $succ = 1;

            if ($succ == 1) {
                if ($this->common_model->edit("FEES_AMOUNT", $data, $edit_id)) {
                    $sdata['msg'] = "Edit Successful";
                }
            } else {
                $sdata['msg'] = "Not Successfully Data Edite !!";
            }
            $this->session->set_userdata($sdata);

            redirect(base_url() . "admin/fees/add_fees", "refresh");
        }
    }
    public function add_fees_specific_student()
    {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
        $data['allPdt4'] = $this->student_fees_model->view_fees_amount("FEES_AMOUNT", "", "ID", "DESC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");


        $data['content'] = $this->load->view("admin/add_fees_specific_student", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    public function add_fees_amount_specific_student()
    {
        @$data = array();
        @$sdata;


        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("fees_name2", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");
            $data['allPdt'] = $this->common_model->view_data("FEES_TYPE", "", "ID", "DESC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
            $data['allPdt3'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
            $data['content'] = $this->load->view("admin/add_fees_specific_student", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            $ADMISSION_NO = $this->input->post("admission_no");
            $INSERT_TYPE = $this->input->post("insert_type");
            $STUDENT_CLASS = $this->input->post("class");
            $STUDENT_SECTION = $this->input->post("section");
            $FEES_TYPE = $this->input->post("fees_name2");
            $MONTH = $this->input->post("month");
            $YEAR = $this->input->post("year");
            $TOTAL_FEES = $this->input->post("fees_amount");
            $DISCOUNT = $this->input->post("discount");
            $array = array("ADMISSION_NO" => $ADMISSION_NO, "CLASS" => $STUDENT_CLASS, "SECTION" => $STUDENT_SECTION, "FEES_TYPE" => $FEES_TYPE, "MONTH" => $MONTH, "YEAR" => $YEAR);



            if ($INSERT_TYPE == "add") {

                if (!$this->student_fees_model->check_data_in_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC")) {

                    $array2 = array("ADMISSION_NO" => $ADMISSION_NO, "CLASS_ID" => $STUDENT_CLASS, "SECTION_ID" => $STUDENT_SECTION, "STATUS" => 1);

                    //$array2=array("ADMISSION_NO"=>$ADMISSION_NO,"CLASS"=>$STUDENT_CLASS,"SECTION"=>$STUDENT_SECTION);
                    $students = $this->student_model->get_student_by_class_section("STUDENTS", $array2, "ID", "DESC", 1);




                    if (!$students) {
                        $sdata['msg'] = "Not Successfully Data Insert !!";
                    } else {
                        $TOTAL_FEES = $this->input->post("fees_amount");
                        $DISCOUNT = $this->input->post("discount");

                        $dis = ($DISCOUNT / 100) * $TOTAL_FEES;



                        $data = array(
                            'ADMISSION_NO' => $students->ADMISSION_NO,
                            'F_NAME' => $students->F_NAME,
                            'CLASS' => $students->CLASS_ID,
                            'SECTION' => $students->SECTION_ID,
                            "ADMISSION_SESSION" => $students->ADMISSION_SESSION,
                            "FEES_TYPE" => $this->input->post("fees_name2"),
                            "STATUS" => "not paid",
                            "MONTH" => $this->input->post("month"),
                            "YEAR" => $this->input->post("year"),
                            "TOTAL_FEES" => $this->input->post("fees_amount") - $dis,
                            "DUE_AMOUNT" => $this->input->post("fees_amount") - $dis,
                            "DISCOUNT" => $this->input->post("discount")
                        );



                        if ($this->common_model->save_data("ADD_FEES_AMOUNT", $data)) {
                            $sdata['msg'] = "Insert Data Successful";
                        }
                    }
                } else {
                    $sdata['msg'] = "All Ready Exist";
                }
            }



            if ($INSERT_TYPE == "edit") {


                $student_fees = $this->student_fees_model->check_data_in_add_fees_amount("ADD_FEES_AMOUNT", $array, "ID", "DESC");
                if ($student_fees) {
                    $array2 = array("ADMISSION_NO" => $ADMISSION_NO, "CLASS_ID" => $STUDENT_CLASS, "SECTION_ID" => $STUDENT_SECTION, "STATUS" => 1);

                    //$array2=array("ADMISSION_NO"=>$ADMISSION_NO,"CLASS"=>$STUDENT_CLASS,"SECTION"=>$STUDENT_SECTION);
                    $students = $this->student_model->get_student_by_class_section("STUDENTS", $array2, "ID", "DESC", 1);

                    if ($students) {

                        if ($student_fees->PAID_AMOUNT) {


                            $sdata['msg'] = "Edit Not Possible";
                        } else {

                            $TOTAL_FEES = $this->input->post("fees_amount");
                            $DISCOUNT = $this->input->post("discount");
                            $dis = ($DISCOUNT / 100) * $TOTAL_FEES;
                            $ADMISSION_NO = $students->ADMISSION_NO;


                            $FEES_TYPE = $this->input->post("fees_name2");
                            $MONTH = $this->input->post("month");
                            $YEAR = $this->input->post("year");


                            $data = array(

                                'F_NAME' => $students->F_NAME,
                                'CLASS' => $students->CLASS_ID,
                                'SECTION' => $students->SECTION_ID,
                                "ADMISSION_SESSION" => $students->ADMISSION_SESSION,
                                "FEES_TYPE" => $this->input->post("fees_name2"),
                                "STATUS" => "not paid",
                                "MONTH" => $this->input->post("month"),
                                "YEAR" => $this->input->post("year"),
                                "TOTAL_FEES" => $this->input->post("fees_amount") - $dis,
                                "DUE_AMOUNT" => $this->input->post("fees_amount") - $dis,
                                "DISCOUNT" => $this->input->post("discount")
                            );



                            if ($this->student_fees_model->edit_fees("ADD_FEES_AMOUNT", $data, $ADMISSION_NO, $FEES_TYPE, $MONTH, $YEAR)) {
                                $sdata['msg'] = "Edit Data Successful";
                            }
                        }
                    } else {
                        $sdata['msg'] = "Edit Data Not Successful";
                    }
                }
            }



            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/fees/add_fees_specific_student", "refresh");
        }
    }
}
