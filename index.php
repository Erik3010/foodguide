<?php get_header(); ?>

<div class="banner" style="background-image: url('<?php echo get_template_directory_uri() ?>/asset/food/others/food (2).jpg')">
    <div class="overlay">
        <h1>We serve you any <span>food</span> recepie.</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae atque non, blanditiis velit reiciendis quos!</p>
        <button class="btn">Try Now</button>
    </div>
</div>

<main>
    <section class="reciepe">
        <div class="container">
            <div class="section-title">
                <p>Recepies</p>
                <h1>Explore our recepies</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero voluptas consequatu!</p>
            </div>
            <div class="section-content">
                <?php
                    $query = new WP_Query([
                        'post_type' => 'recipe',
                        'posts_per_page' => 4,
                        'meta_key' => 'recipe_like',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC'
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
        </div>
    </section>

    <section class="gallery">
        <div class="container">
            <div class="section-title">
                <p>Gallery</p>
                <h1>See our Collection</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ratione beatae error.</p>
            </div>
            <div class="section-content">
                <div class="gallery-container">
                    <div class="photo" style="background-image: url('<?php echo get_template_directory_uri() ?>/asset/food/others/Food (3).jpg')">
                        <div class="overlay">
                            <div class="badge-gallery">+10 more photo</div>
                            <h1>Photo Album</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid, quod? Labore accusamus minus consequatur beatae molestias ipsum voluptas quibusdam nobis veritatis repudiandae doloribus laudantium commodi, debitis id, magnam libero voluptatum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="section-title">
                <p>Blog Post</p>
                <h1>Find a News About Food</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, inventore!</p>
            </div>
            <div class="section-content">
                <?php
                    $query = new WP_Query([
                        'post_type' => 'blog',
                        'posts_per_page' => 4,
                        'meta_key' => 'foodguide_blog_view',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC'
                    ]);
                ?>
                <?php if($query->have_posts()) : ?>
                    <?php while($query->have_posts()) : $query->the_post() ?>
                        <div class="card-blog">
                            <div class="card-view">
                                <i class="fas fa-eye"></i>
                                <?php echo get_blog_post_view(get_the_ID()); ?>
                            </div>
                            <?php if(has_post_thumbnail()) : ?>
                                <div class="card-img">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Card Image">
                                </div>
                            <?php endif; ?>
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
        </div>
    </section>
</main>

<?php get_footer(); ?>