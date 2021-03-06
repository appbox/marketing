<?php
/**
 * Copyright (c) 2014-2018, yunsheji.cc
 * All right reserved.
 *
 * @since 1.1.0
 * @package Marketing
 * @author 云设计
 * @date 2018/02/14 10:00
 * @link https://yunsheji.cc
 */
?>
<?php tt_get_header(); ?>
<?php $paged = get_query_var('paged') ? : 1; ?>
    <div id="content" class="wrapper">
        <?php $vm = DateArchivePostsVM::getInstance($paged); ?>
        <?php if($vm->isCache && $vm->cacheTime) { ?>
            <!-- Date archive posts cached <?php echo $vm->cacheTime; ?> -->
        <?php } ?>
        <?php if($data = $vm->modelData) { $pagination_args = $data->pagination; $period = $data->period; $date_posts = $data->date_posts; ?>
      <?php if (tt_get_option('tt_enable_k_fbsbt', true)) { ?>
            <!-- 日期归档信息 -->
            <section class="billboard date-archive-header">
                <div class="catga-section-info text-center">
                    <h2 class="postmodettitle"><?php echo $period['str']; ?></h2>
                        <div class="postmode-description"><p><?php echo $period['des']; ?></p></div>
                </div>
            </section>
      <?php } ?>
            <!-- 归档文章 -->
        <div id="postcard-main" class="main primary" role="main">
            <section class="container archive-posts category-posts">
                <div class="row loop-rows posts-loop-grid mt20 mb20 clearfix">

                    <?php foreach ($date_posts as $date_post) { ?>
                        <div class="col-md-3 col-sm-4 col-xs-6">

                            <article id="<?php echo 'post-' . $date_post['ID']; ?>" class="post type-post status-publish wow bounceInUp">
                                <div class="entry-thumb hover-scale">
                                    <a href="<?php echo $date_post['permalink']; ?>">
                                        <img width="250" height="170" src="<?php echo LAZY_PENDING_IMAGE; ?>" data-original="<?php echo $date_post['thumb']; ?>" class="thumb-medium wp-post-image lazy" alt="" style="display: block;" />
                                    </a>
                                    <?php echo $date_post['category']; ?>
                                </div>
                                <div class="entry-detail">
                                    <header class="entry-header">
                                        <h2 class="entry-title h4">
                                            <a href="<?php echo $date_post['permalink']; ?>" rel="bookmark" target="_blank" title="<?php echo $date_post['title']; ?>"><?php echo $date_post['title']; ?></a>
                                        </h2>
                                        <div class="entry-meta entry-meta-1">
                                            <span class="entry-date text-muted"><i class="tico tico-alarm"></i><time class="entry-date" datetime="<?php echo $date_post['time']; ?>"><?php echo $date_post['time']; ?></time></span>
                                            <span class="comments-link text-muted pull-right"><i class="tico tico-comments-o"></i><a href="<?php echo $date_post['permalink'] . '#respond'; ?>" target="_blank"><?php echo $date_post['comment_count']; ?></a></span>
                                            <span class="views-count text-muted pull-right mr10"><i class="tico tico-eye"></i><?php echo $date_post['views']; ?></span>
                                        </div>
                                    </header>
                                </div>
                            </article>

                        </div>
                    <?php } ?>


                </div>

                <?php if($pagination_args['max_num_pages'] > 1) { ?>
                    <?php tt_pagination(str_replace('999999999', '%#%', get_pagenum_link(999999999)), $pagination_args['current_page'], $pagination_args['max_num_pages']); ?>
                <?php } ?>
            </section>
        </div>
        <?php } ?>
    </div>
<?php tt_get_footer(); ?>