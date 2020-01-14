<div id="comments">
    <h2 class="header">
        <?php
            _e('Comments', 'tdt-one');
        ?>
    </h2>
    <?php
    if(post_password_required() ) :
        ?>
            <div id="password-required">
        <?php
        _e('Please Enter Passwords To View Comments', 'tdt-one');
        ?>
            </div>
        <?php
        return;
    endif;
    ?>
    <div class="old-comments">
    <?php
    if(have_comments() ) {
        wp_list_comments(
            array( 'avatar_size' => 48,
                                        'short_ping' => true,
                                        'style' => 'div' ) 
        );
                                        
        if(get_comment_pages_count() > 1 ) {
            ?>
                        <div class="comment-pages-nav split-2 ">
                            <div>
            <?php
             previous_comments_link(__('&laquo; Newer Comments', 'tdt-one'));
            ?>
                            </div>
                            <div class="align-right">
            <?php
             next_comments_link(__('Older Comments &raquo;', 'tdt-one'));
            ?>
                            </div>
                        </div>            
            <?php
        } 
    }else{
                
        if(comments_open() ) :
            ?>
                    <h4 id="no-comments" class="align-center">
            <?php _e('This post has no comments yet. Be the first to comment', 'tdt-one'); ?>
                    </h4>
            <?php
        endif;
    }
    ?>
    </div>
    
    <?php 
    if(comments_open()    ) {
        comment_form();
    } else {
        ?>
                    <h4 class="align-center comments-closed">
        <?php _e('Comments are now closed', 'tdt-one'); ?>
                    </h4>
        <?php
    }
    ?>
</div>
