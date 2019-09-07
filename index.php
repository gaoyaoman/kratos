<?php get_header(); ?>
    <div id="container" class="container">
<!-- 实现看板娘的灵活切换-->
        <style><?php
            $style=kratos_option('wifuside');
            $position=substr($style,0,strripos($style,':'));
            $value=substr($style,strripos($style,':')+1);
            echo '.waifu {'.$position.':'.$value.'px;}';
        ?></style>
        <div class="row">
            <?php if(kratos_option('home_side_bar')=='left_side'){ ?>
                <aside class="col-md-4 hidden-xs hidden-sm scrollspy">
                    <div id="sidebar" class="affix-top">
                        <?php dynamic_sidebar('sidebar_tool'); ?>
                    </div>
                </aside>
            <?php } ?>
            <section id="main" class="<?php echo (kratos_option('home_side_bar')=='center')?'col-md-12':'col-md-8'; ?>">
            <?php
                if(is_home()){kratos_banner();}
                elseif(is_category()){
            if(kratos_option('show_head_cat')){ ?>
                <div class="kratos-hentry clearfix">
                    <h1 class="kratos-post-header-title"><?php _e('分类：','moedog');echo single_cat_title('',false); ?></h1>
                    <h1 class="kratos-post-header-title"><?php echo category_description(); ?></h1>
                </div>    
            <?php }
                }elseif(is_tag()){
            if(kratos_option('show_head_tag')){ ?>
                <div class="kratos-hentry clearfix">
                    <h1 class="kratos-post-header-title"><?php _e('标签：','moedog');echo single_cat_title('',false); ?></h1>
                    <h1 class="kratos-post-header-title"><?php echo category_description(); ?></h1>
                </div>
            <?php }
                }elseif(is_search()){ ?>
                <div class="kratos-hentry clearfix">
                    <h1 class="kratos-post-header-title"><?php _e('搜索结果：','moedog');the_search_query(); ?></h1>
                </div>                
            <?php }
                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        get_template_part('/inc/content-templates/content',get_post_format());
                    }
                }else{ ?>
            <div class="kratos-hentry clearfix">
                    <h1 class="kratos-post-header-title"><?php _e('很抱歉，没有找到任何内容。','moedog'); ?></h1>
            </div>
            <?php }
                kratos_pages(3);wp_reset_query(); ?>
            </section>
            <?php if(kratos_option('home_side_bar')=='right_side'){ ?>
            <aside class="col-md-4 hidden-xs hidden-sm scrollspy">
<!--                id="kratos-widget-area"-->
                <div id="sidebar" class="affix-top">
                    <?php dynamic_sidebar('sidebar_tool'); ?>
                </div>
            </aside>
            <?php } ?>
        </div>
        <script src="<?php echo  bloginfo('template_url').'/static/js/weixinAudio.js';?>"></script>
        <!--音乐播放器-->
        <script type="text/javascript">
            $('.weixinAudio').weixinAudio({
            });
        </script>
    </div>
</div>

<?php get_footer(); ?>