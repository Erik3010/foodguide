<?php get_header() ?>
<div class="single-post">
    <div class="container">
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post() ?>
                <div class="section-title">
                    <h1><?php the_title() ?></h1>
                    <div class="section-single-group">
                        <p>Posted at: <span><?php the_time('d M Y') ?></span> by <span><?php the_author() ?></span></p>
                        <?php if(get_post_type() === 'recipe') : ?>
                            <div class="like-single" onclick="likeSinglePost(this, <?php echo get_the_ID() ?>)">
                                <i class="fas fa-heart"></i>
                                <span><?php echo get_field('recipe_like') ?></span> Likes
                            </div>
                        <?php elseif(get_post_type() === 'blog') : ?>
                            <p><i class="fas fa-eye"></i> <?php echo get_blog_post_view(get_the_ID()); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Post Image">
                <?php endif; ?>
                <div class="section-content">
                    <p><?php the_content() ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<div class="single-post comment-section">
    <div class="container">
        <div class="comment-title">
            <h2>Comments</h2>
        </div>
        <?php comments_template() ?>
    </div>
</div>

<?php get_footer(); ?>