<?php foreach($getContest as $contest)

?>

<section class="content" style="margin-top: 55px">
    
    <style type="text/css">
        .contest-bg{
            background: linear-gradient(60deg, rgba(100,0,0,0.5), rgba(0,0,70,.3)), url("<?php echo base_url('uploads/contests/'.$contest->contest_picture)?>");
            background-attachment: fixed;
            min-height: 400px;
            background-position: center;
            background-size: cover;
            padding-top: 40px;
            font-family: 'Ubuntu', sans-serif;
        }
        .contest-foot{
            background: linear-gradient(60deg, rgba(100,0,0,0.5), rgba(0,0,70,.3)), url("<?php echo base_url('uploads/contests/'.$contest->contest_picture)?>");
            min-height: 300px;
            background-position: center;
            background-size: cover;
            padding-top: 40px;
            font-family: 'Ubuntu', sans-serif;

        }
    </style>
    

    <div class="contest-bg" style="">

        <div class="container-fluid">
            <h1 class="text-center" style="color: #fff; font-family: sans-serif;font-weight: 700;"> <?php echo $contest->contest_name ?> <br> Photo Contest</h1>
            <h5 class="text-center text-white"><?php echo $contest->contest_grand_price ?> and more</h5>
        </div>

        <div class="text-center">

            <?php if(isset($_SESSION['userLogginID'])){?>

            <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-lg no-border-radius">
                Enter Now <?php if($contest->entry_price =="Free"){echo 'for '. $contest->entry_price;}else{echo 'with '. $contest->entry_price.' Unit';} ?>
            </a>
            <?php }else{?>

                <a href="<?php echo base_url('login')?>" class="btn btn-primary btn-lg no-border-radius">
                    Login to Enter this contest <?php if($contest->entry_price =="Free"){echo 'for '. $contest->entry_price;}else{echo 'with '. $contest->entry_price.' Unit';} ?>
                </a>

            <?php }?>
        </div>

    </div>

    <div class="contest-bg-social">
        <div class="container">
            <div class="col-sm-6 col-xs-5" style="margin-left: -20px">
                <ul>
                    <li style="margin-left: 0;width: 2px"><a href=""> <i class="fa fa-facebook"></i> </a> </li>
                    <li style="margin-left: 0;width: 2px"><a href=""> <i class="fa fa-twitter"></i> </a> </li>
                    <li ><a href=""> <i class="fa fa-google-plus"></i> </a> </li>
                    <li class="hidden-xs"><a href=""> <i class="fa fa-instagram"></i> </a> </li>
                    <li class="hidden-xs"><a href=""> <i class="fa fa-pinterest"></i> </a> </li>
                </ul>


            </div>

            <div class="col-sm-6 col-xs-7">
                <ul class="">
                    <li style="" class="pull-right"><a href="<?php echo base_url('contests/entries/'.$contest->contest_id)?>"> Entries </a> </li>
                    <li style="" class="pull-right active-bottom"><a href="#"> Details </a> </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="container" style="margin-bottom: 30px;margin-top: 20px; padding: 0">


        <?php

        $this->db->where("contest_id='$contest->contest_id'");
        $getContestComp = $this->db->get("contest_price_picture")->result();

        foreach($getContestComp as $contestComp)?>
            <div class="col-sm-4" style="margin: 0;">
                <div class="contest-grid-price contest-price-row bg-aqua-gradient" style="">
                    <div class="contest-pics" style="">
                        <img src="<?php echo base_url('uploads/contests/'.$contestComp->contest_1st_picture)?>" width="100%" class="img-circle">
                    </div>
                    <div class="contest-price text-center">
                        <h3 class="text-center text-white"><?php echo $contestComp->contest_1st_price ?></h3>

                        <ul>


                            <?php
                            //$firstReward = $contestComp->first_reward;
                           $expReward = explode(',', $contestComp->first_reward);

                            for($f=0; $f<count($expReward); $f++):

                            ?>
                            <li><?php echo $expReward[$f]?></li>

                            <?php endfor ?>

                        </ul>
                    </div>
                </div>
            </div>



                <div class="col-sm-4" style="margin: 0;">
                <div class="contest-grid-price contest-price-row bg-maroon-gradient">
                    <div class="contest-pics">
                        <img src="<?php echo base_url('uploads/contests/'.$contestComp->contest_2nd_picture)?>" width="100%" class="img-circle">
                    </div>

                    <div class="contest-price text-center">
                        <h3 class="text-center text-white"><?php echo $contestComp->contest_2nd_price ?> </h3>
                        <ul>
                            <?php
                            //$firstReward = $contestComp->first_reward;
                            $expSReward = explode(',', $contestComp->second_reward);

                            for($s=0; $s<count($expSReward); $s++):

                                ?>
                                <li><?php echo $expSReward[$s]?></li>

                            <?php endfor ?>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="col-sm-4">
                <div class="contest-grid-price contest-price-row bg-purple-gradient" style="">
                    <div class="contest-pics">
                        <img src="<?php echo base_url('uploads/contests/'.$contestComp->contest_3d_picture)?>" class="img-circle" width="100%">
                    </div>
                    <div class="contest-price text-center">
                        <h3 class="text-center text-white"><?php echo $contestComp->contest_3rd_price ?></h3>
                        <ul>
                            <?php
                            //$firstReward = $contestComp->first_reward;
                            $expTReward = explode(',', $contestComp->third_reward);

                            for($t=0; $t<count($expTReward); $t++):

                                ?>
                                <li><?php echo $expTReward[$t]?></li>

                            <?php endfor ?>
                        </ul>
                    </div>
                </div>
            </div>


    </div>


    <div class="contest-owner" style="min-height: 300px;background: #fff; padding-top: 40px">
        <div class="container">
            <!--<div class="contest-owner-pic text-center">
                <img src="<?php /*echo base_url()*/?>display_picture/block_xF5KnyNML7.png" width="250" height="250" class="img-circle img-thumbnail">

            </div>-->

            <!--<div>
                <h2 class="text-center">Tyler Thomson</h2>

                <p class="text-left">Hello! My name is Tyler Thompson and I am from Northwest Arkansas! My wife and I currently run a Wedding Photography and Videography business. Although I mostly shoot weddings I have a passion for Landscape Photography. Any chance I get, I go outside and explore the world around me. Photography has given me so many opportunities to travel this Earth</p>
            </div>-->

            <h2 class="text-center" style="margin-bottom: 30px">How Kompetes Contest Works</h2>

            <div class="row" style="padding-top: 30px;">


                <div class="col-sm-7 col-sm-offset-3" style="padding: 0">
                    <div class="contest-Hwork">
                        <?php
                        $timestampStart = strtotime($contest->contest_start_date);
                        $formattedStartDate = date('F d', $timestampStart);

                        //vote end
                        $timestampClose = strtotime($contest->contest_close_date);
                        $formattedCloseDate = date('F d, Y', $timestampClose);

                        //remaining date
                        $d1=strtotime($contest->contest_start_date);
                        $d2=ceil(($d1-time())/60/60/24);

                        ?>
                        <ul>
                            <li>
                                <i class="fa fa-clock-o fa-3x text-blue"></i>
                                <span><?php echo $d2 ?> days left | Vote from <?php echo $formattedStartDate;?> until <?php echo $formattedCloseDate;?> </span>
                            </li>

                            <li>
                                <i class="fa fa-picture-o fa-3x text-purple"></i>
                                <span><?php echo $countEntries; ?> submissions | Vote from <?php echo $formattedStartDate;?> until <?php echo $formattedCloseDate;?></span>
                            </li>

                            <li>
                                <i class="fa fa-heart-o fa-3x text-red"></i>
                                <span>Judged based on creativity, originality and in accordance to the theme</span>
                            </li>


                           <!-- <li>
                                <i class="fa fa-tag fa-3x"></i>
                                <span>Entry fee: Free for Premium and Pro members</span>
                            </li>-->

                            <li>
                                <i class="fa fa-dollar fa-3x text-red"></i>
                                <span>Entry fee: <?php if($contest->entry_price=='Free'){echo 'Free';}else{echo $contest->entry_price.' Points ';} ?> for Premium and Pro members</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-5 text-center hidden" hidden>
                    <img src="<?php echo base_url()?>img/how_1%5B1%5D.png" width="100" style="margin-top: 70px;">
                    <p class="text-center" style="margin-top: 30px;">You always maintain to your submissions. <br> By entering this Contest you accept the terms of use</p>
                </div>
            </div>
        </div>
    </div>





    <div class="contest-foot">

        <h4 class="text-center text-white">Partners & Brands</h4>
        <p class="text-center text-white" style="font-size: 20px"> Collaborate with millions of creative photographers to increase your reach and find awesome & original content. <a href="">Learn more!</a> </p>

    </div>




    <!-- begins from here -->

    <div class="footer">
        <div class="container">
            <div class="col-sm-12">

                <ul>
                    <li><a>About Us</a></li>
                    <li><a>Support</a></li>
                    <li><a>Privacy</a></li>
                    <li><a>Terms</a></li>
                    <li><a>Judges</a></li>
                    <li><a>Facebook</a></li>
                    <li><a><i class=""></i> Twitter</a></li>
                    <li><a>Instagram</a></li>
                    <li><a>Google+</a></li>
                    <li><a>Disclaimer</a></li>
                </ul>

            </div>

        </div>
    </div>
</section>

<!-- modal for submitting photo -->
<div id="myModal" class="modal fade no-padding-xs" role="dialog">
    <div class="modal-dialog no-border-radius m-0" style="width: 100% !important;">

        <!-- Modal content-->
        <div class="modal-content no-border-radius p-t-20 no-margin-xs" style="height: 575px">
            <div class="text-right m-b-30 p-r-10" >
                <a class="" data-dismiss="modal">X</a>
            </div>
            <div class="p-l-20" style="margin-top: -40px">
                <p>Click the photo(s) you'd like to submit or <a href="<?php echo base_url('upload')?>" class="btn btn-xs btn-success">Upload</a> </p>
            </div>

            <div class="p-l-2-" style="min-height: 50px;background: #d5d5d5"></div>
            <?php echo form_open_multipart('contests/submit_entry/'.$this->uri->segment(3))?>
            <div class="p-20 ">


                <?php
                if(isset($_SESSION['userLogginID'])){

                    $userID = $_SESSION['userLogginID'];

                    $this->db->where("user_id='$userID'");
                    $countPhoto = $this->db->count_all_results('uploads');
                }

                else{

                    $countPhoto =0;
                }



                if($countPhoto >=1){

                    $this->db->where("user_id='$userID'");
                    $getUploadPicture = $this->db->get("uploads")->result_array();
                    $sn = 1; $sn2 = 1;
                    foreach($getUploadPicture as $getPhotoz):
                        ?>
                        <div class="submit-photo">
                            <input type="radio" name="photo" value="<?php echo $getPhotoz['picture_id']?>" id="cb<?php echo $sn++; ?>" />
                            <label for="cb<?php echo $sn2++; ?>"><img src="<?php echo base_url('uploads/small_thumb/'.$getPhotoz['picture_small_name'])?>" /></label>
                        </div>

                        <?php
                    endforeach;

                }
                elseif($countPhoto <=0){ ?>

                    <h6 class="text-center">No picture uploaded by you yet</h6>

                <?php }elseif(!isset($_SESSION['userLogginID'])){ ?>

                    <h6 class="text-center">Please loggin</h6>

                <?php } ?>
            </div>

            <nav class="navbar navbar-default navbar-fixed-bottom voteBottomView" style="background: #fff">
                <div class="container-fluid">
                    <div id="MobileHMenuStick" style="background: #fff">
                        <div class="m-b-10 p-l-20" style="">
                            <div class="pull-left">
                                <div class="">
                                    <input type="hidden" name="entry_type" value="contest">
                                    <input type="submit" value="Submit" class="btn btn-success btn-sm no-border-radius">Submit</input>

                                    By entering this challenge you accept ViewBug's Terms of Use
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
            <?php echo form_close();?>
        </div>
    </div>

</div>
<!-- End modal for submitting photo -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

</body>
</html>