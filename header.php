<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('title') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/asset/fontawesome/css/all.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri() ?>/asset/logo/logo.png">
            </div>
            <ul>
                <li><a href="<?php echo get_home_url() ?>">Home</a></li>
                <li><a href="<?php echo get_home_url() ?>/recipe">Receipe List</a></li>
                <li><a href="<?php echo get_home_url() ?>/blog">Blog Post</a></li>
                <li><a href="<?php echo get_home_url() ?>/ingredient">Ingredients</a></li>
                <li>
                    <?php get_search_form() ?>
                </li>
                <li>
                    <select>
                        <option value="english">EN</option>
                        <option value="indonesia">IN</option>
                    </select>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar-wrapper">
        <?php get_sidebar() ?>
    </div>

    <?php wp_head() ?>
