<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/carousel_photo.css')?>">

<?php foreach($getPhoto as $select_photo)?>

<?php
//get ownerInformation

    $ownerId = $select_photo->user_id;
    $this->db->where("user_id='$ownerId'");
    $ownerInfo = $this->db->get("userz")->result();
    foreach($ownerInfo as $ownerInfo)



?>

<section class="content" style="margin-top: 50px;padding: 0;">

        <div class="container-fluid">

            <!-- sharing link and follow button -->
            <div class="share-follow-row">
                <div class="col-sm-6 col-xs-5">
                    <div class="photo_share_row" style="margin-left: -20px">
                        <ul>
                            <li><a href=""><i class="fa fa-star"></i></a></li>
                            <li class="pull-right visible-xs" style="margin-right: -5px !important;"><a href="" class="text-red"><i class="fa fa-thumbs-up"></i></a></li>
                            <li class="hidden-xs" style=""><a href="" class="text-red"><i class="fa fa-thumbs-up"></i></a></li>
                            <li class="hidden-xs"><a href="" class="text-red"><i class="fa fa-twitter"></i></a></li>
                            <li class="hidden-xs"><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li class="hidden-xs"><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li class="hidden-xs"><a href="" class="text-red"><i class="fa fa-pinterest"></i></a></li>
                            <li class="hidden-xs"><a href=""><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-sm-6 col-xs-7">
                    <div class="pull-right" style="margin-top: 10px">
                        <div class="left p-t-5" style="float: left; margin-right: 10px">
                            <a href="<?php echo base_url('profile/check/'.$ownerInfo->user_id)?>"><img src="<?php if(empty($ownerInfo->picture)){echo base_url('users_photo/avatar.png');}else{echo base_url('users_photo/'.$ownerInfo->picture);}?>" width="40" style="height: 40px;width: 40px" class="img-circle"></a>
                        </div>
                        <div class="right"style="float: right">
                            <span class="userName"><a href="<?php echo base_url('profile/check/'.$ownerInfo->user_id)?>"><b><?php echo $ownerInfo->username ?></b></a></span>
                            <br>
                            <a href="<?php echo base_url('follow/following/'.$ownerId) ?>"><label class="label label-default">Follow</label></a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="photo_display_container" style="">

                    <div class="carousel">
                        <div class="itemsNext">
                            <div class="itm text-center">
                                <img src="<?php echo base_url('uploads/'.$select_photo->picture_name)?>" class="text-center">
                            </div>

                        </div>
                            <?php
                            $this->db->where("user_id ='$ownerId'");
                            $this->db->order_by('id','RANDOM');
                            $getNextPhoto = $this->db->get('uploads')->result();

                            foreach($getNextPhoto as $nextPhoto)

                            ;?>
                            <a href="<?php echo base_url('photos/check/'.$nextPhoto->picture_id); ?>" style="height: 30px;" class="text-black">
                                <div class="next arrow"></div>
                            </a>

                            <a  href="<?php echo base_url('photos/check/'.$nextPhoto->picture_id); ?>">
                                <div class="previous arrow" data-disabled=""></div>
                            </a>
                    </div>


                  <!-- <div class="photo_display">
                        <img src="<?php /*echo base_url()*/?>photo/60722357_large1300.jpg">
                    </div>-->

                </div>
            </div>
        </div>



    <div class="" style="background: #fff">
        <div class="container-fluid">
            <div class="commentAward_row" style="min-height: 300px;margin-top: 20px">

                <div class="col-sm-4 col-sm-offset-1">

                    <div id="photo-info" class="more_feature sidebar">
                        <?php

                        //get other picture from same user
                        $ownerId = $select_photo->user_id;

                        $this->db->where("user_id ='$ownerId'");
                        $getMore = $this->db->get('uploads')->result();

                        foreach($getMore as $morePhotos):?>


                            <a href="<?php echo base_url('photos/check/'.$morePhotos->picture_id)?>">
                                <img src="<?php echo base_url("uploads/small_thumb/".$morePhotos->picture_small_name)?>">
                            </a>

                        <?php endforeach ?>

                        <div class="">
                            <small> More from <?php echo $ownerInfo->username; ?> </small>
                        </div>

                        <div class="comment_date">
                            <div class="top-info">
                                <h4><?php echo $countComment; ?></h4>
                                <span class="info-title">Comments</span>
                            </div>

                            <div class="top-info">
                                <h4><?php if(empty($select_photo->view)){echo 0;}else{echo $select_photo->view;}?></h4>
                                <span class="info-title">views</span>
                            </div>

                            <div class="top-info">
                                <h4><?php echo time_elapsed_string($morePhotos->date);?></h4>
                                <span class="info-title">Uploaded</span>
                            </div>
                        </div>

                        <br>
                        <div class="title-contain">
                            <h3><?php echo $select_photo->title;?></h3>
                        </div>


                        <div class="photo_discription">
                            <p><?php echo $select_photo->description; ?></p>
                        </div>

                        <div class="block tags">
                            <div class="block-mini">Tags</div>
                            <?php

                            $tags = explode(',', $select_photo->tags);

                            foreach($tags as $tag):

                            ?>


                            <a href="">#<?php echo str_replace(' ','',$tag) ?></a>
                            <!--<a href="/search/tags/drink">#drink</a>-->

                            <?php endforeach ?>
                        </div>


                        <div class="block tags">
                            <div class="block-mini">Categories</div>
                            <?php

                            $tags = explode(',', $select_photo->category);

                            foreach($tags as $tag):

                                ?>


                                <a href="">#<?php echo str_replace(' ','',$tag) ?></a>
                                <!--<a href="/search/tags/drink">#drink</a>-->

                            <?php endforeach ?>
                        </div>

                      <!--  <div class="block metadata">
                            <div class="block-mini"></div>
                            <div class="item camera">Camera: <span><a href="/search/camera/canon+eos+6d">Canon EOS 6D</a></span></div>
                            <div class="item aperture">Aperture: <span>f/8</span></div>
                            <div class="item iso_film">ISO: <span>100</span></div>
                            <div class="item exposure_time">Shutter Speed: <span>1/250</span></div>
                            <div class="item exposure_time">Focal Length: <span>70/1</span></div>
                        </div>-->


                        <div class="photo_contest">
                            <h6>Photo Contest & Challenges Submission</h6>


                            <ul class="tag-style">

                                <?php

                                foreach($getEntry as $entry){

                                     $entryName = $entry['entry_name'];



                                ?>

                                <li>
                                    <a href="<?php echo base_url($entry['entry_type'].'s/check/'.$entry['entry_id'])?>"><?php echo $entryName ?></a>
                                </li>

                                <?php } ?>
                            </ul>
                        </div>


                        <!--<div class="extra block awards overflow">
                                <h3>Awards</h3>
                                <div class="block award type-default">
                                    Won People's Choice in COWS Photo Challenge<span class="award-date">June, 2017</span>
                                </div>

                                <div class="block award type-default">
                                    Winner in African Animals Photo Challenge<span class="award-date">March, 2017</span>
                                </div>

                                <div class="block award type-contestf">
                                    Won Contest Finalist in Visions Of Africa Photo Contest<span class="award-date">February, 2017</span>
                                </div>

                                <div class="block award type-default">
                                    Won People's Choice in Life Photo Challenge<span class="award-date">August, 2016</span>
                                </div>

                                <div class="block award type-default">
                                    Won People's Choice in Tell me a story Photo Challenge<span class="award-date">January, 2016</span>
                                </div>
                            </div>-->

                        <!--<div class="extra sidebar overflow" style="">
                            <h3>Likes</h3>
                            <items class="block belongs" style="">
                                <item class="peer-recognition" style="">

                                    <div class="peer-users" style="">
                                        <span class="peer-user"><a href="#" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2014/09/12/32325871_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                        </span>
                                        <span class="peer-user"><a href="#" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2015/11/26/60763325_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/BLPhotography" class="avatar_membership" target="_parent">PRO</a>
                                                                </span>
                                        <span class="peer-user"><a href="#" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2016/08/18/67939287_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                        </span>
                                        <span class="peer-user"><a href="#" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2016/03/11/64461859_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/terrysigns13" class="avatar_membership" target="_parent">PRO</a>
                                                                </span>
                                        <span class="peer-user"><a href="#" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2016/04/30/65770279_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/pamelahodges" class="avatar_membership" target="_parent">PRO</a>
                                                                </span>
                                        <span class="peer-left"><a href="javascript:" data-award="likes" data-page="1" data-left="835">+835</a></span>
                                    </div>
                                </item>
                            </items>
                        </div>-->

                        <!--<div class="extra overflow">
                            <h3>Peer Award</h3>
                            <items class="block belongs">
                                <item class="peer-recognition">
                                    <div class="peer-title">Peer Award</div>

                                    <div class="peer-users">
                    	                        	<span class="peer-user"><a href="/member/JoaoAscenso" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/08/30/74833973_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/JoaoAscenso" class="avatar_membership" target="_parent">PRO</a>
                                                                </span>
                                        <span class="peer-user"><a href="/member/tinamerrigan" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/12/04/76420242_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                        </span>
                                        <span class="peer-user"><a href="/member/SerhiyPochatko" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/10/18/75704317_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                        </span>
                                        <span class="peer-user"><a href="/member/martinisma" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2016/04/07/65304767_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                        </span>
                                        <span class="peer-user"><a href="/member/SherrylM" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/12/09/76488899_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/SherrylM" class="avatar_membership" target="_parent">PRO</a>
                                                                </span>
                                        <span class="peer-left"><a href="javascript:" data-award="Peer Award" data-page="1" data-left="159">+159</a></span>
                                    </div>
                                </item>
                                <item class="peer-recognition">
                                    <div class="peer-title">Superb Composition</div>

                                    <div class="peer-users">
                    	                        	<span class="peer-user"><a href="/member/creative_odd_duck" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/11/29/76354777_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/creative_odd_duck" class="avatar_membership" target="_parent">PRO</a>
                                                                </span>
                                        <span class="peer-user"><a href="/member/vicgoodfellow" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/03/13/71849525_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                        </span>
                                        <span class="peer-user"><a href="/member/rPerry" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/03/13/71852752_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/rPerry" class="avatar_membership" target="_parent">Premium</a>
                                                                </span>
                                        <span class="peer-user"><a href="/member/kariwatkins" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2013/11/02/4890501_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/kariwatkins" class="avatar_membership" target="_parent">PRO</a>
                                                                </span>
                                        <span class="peer-user"><a href="/member/efimbirenbaum" target="_parent"><img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/02/03/71206816_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/efimbirenbaum" class="avatar_membership" target="_parent">Premium</a>
                                                                </span>
                                        <span class="peer-left"><a href="javascript:" data-award="Superb Composition" data-page="1" data-left="144">+144</a></span>
                                    </div>
                                </item>

                                <item class="peer-recognition">
                                    <div class="peer-title">Magnificent Capture</div>

                                    <div class="peer-users">
                                        <span class="peer-user">
                                            <a href="#" target="_parent">
                                                <img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/11/30/76368699_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;">
                                            </a>
                                        </span>
                                        <span class="peer-user">
                                            <a href="#" target="_parent">
                                                <img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2017/11/08/76047879_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/brownmoyondizvo" class="avatar_membership" target="_parent">
                                                PRO
                                            </a>
                                        </span>

                                        <span class="peer-user">
                                            <a href="#" target="_parent">
                                                <img src="https://photo-viewbug.s3.amazonaws.com/media/mediafiles/2012/06/06/1892173_75x75.jpg" class="delayed" width="45" data-og="45" data-ow="45" style="height: 45px; opacity: 1;"></a>                                                    		<a href="/member/maryhale9534" class="avatar_membership" target="_parent">
                                                PRO
                                            </a>
                                        </span>

                                        <span class="peer-left">
                                            <a href="javascript:" data-award="Magnificent Capture" data-page="1" data-left="33">
                                                +33
                                            </a>
                                        </span>
                                    </div>
                                </item>
                                <div style="min-height: 100px"></div>
                            </items>
                        </div>-->

                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="col-sm-6 col-sm-offset-1" style="border-left: 1px solid #d2d2d2;background: #f6f6f6;margin-top: -16px">
                    <?php echo $success ?>
                    <!-- text-area for commenting -->
                    <div class="reviewRow">
                        <div class="reviewerField">
                            <div class="reviwerPic">
                                <img src="<?php if(!empty($userPhoto)){echo base_url('users_photo/'.$userPhoto);}else{ echo base_url('users_photo/avatar.png');}?>">
                            </div>
                        </div>
                        <div class="reviewerContent" id="comment">
                            <?php echo form_error('comment')?>
                            <?php echo form_open()?>
                            <div class="innerBubble" style="">
                                <div style="padding: 10px;">
                                    <textarea class="form-control no-border-radius" name="comment" rows="4" placeholder="Write your comment here not more than 200"></textarea>

                                    <?php if(isset($_SESSION['userLogginID'])){?>
                                    <input type="submit" class="btn btn-primary no-border-radius" value="Post Comment">
                                    <?php }else{?>

                                        <a href="<?php echo base_url('login?redirect=photos/check/'.$select_photo->picture_id.'#comment')?>" class="btn btn-danger">Login to Comment </a>

                                    <?php } ?>
                                </div>
                            </div>
                            <?php form_close()?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <!-- User comment area -->
                    <?php if($countComment >=1):?>
                        <?php foreach($getComment as $comment):?>
                            <?php //echo $countComment ?>
                            <div class="reviewRow">
                                <div class="reviewerField">
                                    <a href="<?php echo base_url('profile/check/'.$comment['user_id'])?>" class="text-black">
                                        <div class="reviwerPic">
                                            <img src="<?php if(!empty($comment['picture'])){echo base_url('users_photo/'.$comment['picture']);}else{ echo base_url('users_photo/avatar.png');}?>">
                                        </div>
                                        <div class="rname"><?php echo $comment['username']?></div>
                                    </a>

                                </div>
                                <div class="reviewerContent">
                                    <div class="innerBubble">
                                        <h5><a href="<?php echo base_url('profile/check/'.$comment['user_id'])?>" class="text-red"> <?php echo $comment['username'] ?></a></h5>
                                        <span><i class=" glyphicon glyphicon-clock"></i> <?php echo time_elapsed_string($comment['date']);?></span>
                                        <p><?php echo $comment['comment']?></p>

                                        <!--<div style="padding: 10px">
                                            <a href="#"><label class="label label-danger no-border-radius">Reply</label> </a>
                                        </div>
-->

                                        <!-- reply comment starts from here -->

                                       <!-- <div class="" style="margin-left: 5px; border-top: 1px dotted #d2d2d2;padding-top: 10px">
                                          <div class="col-sm-8">
                                              <input type="text" class="form-control" name="" style="border-radius: 0">
                                          </div>
                                          <div class="col-sm-4" style="padding-top: 5px">
                                              <button type="submit" class="btn btn-success btn-xs no-border-radius" value="Reply">Submit</button>
                                              <button type="submit" class="btn btn-warning btn-xs no-border-radius" value="Reply">Reply</button>
                                          </div>
                                        </div>-->

                                        <div class="clearfix"></div>

                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>


                </div>
            </div>
        </div>
    </div>






</section>

<script src='<?php echo base_url('js/photo/index.js')?>'></script>
<script src='<?php echo base_url('js/photo/photo_ca.js')?>'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>


</body>
</html>