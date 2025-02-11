<?php
$quiz_running = 'no_quiz_start';
$session_quiz_id = NULL;

$gradients = array();
$gradients[] = 'mask gradient-vue';
$gradients[] = 'mask gradient-angular';
$gradients[] = 'mask gradient-react';
$gradients[] = 'mask gradient-material';
$gradients[] = 'mask gradient-html';
$gradients[] = 'mask gradient-laravel';
$gradients[] = 'mask gradient-react-native';
$gradients[] = 'mask gradient-nuxtjs';

if($session_quiz_data && $session_quiz_question_data) 
{ 
    $quiz_running = 'quiz_running';
    $session_quiz_id = $session_quiz_data['id'];
    echo "<input type='hidden' value='".$session_quiz_id."' class='session_quiz_id'>";        
}

if($quiz_list_data)  
{
    foreach ($quiz_list_data as  $quiz_array) 
    {
        $price = $quiz_array->price > 1 ? '₹ '.$quiz_array->price : ' '.lang('free');
        $start_quiz_link = $quiz_array->price > 1 ? '₹ '.$quiz_array->price : ' '.lang('free');
        $quiz_id = $quiz_array->id;
        $quiz_url = $session_quiz_id == $quiz_id ?  base_url("test/$session_quiz_id/1") : base_url("instruction/$quiz_id");
        $quiz_btn_name = $session_quiz_id == $quiz_id  ?  lang('resume_test') : lang("start_quiz");
        if($quiz_url !=  base_url("test/$session_quiz_id/1") && $quiz_array->price > 1)
        {
            $quiz_url = base_url("quiz-pay/payment-mode/$quiz_id");
            $quiz_btn_name = $quiz_btn_name != lang('resume_test') ? lang('pay_now') : $quiz_btn_name;
        }
        
        if($session_quiz_id == $quiz_id)
        {

            $quiz_running_btn = "";
        }
        else if($quiz_array->price > 1)
        {
            $quiz_running_btn = "";   
        }
        else if($quiz_array->is_registered  == 1)
        {
            $quiz_running_btn = "";   
        }
        else
        {
            $quiz_running_btn = $quiz_running;
        }

        $lang_id = get_language_data_by_language($this->session->userdata('language'));
        $translate_quiz_title = get_translated_column_value($lang_id,'quizes',$quiz_id,'title');
        $quiz_title = $translate_quiz_title ? $translate_quiz_title : $quiz_array->title;
        $quiz_title = strlen($quiz_title) > 40 ? substr($quiz_title,0,40)."..." : $quiz_title;
        $quiz_user_name = $quiz_array->first_name.' '.$quiz_array->last_name;
        $quiz_user_name = strlen($quiz_user_name) > 20 ? substr($quiz_user_name,0,20)."..." : $quiz_user_name;
        
        ?>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> 
            <div class="card card-bundle" data-turbolinks="false"> 
                <div class="thumbnail"> 
                    <span class="maskk gradient-defaultt <?php echo xss_clean($gradients[mt_rand(0,7)]); ?>"> </span> 
                    <a href="<?php echo xss_clean($quiz_url); ?>" data-url="<?php echo xss_clean($quiz_url); ?>" id="quiz_<?php echo xss_clean($quiz_array->id);?>" class="thumb-cover  <?php echo xss_clean($quiz_running_btn); ?> statrt_quiz_btn" data-quiz_id="<?php echo xss_clean($quiz_array->id);?>" data-toggle="tooltip"  title="<?php  echo lang('start_quiz');?>"> </a>
                    <div class="details card-dark-shadow"> 
                        <div class="quiz_icons">
                            <a href="/javascript:void(0)" class="icon float-left text-white-im"><i class="fe fe-eye mr-1"></i> 
                                <span class="value"><?php echo xss_clean($quiz_array->total_view);?></span></a>
                                <a href="/javascript:void(0)" class="icon inline-block ml-3 float-right like-quiz text-white-im">
                                    <?php $like_or_not = (isset($quiz_array->like_id) && !empty($quiz_array->like_id) ? 'text-success' : 'text-muted');?>
                                    <i class="fav_icon fas fa-heart <?php echo xss_clean($like_or_not);?> text-white-im" data-quiz_id="<?php echo xss_clean($quiz_array->id);?>"></i> 
                                    <?php $total_like = (!empty($quiz_array->total_like) && $quiz_array->total_like > 0 ? $quiz_array->total_like : "");?>
                                    <span class="value like-quiz-count-<?php echo xss_clean($quiz_array->id);?>"><?php echo xss_clean($total_like);?></span>
                                </a>

                            </div>
                            <div class="framework-logo"> 
                                <p class="quiz_title"> <?php echo xss_clean($quiz_title); ?> </p> 
                                <div class="row quiz_middle_icon">
                                    <div class="col-6 text-center">
                                        <i class="far fa-question-circle"> </i> <br>
                                        <span class="value"><?php echo xss_clean($quiz_array->number_questions); ?> </span> <br>
                                        <?php echo lang('questions') ?>
                                    </div>

                                    <div class="col-6 text-center">
                                        <i class="fas fa-stopwatch"></i>   <br>
                                        <span class="value"><?php echo xss_clean($quiz_array->duration_min); ?></span><br>
                                        <?php echo lang('minutes') ?>
                                    </div>
                                </div>
                            </div> 

                            <div class="quiz_bottom_icon row mt-5 pb-3">
                                <div class="col-10 text-left">
                                    <span class="text-white-im">
                                        <i class="fas fa-user-tie mr-2"></i>
                                        <?php echo xss_clean($quiz_user_name); ?>
                                    </span>
                                </div>

                                <div class="col-2 text-right">
                                    <?php 
                                    if($quiz_array->price > 0)
                                    {
                                        echo '<i class="fas fa-lock "></i>';
                                        $start_or_pay = lang('quiz_pay_now');
                                    }
                                    else
                                    {
                                        echo '<i class="fas fa-unlock-alt"></i>';
                                        $start_or_pay = lang('start_quiz');
                                    }
                                    ?>                       
                                </div>
                            </div>
                        </div> 

                        <div class="actions"> 
                            <a href="<?php echo xss_clean(base_url('quiz-detail/'.$quiz_id)); ?>" class="title_quiz title-heading"><?php echo xss_clean($quiz_title); ?></a>
                            <a href="<?php echo xss_clean($quiz_url); ?>" data-url="<?php echo xss_clean($quiz_url); ?>" id="quiz_<?php echo xss_clean($quiz_array->id);?>" class="btn btn-neutral btn-fill <?php echo xss_clean($quiz_running_btn); ?> statrt_quiz_btn" data-quiz_id="<?php echo xss_clean($quiz_array->id);?>" data-toggle="tooltip"  title="<?php  echo $start_or_pay;?>">
                                <?php 
                                if($quiz_array->price > 0)
                                {
                                    echo '<i class="fas fa-money-bill"></i></i>';
                                }
                                else
                                {
                                    echo '<i class="far fa-play-circle"></i>';
                                }
                                ?>                    
                            </a> 
                            <?php 
                            if( $quiz_array->leader_board == 1)
                                { ?>
                                    <a href="<?php echo base_url("quiz/leader-board/$quiz_id") ?>" class="btn btn-neutral btn-fill" data-toggle="tooltip"  title="<?php echo lang('leader_board'); ?>"> 
                                        <i class="fas fa-poll"></i> 
                                    </a> 
                                <?php } ?>
                                <a class="btn btn-neutral btn-fill like-quiz" data-toggle="tooltip"  title="<?php echo lang('like'); ?>">
                                    <?php $like_or_not = (isset($quiz_array->like_id) && !empty($quiz_array->like_id) ? 'text-success' : 'text-muted');?>
                                    <i class="fav_icon fas fa-heart <?php echo xss_clean($like_or_not);?>" data-quiz_id="<?php echo xss_clean($quiz_array->id);?>"></i> 
                                    <?php $total_like = (!empty($quiz_array->total_like) && $quiz_array->total_like > 0 ? $quiz_array->total_like : "");?>
                                    <span class="like-quiz-count-<?php echo xss_clean($quiz_array->id);?>"><?php echo xss_clean($total_like); ?></span>
                                </a>
                            </div> 
                        </div> 
                    </div>
                    <div class="mobile-view">
                        <a href="<?php echo xss_clean($quiz_url); ?>" data-url="<?php echo xss_clean($quiz_url); ?>" id="quiz_<?php echo xss_clean($quiz_array->id);?>" class=" <?php echo xss_clean($quiz_running_btn); ?> statrt_quiz_btn float-left btn btn-primary btn-sm" data-quiz_id="<?php echo xss_clean($quiz_array->id);?>"><i class="far fa-play-circle"></i><?php  echo lang('start_quiz');?> </a>   
                        <?php 
                            if( $quiz_array->leader_board == 1)
                                { 
                        ?>
                                <a href="<?php echo base_url("quiz/leader-board/$quiz_id") ?>" class="btn-fill btn btn-warning btn-sm" ><i class="fas fa-poll"></i><?php echo lang('leader_board'); ?></a>
                        <?php } ?>
                        <a class="btn-fill like-quiz btn btn-info btn-sm float-right text-white">
                            <?php $like_or_not = (isset($quiz_array->like_id) && !empty($quiz_array->like_id) ? 'text-success' : 'text-muted');?>
                            <i class="fav_icon fas fa-heart <?php echo xss_clean($like_or_not);?>" data-quiz_id="<?php echo xss_clean($quiz_array->id);?>"></i> 
                            <span class="like-quiz-count-<?php echo xss_clean($quiz_array->id);?>"></span>
                          <?php echo lang('like'); ?>  
                        </a>    
                        <a href="<?php echo xss_clean(base_url('quiz-detail/'.$quiz_id)); ?>" class="btn btn-success w-100 mt-4"><?php echo xss_clean($quiz_title); ?></a>
                    </div> 
        </div>
            <?php 
    } 
}
else 
{
    ?>
    <div class="col-12 text-center text-danger"> <?php echo lang('no_quiz_found'); ?></div>
    <?php 
} ?>      