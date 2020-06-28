<?php get_header() ?>
<section class="search-section">
    <div class="container">
        <div class="section-title">
            <h1>You have searched: <?php echo get_search_query() ?></h1>
        </div>
        <div class="section-content">
            <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post() ?>
                    <div class="card-blog">
                        <?php if(has_post_thumbnail()) : ?>
                            <div class="card-img">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Card Image">
                            </div>
                        <?php endif; ?>
                        <div class="card-content">
                            <div class="card-title">
                                <p><?php echo the_time('d M Y') ?></p>
                                <h2>
                                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                </h2>
                            </div>
                            <div class="card-body">
                                <p><?php the_excerpt() ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_postdata() ?>
        </div>
    </div>
</section>
<?php get_footer() ?>