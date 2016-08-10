<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-meta">
        <time datetime="<?php printf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ); ?>"><?php echo get_the_date( get_option('date_format'), $post->ID); ?></time>
        <?php printf(
            // Translators: 1 is the post author, 2 is the category list.
            __( '<span class="post-meta-separator">&middot</span>by %1$s<span class="post-meta-separator">&middot</span>%2$s', 'pixova-lite' ),
            get_the_author(),
            // Translators: Category list separator.
            get_the_category_list( __( ', ', 'pixova-lite' ), '', false )
        ); ?>
        <?php //echo '&middot;'; ?>
        <?php //the_tags( __('Tags:', 'pixova-lite') , ', ', '<br />' ); ?>
    </div><!--/.entry-meta-->

    <?php if( has_post_thumbnail() ) { ?>
        <aside class="entry-featured-image">
            <?php echo get_the_post_thumbnail($post->ID, 'pixova-lite-featured-blog-image'); ?>
        </aside><!--/.entry-featured-image-->
    <?php } ?>

    <div class="entry-content">
        <?php
            echo apply_filters('the_content', substr(get_the_content(), 0, 200) );

            wp_link_pages( array(
                'before' => '<nav class="page-links">' . __( 'Pages:', 'pixova-lite' ),
                'after'  => '</nav>',
            ) );

        ?>
    </div><!-- .entry-content -->

    <div class="clearfix"></div><!--/.clearfix-->
</article><!-- #post-## -->
