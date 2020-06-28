<form action="<?php echo get_home_url('/') ?>">
    <input
        type="text"
        class="search-form"
        name="s"
        placeholder="Search recepie..."
        value="<?php echo get_search_query() ?>"
    >
</form>