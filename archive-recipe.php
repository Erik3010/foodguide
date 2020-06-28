<?php get_header() ?>
<section class="reciepe archive">
    <div class="container">
        <div class="section-title">
            <p>Recepies</p>
            <h1>Explore our recepies</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero voluptas consequatu!</p>
        </div>
        <div class="section-content">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $query = new WP_Query([
                    'post_type' => 'recipe',
                    // 'posts_per_page' => 7,
                    'meta_key' => 'recipe_like',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'paged' => $paged
                ]);

                if($query->have_posts()) :
                    while($query->have_posts()) : $query->the_post() ?>
                        <div class="card-receipe">
                            <a href="<?php echo the_permalink() ?>">
                                <img src="<?php echo get_the_post_thumbnail_url()?>" alt="Card Image">
                            </a>
                            <div class="card-body">
                                <div class="card-group">
                                    <p><?php the_time('d M Y') ?></p>
                                    <div class="card-like"><span><?php echo get_field('recipe_like') ?></span> Like</div>
                                </div>
                                <h3><?php the_title() ?></h3>
                            </div>
                            <div class="card-click" onclick="like(this, <?php echo get_the_ID() ?>)">
                                <i class="fas fa-heart"></i>
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