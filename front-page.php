<?php
    get_header();
?>

<?php
    // 最新のニュースを３件表示
    $news_args = [
        'title' => 'NEWS',
        'nothing_msg' => 'NEWSはありません。',
        'query' => [
            'posts_per_page' => 3,
            'category_name' => 'news',
            'orderby' => 'date',
            'order' => 'desc'
        ],
        'more_path' =>  'category/news',
    ];
    get_template_part('components/front-section', null, $news_args);
?>

<?php
    // 最新の投稿を３件表示
    $post_args = [
        'title' => '最新の投稿',
        'nothing_msg' => '投稿はありません。',
        'query' => [
            'posts_per_page' => 3,
            // ニュース(カテゴリーID:6)以外
            'category__not_in' => [6],
            'orderby' => 'date',
            'order' => 'desc'
        ],
        // ＊＊ひとまず
        'more_path' =>  'category/category-list',
    ];
    get_template_part('components/front-section', null, $post_args);
?>

<?php
    get_footer();
?>