<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 0.1
 */

if ( post_password_required() ) {
    return;
}
?>

<div class="comments">
    <div class="comments-form">
        <?php
            $comments_options = array(
                                    comment_notes_after  => '',
                                    comment_notes_before => '',
                                    max_depth            => 1
                                );

            comment_form($comments_options);
        ?>
    </div>

    <?php if ( have_comments() ) : ?>
        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 56
                ) );
            ?>
        </ol>
    <?php endif; ?>
</div>
