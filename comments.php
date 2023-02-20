<?php if ( post_password_required() ) {
	return;
} ?>

<div id="comments-wrapper" class="mt-5">

	<?php if ( have_comments() ) { ?>

		<h2 class="comments-title mb-3">
			<?php
			comments_number(
				esc_html__( 'No comments yet.', 'groundctrl' ),
				esc_html__( 'One comment.', 'groundctrl' ),
				esc_html__( '% comments.', 'groundctrl' )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>

			<nav class="navigation comment-navigation" role="navigation">

				<h2 class="screen-reader-text section-heading">
					<?php esc_html_e( 'Comment navigation', 'groundctrl' ); ?>
				</h2>

				<div class="nav-previous">
					<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'groundctrl' ) ); ?>
				</div>

				<div class="nav-next">
					<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'groundctrl' ) ); ?>
				</div>

			</nav>
		
			<?php
		}
	}

	if ( ! comments_open() && get_comments_number() ) {
		?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'groundctrl' ); ?></p>

		<?php
	}

	comment_form(
		array(
			'class_submit'  => 'submit btn btn-primary',
		)
	);

	?>

</div> <!-- #comments-wrapper -->
