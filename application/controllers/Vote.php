<?php
/**
 * Created by PhpStorm.
 * User: prudent
 * Date: 24-Apr-18
 * Time: 8:51 AM
 */


class Vote extends CI_Controller{



    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url','form'));
        $this->load->library(array('session','form_validation'));
        $this->load->database();

    }


    public function index(){

        $data['success']="";
        $data['title'] = "Start Votes";

        if(isset($_SESSION['userLogginID'])){
            require_once('action/fetch_user.php');
        }


        //get all the contest out
        //$this->db->where("");
        $this->db->order_by('contest_close_date');
        $data['getVote'] = $this->db->get('contests')->result_array();

        $this->load->view('template/header',$data);
        $this->load->view('votes',$data);
    }

    public function info($id){

        $data['success']="";
        $data['title'] = "Start Votes";

        if(isset($_SESSION['userLogginID'])){
            require_once('action/fetch_user.php');
        }

        $this->db->where("contest_id='$id'");
        $countID = $this->db->count_all_results('contests');
        if($countID >=1){

            $this->db->where("contest_id='$id'");
            $getcontestInfo = $this->db->get('contests')->result();

            foreach($getcontestInfo as $data['contestInfo'])

            $this->load->view('template/header',$data);
            $this->load->view('vote_information',$data);

        }

        else{


        }

    }

    public function start($id){

        $data['success']="";
        $data['title'] = "Start Votes";
        //unset($_SESSION['realSession']);
        //die($_SESSION['voteNo'].'');

        if(!isset($this->session->userLogginID)){

            $data['title']='Login';
            $data['success']="<div class='alert alert-danger text-white no-border-radius'><a class='close' data-dismiss='alert'>x</a> Please login</div>";
            /*$this->load->view('template/header',$data);
            $this->load->view('login?redirect=vote/start/'.$id, $data);
            $this->load->view('template/footer',$data);*/

            redirect(base_url('login?redirect=vote/start/'.$id));
        }
        elseif(isset($_SESSION['userLogginID'])) {
            require_once('action/fetch_user.php');

            $this->db->where("contest_id='$id'");
            $countID = $this->db->count_all_results('contests');
            if ($countID >= 1) {

                if(!isset($_SESSION['realSession'])){

                    $this->session->voteNo = '';

                }
                else{

                    $this->session->voteNo = $_SESSION['realSession'];
                }


                $this->db->where("contest_id='$id'");
                $getcontestInfo = $this->db->get('contests')->result();

                foreach ($getcontestInfo as $data['contestInfo']) ;

                //get the photo entry
                $this->db->where("entry_id='$id' AND status='0'");
                $this->db->order_by('id','RANDOM');
                $this->db->limit(4);
                $data['getPhotoVote'] = $this->db->get('entries_submited')->result_array();



                $this->load->view('template/header', $data);
                $this->load->view('vote_start', $data);

            } else {


            }
        }


    }


    public function submit($id){

        if($_SERVER['REQUEST_METHOD'] =='POST')
        {

           if(isset($_SESSION['userLogginID'])) {
               require_once('action/fetch_user.php');

               $submitPhoto = $this->input->post('photos[]');
               $countSubmitPhoto = count($submitPhoto);

               for ($i = 0; $i < $countSubmitPhoto; $i++) {


                   $vote_photo = $submitPhoto[$i].'<br>';

                   //echo $vote_photo;
                  //die($submitPhoto[$i].'<br>');
                   //die($vote_photo.'<br>');

                  $insertVote = array(

                       'picture_id' => $submitPhoto[$i],
                       'voter_name' => $data['username'],
                       'vote'=> 1,
                       'entry_id'=>$id,
                       'status'=>0,
                       'date'=> date('Y-m-d H:i:s'),

                  );

                   $this->db->insert("votex", $insertVote);
               }

               //count the number of submitted entries for the contest
               $this->db->where("entry_id='$id'");
               $countEntries = $this->db->count_all_results('entries_submited');

               $pageNo = ceil($countEntries/4);
               //die($pageNo);
               $setNo = '1';
               //unset($_SESSION['voteReturn']);

               if(isset($_SESSION['voteNo'])){

                   $_SESSION['realSession'] = $_SESSION['voteNo'] + $setNo;

                   $realSession = $_SESSION['realSession'].'';

                  //die($realSession.'');
               }
               else{

                   die("session not set");
               }

               if($realSession > $pageNo)
               {

                   unset($_SESSION['realSession']);
                   unset($_SESSION['voteNo']);
                   redirect(base_url('vote/end_voting/'.$id));

               }else{

                   redirect(base_url('vote/start/'.$id));

               }
           }
            else{
                //login page

                $data['title']='Login';
                $data['success']="<div class='alert alert-danger text-white no-border-radius'><a class='close' data-dismiss='alert'>x</a> Please login</div>";
                $this->load->view('template/header',$data);
                $this->load->view('login?redirect=vote/start/',$data);
                $this->load->view('template/footer',$data);
            }
        }

       else{

           echo "not submitted";
       }
    }



    public function end_voting($id){

        $data['title'] ="Voting Ends";
        $data['success']="";

        if(isset($_SESSION['userLogginID'])){

            require_once('action/fetch_user.php');

        }

        $this->db->where("contest_id='$id'");
        $countID = $this->db->count_all_results('contests');
        if($countID >=1){

            $this->db->where("contest_id='$id'");
            $getcontestInfo = $this->db->get('contests')->result();

            foreach($getcontestInfo as $data['contestInfo']);

            unset($_SESSION['realSession']);
            unset($_SESSION['voteNo']);

            $this->load->view('template/header', $data);
            $this->load->view('voting_end', $data);

        }

        else{


        }











    }
}