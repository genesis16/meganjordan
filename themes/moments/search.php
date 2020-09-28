<?php $sidebar = moments_qodef_sidebar_layout(); ?>
<?php get_header(); ?>
<?php 

$blog_page_range = moments_qodef_get_blog_page_range();
$max_number_of_pages = moments_qodef_get_max_number_of_pages();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
?>
<?php moments_qodef_get_title(); ?>
	<div class="qodef-container">
		<?php do_action('moments_qodef_after_container_open'); ?>
		<div class="qodef-container-inner clearfix">
			<div class="qodef-container">
				<?php do_action('moments_qodef_after_container_open'); ?>
				<div class="qodef-container-inner" >
					<div class="qodef-blog-holder qodef-blog-type-standard">
                        <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="qodef-post-content">
                                <div class="qodef-post-text">
                                    <div class="qodef-post-text-inner">
                                        <h2 itemprop="headings" class="entry-title">
                                            <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <?php
                                            moments_qodef_read_more_button();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endwhile; ?>
                        <?php
                            if(moments_qodef_options()->getOptionValue('pagination') == 'yes') {
                                moments_qodef_pagination($max_number_of_pages, $blog_page_range, $paged);
                            }
                        ?>
                        <?php else: ?>
                        <div class="entry">
                            <p><?php esc_html_e('No posts were found.', 'moments'); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
				    <?php do_action('moments_qodef_before_container_close'); ?>
			    </div>
			</div>
		</div>
		<?php do_action('moments_qodef_before_container_close'); ?>
	</div>
<?php get_footer(); ?>