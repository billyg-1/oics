<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     4.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

/* Customized script - Added column class for all fields */

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title">
			<?php
			$count = $product->get_review_count();
			if ( $count && wc_review_ratings_enabled() ) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'pallikoodam' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
				echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
			} else {
				esc_html_e( 'Reviews', 'pallikoodam' );
			}
			?>
		</h2>

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'pallikoodam' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php

					if(is_user_logged_in()) {

						$commenter = wp_get_current_commenter();

						$comment_form = array(
							/* translators: %s is product title */
							'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'pallikoodam' ) : sprintf( esc_html__( 'Be the first to review %s', 'pallikoodam' ), '&ldquo;'.get_the_title().'&rdquo;' ),
							/* translators: %s is product title */
							'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'pallikoodam' ),
							'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
							'title_reply_after'    => '</span>',
							'comment_notes_after'  => '',
							'fields'               => array(
								'author' => '<div class="column dt-sc-one-half first"><p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'pallikoodam' ) . '&nbsp;<span class="required">*</span></label> ' .
											'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p></div>',
								'email'  => '<div class="column dt-sc-one-half"><p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'pallikoodam' ) . '&nbsp;<span class="required">*</span></label> ' .
											'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></p></div>',
							),
							'label_submit'  => esc_html__( 'Submit', 'pallikoodam' ),
							'logged_in_as'  => '',
							'comment_field' => '',
						);

						$account_page_url = wc_get_page_permalink( 'myaccount' );
						if ( $account_page_url ) {
							/* translators: %s opening and closing link tags respectively */
							$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %slogged in%s to post a review.', 'pallikoodam' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
						}

						if ( wc_review_ratings_enabled() ) {
							$comment_form['comment_field'] = '<div class="column dt-sc-one-fourth first"><div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'pallikoodam' ) . '</label><select name="rating" id="rating" required>
								<option value="">' . esc_html__( 'Rate&hellip;', 'pallikoodam' ) . '</option>
								<option value="5">' . esc_html__( 'Perfect', 'pallikoodam' ) . '</option>
								<option value="4">' . esc_html__( 'Good', 'pallikoodam' ) . '</option>
								<option value="3">' . esc_html__( 'Average', 'pallikoodam' ) . '</option>
								<option value="2">' . esc_html__( 'Not that bad', 'pallikoodam' ) . '</option>
								<option value="1">' . esc_html__( 'Very poor', 'pallikoodam' ) . '</option>
							</select></div></div>';
						}

						$comment_form['comment_field'] .= '<div class="column dt-sc-three-fourth"><p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'pallikoodam' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p></div>';

					} else {

						$commenter = wp_get_current_commenter();

						$comment_form = array(
							/* translators: %s is product title */
							'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'pallikoodam' ) : sprintf( esc_html__( 'Be the first to review %s', 'pallikoodam' ), '&ldquo;'.get_the_title().'&rdquo;' ),
							/* translators: %s is product title */
							'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'pallikoodam' ),
							'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
							'title_reply_after'    => '</span>',
							'comment_notes_after'  => '',
							'fields'               => array(
								'author' => '<div class="column dt-sc-one-half first"><p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'pallikoodam' ) . '&nbsp;<span class="required">*</span></label> ' .
											'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p></div>',
								'email'  => '<div class="column dt-sc-one-half"><p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'pallikoodam' ) . '&nbsp;<span class="required">*</span></label> ' .
											'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></p></div></div>',
							),
							'label_submit'  => esc_html__( 'Submit', 'pallikoodam' ),
							'logged_in_as'  => '',
							'comment_field' => '',
						);

						$account_page_url = wc_get_page_permalink( 'myaccount' );
						if ( $account_page_url ) {
							/* translators: %s opening and closing link tags respectively */
							$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %s logged in %s to post a review.', 'pallikoodam' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
						}

						if ( wc_review_ratings_enabled() ) {
							$comment_form['comment_field'] = '<div class="column dt-sc-one-fourth first"><div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'pallikoodam' ) . '</label><select name="rating" id="rating" required>
								<option value="">' . esc_html__( 'Rate&hellip;', 'pallikoodam' ) . '</option>
								<option value="5">' . esc_html__( 'Perfect', 'pallikoodam' ) . '</option>
								<option value="4">' . esc_html__( 'Good', 'pallikoodam' ) . '</option>
								<option value="3">' . esc_html__( 'Average', 'pallikoodam' ) . '</option>
								<option value="2">' . esc_html__( 'Not that bad', 'pallikoodam' ) . '</option>
								<option value="1">' . esc_html__( 'Very poor', 'pallikoodam' ) . '</option>
							</select></div></div>';
						}

						$comment_form['comment_field'] .= '<div class="column dt-sc-three-fourth"><p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'pallikoodam' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';
						
					}

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'pallikoodam' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
