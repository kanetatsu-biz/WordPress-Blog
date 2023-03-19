<section class="front-page-section">
    <h1><?php echo $args['title']; ?></h1>

    <div class="section-items-wrapper">
        <?php
            $the_query = new WP_Query($args['query']);
        ?>
        <?php if ($the_query->have_posts()): ?>
            <div class="section-items">
                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                    <!-- １つ１つの投稿 -->
                    <div class="section-item">
                        <a href="<?php the_permalink()?>">
                            <!-- サムネイル画像があれば表示 -->
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php else: ?>
                                <!-- 空画像（親テーマから）の差し込み -->
                                <figure>
                                    <img class="flex-box" src="<?php echo esc_url(get_theme_file_uri('../cocoon-master/images/no-image-120.png')); ?>">
                                </figure>
                            <?php endif; ?>
                            <?php the_title(); ?>
                        </a>
                        <!-- リード文 -->
                        <p><?php the_excerpt(); ?></p>
                    </div>
                <?php endwhile; ?>
                <!-- クエリで取得した内容をリセット -->
                <?php wp_reset_postdata(); ?>
            </div>
            <!-- ボタン押下後一覧画面に遷移 -->
            <button onclick="location.href='<?php echo home_url($args['more_path']);?>'" class="more-btn">もっと見る</button>
        <?php else: ?>
            <p><?php echo $args['nothing_msg']; ?></p>
        <?php endif; ?>
    </div>
</section>