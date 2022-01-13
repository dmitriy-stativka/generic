<section class="section_accordion">
    <h2 class="section_accordion--title"><?php the_sub_field('title_of_block');?></h2>
    <?php $i = 1;
        if (have_rows('accordion_list')) : ?>
            <ul class="section_accordion--list tabs">
                <?php while (have_rows('accordion_list')) : the_row(); ?>
                    <li class="section_accordion--item tab">
                        <input type="checkbox" id="chck<?php echo $i;?>">
                        <label class="section_accordion--item-label" for="chck<?php echo $i;?>"><?php the_sub_field('accordion_title');?></label>
                        <div class="section_accordion--item-content">
                            <?php the_sub_field('accordion_description');?>
                        </div>
                    </li>
                <?php $i++; endwhile; ?>
            </ul>
        <?php endif; 
    ?>
</section>