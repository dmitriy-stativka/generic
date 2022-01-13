<section class="section_hero" style="background: url(<?php the_sub_field('backgroundImage')['url'];?>) no-repeat center center;background-size: cover;">
    <div class="inner-frame">
        <div class="section_hero-content">
            <span class="section_hero-pretitle"><?php the_sub_field('pretitle');?></span>
            <h1 class="section_hero-title"><?php the_sub_field('title');?></h1>
        </div>
    </div>
</section>

<div class="inner-frame section_product">
    <div class="section_hero-products">
        <span class="section_hero-products--pretitle"><?php the_sub_field('product_pretitle');?></span>
        <h2 class="section_hero-products--title"><?php the_sub_field('product_title');?></h2>
        <?php
            if (have_rows('product_list')) : ?>
                <div class="section_hero-products--list">
                    <?php while (have_rows('product_list')) : the_row(); ?>
                        <div class="section_hero-products--item">
                            <a href="<?php the_sub_field('link_of_product');?>" class="section_hero-products--link">
                                <div class="section_hero-products--image">
                                    <div class="section_hero-products--hex">
                                        <div class="section_hero-products--hex-background">
                                            <img class="lazy" src="<?php the_sub_field('image_of_product')['url'];?>" alt="<?php the_sub_field('image_of_product')['alt'];?>">
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="section_hero-products--info">
                                    <h3 class="section_hero-products--title-product"><?php the_sub_field('title_of_product');?></h3>
                                    <button class="btn"><span><?php the_sub_field('button_text_of_product');?></span></button>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; 
        ?>
    </div>
</div>