<div class="hamburger">
    <div></div>
    <div></div>
    <div></div>
</div>
<div class="sidebar">
    <div class="close-btn">
        <i class="fas fa-times"></i>
    </div>
    <div class="sidebar-content">
        <div class="sidebar-blog">
            <h1>Blog Post</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <ul class="sidebar-blog-list">
                <?php
                $query = new WP_Query([
                    'post_type' => 'blog',
                    'posts_per_page' => 5
                ]);

                if($query->have_posts()) :
                    while($query->have_posts()) : $query->the_post() ?>
                        <li><?php the_title() ?></li>
                <?php endwhile;
                endif;
                wp_reset_postdata() ?>
            </ul>
        </div>
        <div class="dynamic-sidebar-container">
            <?php dynamic_sidebar('primary-sidebar') ?>
        </div>
    </div>
</div>