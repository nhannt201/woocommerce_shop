<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Orchid_Store
 */

get_header();
?>
<div class="inner-page-wrap archive-page-wrap">
	<?php
    /**
	* Hook - orchid_store_title_breadcrumb.
	*
	* @hooked orchid_store_title_breadcrumb_action - 10
	*/
	do_action( 'orchid_store_title_breadcrumb' );
	?>
    <div class="inner-entry">
        <div class="__os-container__">
            <div class="os-row">
                <div class="<?php orchid_store_content_container_class(); ?>">
                    <div id="primary" class="content-area">
					  <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
                        <div id="main" class="site-main">
                            <div class="archive-entry">
                                
                                 <?php
                                    if ( have_posts() ) :
                                        // Start the Loop.
                                        while ( have_posts() ) : the_post();
                                            /*
                                             * Include the post format-specific template for the content. If you want to
                                             * use this in a child theme, then include a file called called content-___.php
                                             * (where ___ is the post format) and that will be used instead.
                                             */
                                            get_template_part( 'content', get_post_format() );
                                        endwhile;
                                        
                                    else :
                                        // If no content, include the "No posts found" template.
                                       	get_template_part( 'template-parts/content', 'none' );
                                    endif;
                                    ?>
                                    
                            
                            </div><!-- .archive-entry -->
                        </div><!-- .main -->
						 <?php
					} else {
						?>
						 <div id="main" class="site-main">
                            <div class="archive-entry">
                                <style>
                                .inner-page-wrap .editor-entry {
                                    border: 0px solid #eef1fd;
                                }
                                </style>
                               <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                	<?php
                                
                                	if( orchid_store_get_option( 'display_page_header' ) == false ) {
                                		?>
                                		<h1 class="entry-title page-title"><?php the_title(); ?></h1>
                                		<?php
                                	} 
                                
                                	if( $orchid_store_display_featured_image == true && has_post_thumbnail() && ! post_password_required() ) {
                                		?>
                                		<div class="thumb featured-thumb">
                                	       	<?php
                                	       	the_post_thumbnail( 'full', array(
                                				'alt' => the_title_attribute( array(
                                					'echo' => false,
                                				) ),
                                			) );
                                	       	?>
                                	    </div><!-- .thumb.featured-thumb -->
                                	    <?php
                                	}
                                	?>
                                    <div class="<?php orchid_store_content_entry_class(); ?>">
                                        <?php
                                		the_content();
                                
                                		wp_link_pages( array(
                                			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'orchid-store' ),
                                			'after'  => '</div>',
                                		) );
                                		?>            
                                    </div><!-- .editor-entry -->
                                	<?php
                                    if ( get_edit_post_link() ) :
                                	    edit_post_link(
                                			sprintf(
                                				wp_kses(
                                					/* translators: %s: Name of current post. Only visible to screen readers */
                                					__( 'Edit <span class="screen-reader-text">%s</span>', 'orchid-store' ),
                                					array(
                                						'span' => array(
                                							'class' => array(),
                                						),
                                					)
                                				),
                                				get_the_title()
                                			),
                                			'<span class="edit-link">',
                                			'</span>'
                                		);
                                	endif;
                                	?>
                                </article>
                            
                            </div><!-- .archive-entry -->
                        </div><!-- .main -->
                    </div><!-- .primary -->
                </div><!-- .col -->
					<?php
			}
		?>
                <?php get_sidebar(); ?>
            </div><!-- .row -->
        </div><!-- .__os-container__ -->
    </div><!-- .inner-entry -->
</div><!-- .inner-page-wrap -->
<?php
get_footer();
