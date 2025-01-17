<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Poll_Maker_Ays
 * @subpackage Poll_Maker_Ays/admin/partials
 */


$action = isset($_GET['action']) ? sanitize_text_field( $_GET['action'] ) : '';
$id     = isset($_GET['poll']) ? absint($_GET['poll']) : null;
if ($action == 'duplicate' && $id != null) {
	$this->polls_obj->duplicate_poll($id);
}
$poll_max_id = Poll_Maker_Ays_Admin::get_max_id('polls');

$plus_icon_svg = "<span class=''><img src='". POLL_MAKER_AYS_ADMIN_URL ."/images/icons/add-new.svg'></span>";
?>

<div class="wrap ays-poll-list-table ays_polls_list_table">
    <div class="ays-poll-heading-box">
        <div class="ays-poll-wordpress-user-manual-box">
            <a href="https://ays-pro.com/wordpress-poll-maker-user-manual" target="_blank" style="text-decoration: none;font-size: 13px;">
                <i class="ays_poll_fas ays_fa_file_text"></i>
                <span style="margin-left: 3px;text-decoration: underline;"><?php echo __("View Documentation", $this->plugin_name); ?></span>
            </a>
        </div>
    </div>
    <h1 class="wp-heading-inline">
		<?php
		echo esc_html(get_admin_page_title());
        ?>
    </h1>
    <div class='heading_buttons_container'>
        <div class='ays-poll-add-new-button-box'>
            <?php
                echo sprintf('<a href="?page=%s&action=%s" class="page-title-action button-primary ays-poll-add-new-button ays-poll-add-new-button-new-design"> %s ' . __('Add New', $this->plugin_name) . '</a>', esc_attr($_REQUEST['page']), 'add', $plus_icon_svg);
            ?>
        </div>
<!-- ///////////////   QUICK POLL START   ////////////// -->
        <div class="create_quick_poll_container">
            <button class="create_quick_poll" id="ays_create_quick_poll" title="<?php echo __( "Create Quick Poll", $this->plugin_name ); ?>"><img src="<?php echo POLL_MAKER_AYS_ADMIN_URL . '/images/icons/icon-128x128.png' ?>" alt="Create Quick Poll"></button> 
        </div>
    </div>
    <div class="ays_poll_modal" id="ays-poll-quick-create" style='display:none'>
        <!-- Modal content -->
        <div class="ays_poll_modal_content ays-modal-content fadeInDown" id="ays-poll-quick-create-content">
            <div class="ays-modal-header">
                <h4><?php echo __('Build your poll in a few minutes', $this->plugin_name); ?></h4>
                <span class="ays-close-quick-create">&times;</span>
            </div> 
            <div class="ays-modal-quick-poll-content">
                <form method="POST" id="ays-quick-poll-form">
                    <!-- Title  -->
                    <div class="ays-modal-poll-title-add">
                        <span><label for="ays-quick-poll-title"><?php echo __('Poll Title', $this->plugin_name); ?></label></span>
                        <input type="text" name="ays-poll-title" id="ays-quick-poll-title" data-required="true">
                    </div>
                    <!-- Question -->
                    <div class="ays-modal-poll-question-add">
                        <span><label for="ays-quick-poll-question"><?php echo __('Question', $this->plugin_name); ?></label></span>
                        <textarea name="ays_poll_question" id="ays-quick-poll-question" placeholder="<?php echo __('Ask a question*', $this->plugin_name); ?>" rows="3"></textarea>
                    </div>
                    <!-- Answers -->
                    <div class="ays-modal-poll-answers-section">
                        <span><label for="quick_poll_answer-1"><?php echo __('Answers', $this->plugin_name); ?></label></span>
                        <div class="quick_poll_answer_box">
                            <input class="quick_poll_answer" name="ays-poll-answers[]" data-id="1" placeholder="<?php echo __('Option*', $this->plugin_name); ?>">
                            <button type="button" class="quick_poll_answer_remove"><img src="<?php echo (POLL_MAKER_AYS_ADMIN_URL . '/images/remove-normal.png')?>" alt="remove" width="20px"></button>
                        </div>
                        <div class="quick_poll_answer_box">
                            <input class="quick_poll_answer" name="ays-poll-answers[]" data-id="2" placeholder="<?php echo __('Option*', $this->plugin_name); ?>">
                            <button type="button" class="quick_poll_answer_remove"><img src="<?php echo (POLL_MAKER_AYS_ADMIN_URL . '/images/remove-normal.png')?>" alt="remove" width="20px"></button>
                        </div>
                        <div class="quick_poll_answer_box">
                            <input class="quick_poll_answer" name="ays-poll-answers[]" data-id="3" placeholder="<?php echo __('Option*', $this->plugin_name); ?>">
                            <button type="button" class="quick_poll_answer_remove"><img src="<?php echo (POLL_MAKER_AYS_ADMIN_URL . '/images/remove-normal.png')?>" alt="remove" width="20px"></button>
                        </div>
                        <button type="button" class="quick_poll_add_option"><div><span>+</span></div><?php echo __('Add an Option', $this->plugin_name); ?></button>
                    </div>
                    <div class="quick_poll_divider"></div>
                    <!-- Settings -->
                    <div class="quick_poll_settings">
                        <h4><?php echo __('Settings', $this->plugin_name); ?></h4>
                        <!-- Allow not to vote -->
                        <div>
                            <span><?php echo __('Allow not to vote', $this->plugin_name); ?></span>
                            <input type="checkbox" id="allow_not_to_vote" name="allow-not-vote" >
                            <label for="allow_not_to_vote">Toggle</label>
                        </div>
                        <!-- Allow multivote -->
                        <div class='multivote-container'>
                            <div>
                                <span><?php echo __('Allow multivote', $this->plugin_name); ?></span>
                                <input type="checkbox" id="allow_multivote_switch" name="allow_multivote_switch">
                                <label for="allow_multivote_switch">Toggle</label>
                            </div>
                            <!-- Multivote Settings -->
                            <div class="quick_poll_multivote_settings">
                                <input type="number" id="quick-poll-multivote-min-count" name="quick-poll-multivote-min-count" placeholder="<?php echo __('Min', $this->plugin_name); ?>">
                                <input type="number" id="quick-poll-multivote-max-count" name="quick-poll-multivote-max-count" placeholder="<?php echo __('Max', $this->plugin_name); ?>">
                            </div>
                        </div>
                        <!-- Show author -->
                        <div>
                            <span><?php echo __('Show author', $this->plugin_name); ?></span>
                            <input type="checkbox" name="quick-poll-show_poll_author" id="quick-poll-show-poll-author" value="1"> 
                            <label for="quick-poll-show-poll-author">Toggle</label>
                        </div>
                    </div>
                    <!-- Save -->
                    <div class="quick_poll_save">
                        <input type="button" id="ays-save-quick-poll" value="<?php echo __('Save', $this->plugin_name); ?>">
                    </div>
                </form>
            </div> 
        </div>
    </div>

<!-- ///////////////   QUICK POLL END  ////////////// -->
    <div id="poststuff">
        <div id="post-body" class="metabox-holder">
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
                <?php
                        $this->polls_obj->views();
                    ?>
                    <form method="post">
						<?php
                        $this->polls_obj->prepare_items();
                        $search = __("Search" , $this->plugin_name);
                        $this->polls_obj->search_box($search, $this->plugin_name);
						$this->polls_obj->display();
						?>
                    </form>
                </div>
            </div>
        </div>
        <br class="clear">
    </div>
    <div class="ays-poll-create-poll-youtube-video-button-box">
            <?php echo sprintf( '<a href="?page=%s&action=%s" class="ays-poll-add-new-button-video  ays-poll-add-new-button-new-design"> %s ' . __('Add New', $this->plugin_name) . '</a>', esc_attr( $_REQUEST['page'] ), 'add', $plus_icon_svg);?>
    </div>
    <?php if($poll_max_id <= 3): ?>
        <div class="ays-poll-create-poll-video-box" style="margin: 10px auto 30px;">
            <div class="ays-poll-create-poll-title">
                <h4><?php echo __( "Create Your First Poll in Under One Minute", $this->plugin_name ); ?></h4>
            </div>
            <div class="ays-poll-create-poll-youtube-video">
                <iframe width="560" height="315" class="ays-poll-youtube-video-responsive" src="https://www.youtube.com/embed/0dfJQdAwdL4" loading="lazy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    <?php else: ?>
        <div class="ays-poll-create-poll-video-box" style="margin: auto;">
            <div class="ays-poll-create-poll-youtube-video">
                <a href="https://www.youtube.com/watch?v=0dfJQdAwdL4" target="_blank" title="YouTube video player" >
                    <img src="<?php echo POLL_MAKER_AYS_ADMIN_URL . '/images/icons/video_youtube_icon.svg' ?>" alt="How to create a Poll in Under One Minute">
                    <span>How to create a Poll in Under One Minute</span>
                </a>
            </div>
        </div>
    <?php endif ?>
</div>
