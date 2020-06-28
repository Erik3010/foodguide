<?php get_header() ?>
<section class="blog">
    <div class="container">
        <div class="section-title">
            <p>Blog Post</p>
            <h1>Find a News About Food</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, inventore!</p>
        </div>
        <div class="section-content">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $query = new WP_Query([
                    'post_type' => 'ingredient',
                    // 'showposts' => 7,
                    // 'posts_per_page' => 7,
                    'paged' => $paged
                ]);
            ?>
            <?php if($query->have_posts()) : ?>
                <?php while($query->have_posts()) : $query->the_post() ?>
                    <div class="card-blog">
                        <div class="card-content">
                            <div class="card-title">
                                <p><?php the_time('d M Y') ?></p>
                                <h2><a href="<?php echo the_permalink() ?>"><?php the_title() ?></a></h2>
                            </div>
                             <div class="card-body">
                                <p><?php the_excerpt() ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php endif; wp_reset_postdata() ?>
        </div>
        <div class="pagination">
            <?php previous_posts_link('Previous Post') ?>
            <?php next_posts_link('Next Posts') ?>
        </div>
    </div>
</section>
<?php get_footer() ?>