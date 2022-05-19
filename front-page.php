<?php
get_header();
?>

<section class="first_screen" style="background-image: url(<?php echo get_template_directory_uri();?>/img/bg.png)">
    <div class="container">
        <div class="d_flex">
            <div class="text_block">
                <h1><?php the_field('zagolovok'); ?></h1>
                <div class="sub_title"><?php the_field('tekst'); ?></div>
            </div><img class="girl" src="<?php echo get_template_directory_uri();?>/img/girl.png"/>
            <div class="form_block">
                <div class="form_block_title">Заполните форму, и мы свяжемся с Вами в ближайшее время</div>
                <?php echo do_shortcode('[contact-form-7 id="146" title="Контактная форма 1"]');?>
            </div>
        </div>
    </div>
</section>
<section class="m_form_block">
    <div class="container">
        <div class="form_block">
            <div class="form_block_title">Заполните форму, и мы свяжемся с Вами в ближайшее время</div>
            <?php echo do_shortcode('[contact-form-7 id="146" title="Контактная форма 1"]');?>
        </div>
    </div>
</section>
<section class="section_tabs bg_grey" id="specialty">
    <div class="container">
        <div class="section_title"><?php the_field('speczialnosti_-_zagolovok');?></div>
        <div class="tabs_block">

            <?php if( have_rows('tab') ): ?>
                <div class="tabs_nav">
                    <?php
                    $i=0;
                    while( have_rows('tab') ): the_row();
                        ?>
                        <div class="tab_item <?php echo ($i===0)?'active':'';?>">
                           <?php the_sub_field('nazvanie_taba'); ?>
                        </div>
                    <?php
                    $i++;
                    endwhile; ?>
                </div>
            <?php endif; ?>


            <div class="tabs_content_list">
                <?php if( have_rows('tab') ): ?>
                    <?php
                    $i=0;
                    while( have_rows('tab') ): the_row();
                        $obrazovanie = get_sub_field('obrazovanie');
                        ?>
                        <div class="tabs_content_item <?php echo ($i===0)?'active':'';?>">
                            <div class="m_tab_item"><?php the_sub_field('nazvanie_taba'); ?></div>
                            <div class="tabs_content_body">
                                <?php if( have_rows('gruppa') ): ?>
                                    <?php
                                    $i=0;
                                    while( have_rows('gruppa') ): the_row();
                                        ?>
                                        <div class="specialty_group">
                                        <?php if($i===0): ?>
                                            <div class="g_title">
                                                <?php echo $obrazovanie; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="specialty_title">
                                            <?php the_sub_field('nazvanie_gruppy'); ?>
                                        </div>
                                        <?php if( have_rows('spisok') ): ?>
                                            <ul>
                                                <?php while( have_rows('spisok') ): the_row(); ?>
                                                    <li> <?php the_sub_field('element_spiska'); ?></li>
                                                <?php endwhile; ?>
                                            </ul>
                                            </div>
                                        <?php endif; ?>
                                    <?php
                                    $i++;
                                    endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                        $i++;
                    endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="section_price" id="prices">
    <div class="container">
        <div class="section_title"><?php the_field('stoimost_-_zagolovok'); ?></div>
        <div class="sub_title"><?php the_field('stoimost_-_podzagolovok'); ?></div>
        <?php if( have_rows('slajder') ): ?>
            <div class="products_list">
                <?php while( have_rows('slajder') ): the_row(); ?>
                    <div class="item">
                        <div class="product_item">
                            <picture><img src="<?php the_sub_field('kartinka'); ?>"/></picture>
                            <div class="product_title"><?php the_sub_field('nazvanie'); ?></div>
                            <div class="product_price"><span class="s_title">Стоимость:</span>
                                <div class="price_row">
                                    <?php if(get_sub_field('czena_so_skidkoj')): ?>
                                        <div class="current_price"><?php the_sub_field('czena_so_skidkoj'); ?></div>
                                    <?php endif; ?>
                                    <div class="old_price <?php echo (!get_sub_field('czena_so_skidkoj'))?'black':'';?>"><?php the_sub_field('osnovnaya_czena'); ?></div>
                                </div>
                            </div>
                            <div class="product_equivalent"><span class="s_title">Эквивалент:</span>
                                <p><?php the_sub_field('ekvivalent'); ?></p>
                            </div><a class="btn_default" href="<?php the_sub_field('ssylka'); ?>">Перейти на сайт</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="suggestions" id="stock">
    <div class="container">
        <div class="d_flex">
            <div class="left_col"><img src="<?php echo get_template_directory_uri();?>/img/icon_st.svg"/>
                <div class="title"><?php the_field('levyj_blok_-_zagolovok'); ?></div>
                <?php if( have_rows('levyj_blok_-_spisok') ): ?>
                    <ul>
                        <?php while( have_rows('levyj_blok_-_spisok') ): the_row(); ?>
                            <li>
                                <span>
                                     <?php the_sub_field('element_spiska'); ?>
                                </span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="right_col">
                <img class="union" src="<?php echo get_template_directory_uri();?>/img/img.png"/>
                <img src="<?php echo get_template_directory_uri();?>/img/sale.svg"/>
                <div class="title"><?php the_field('pravyj_blok_-_zagolovok'); ?></div>
                <?php if( have_rows('pravyj_blok_-_spisok') ): ?>
                    <div class="suggestions_row">
                            <?php while( have_rows('pravyj_blok_-_spisok') ): the_row(); ?>
                                <div class="item">
                                    <div class="item_title"><?php the_sub_field('zhirnyj_tekst'); ?></div>
                                    <div class="item_desc"><?php the_sub_field('obychnyj_tekst'); ?></div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="terms bg_grey" id="terms_of_study">
    <div class="container">
        <div class="section_title"><?php the_field('sroki_obucheniya_-_zagolovok');?></div>
        <div class="sub_title"><?php the_field('sroki_obucheniya_-_podzagolovok');?></div>
        <?php $table1 = get_field( 'tablicza_1' ); ?>
        <?php
        if ( ! empty ( $table1 ) ) {
            echo '<div class="scroll_block">';
            echo '<table>';
            if ( ! empty( $table1['caption'] ) ) {
                echo '<caption>' . $table1['caption'] . '</caption>';
            }
            if ( ! empty( $table1['header'] ) ) {
                echo '<thead>';
                echo '<tr>';
                $i=0;
                foreach ( $table1['header'] as $th ) {
                    if($i===0){
                        echo '<td colspan="7">';
                        echo $th['c'];
                        echo '</td>';
                    }
                    $i++;
                }
                echo '</tr>';
                echo '</thead>';
            }
            echo '<tbody>';
            foreach ( $table1['body'] as $tr ) {
                echo '<tr>';
                foreach ( $tr as $index => $td ) {
                    echo '<td>';
                    echo $td['c'];
                    echo '</td>';
                }
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>

        <?php $table2 = get_field( 'tablicza_2' ); ?>
        <?php
        if ( ! empty ( $table2 ) ) {
            echo '<div class="scroll_block">';
            echo '<table>';
            if ( ! empty( $table2['caption'] ) ) {
                echo '<caption>' . $table2['caption'] . '</caption>';
            }
            if ( ! empty( $table2['header'] ) ) {
                echo '<thead>';
                echo '<tr>';
                $i=0;
                foreach ( $table2['header'] as $th ) {
                    if($i===0){
                        echo '<td colspan="7">';
                        echo $th['c'];
                        echo '</td>';
                    }
                    $i++;
                }
                echo '</tr>';
                echo '</thead>';
            }
            echo '<tbody>';
            foreach ( $table2['body'] as $tr ) {
                echo '<tr>';
                foreach ( $tr as $index => $td ) {
                    echo '<td>';
                    echo $td['c'];
                    echo '</td>';
                }
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </div>
</section>
<section class="adv" id="advantages">
    <div class="container">
        <div class="section_title"><?php the_field('preimushhestva_-_zagolovok');?></div>
        <div class="adv_row">
            <div class="left_col">
                <div class="title"><?php the_field('levaya_kolonka_-_zagolovok');?></div>
                <?php if( have_rows('levaya_kolonka_-_spisok') ): ?>
                    <ul class="adv_ilst">
                        <?php while( have_rows('levaya_kolonka_-_spisok') ): the_row();
                            ?>
                            <li>
                               <?php the_sub_field('element_spiska'); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div><img class="adv_img" src="<?php echo get_template_directory_uri();?>/img/adv_img.svg"/><img class="adv_img_mobile" src="<?php echo get_template_directory_uri();?>/img/adv_img_mobile.svg"/>
            <div class="right_col">
                <div class="title"><?php the_field('pravaya_kolonka_-_zagolovok');?></div>
                <?php if( have_rows('pravaya_kolonka_-_spisok') ): ?>
                    <ul class="adv_ilst">
                        <?php while( have_rows('pravaya_kolonka_-_spisok') ): the_row();
                            ?>
                            <li>
                                <?php the_sub_field('element_spiska'); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <button class="show_all">Показать все</button>
    </div>
</section>
<section class="about" id="about_company">
    <div class="container">
        <div class="d_flex">
            <div class="left_col">
                <div class="section_title m_title"><?php the_field('o_kompanii_-_zagolovok');?></div>
                <picture><img class="about_logo" src="<?php the_field('o_kompanii_-_logo');?>"/><img class="about_img" src="<?php the_field('o_kompanii_-_kartinka');?>"/></picture>
            </div>
            <div class="right_col">
                <div class="section_title"><?php the_field('o_kompanii_-_zagolovok');?></div>
                <div class="about_sub_title"><?php the_field('o_kompanii_-_podzagolovok');?></div>

                <?php if( have_rows('spisok_logotipov') ): ?>
                    <div class="partners_list">
                        <?php while( have_rows('spisok_logotipov') ): the_row();
                            ?>
                            <div class="item">
                                <picture><img src="<?php echo get_sub_field('kartinka');?> "/></picture>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <div class="about_txt"><?php the_field('o_kompanii_-_tekst');?></div>
            </div>
        </div>
        <div class="steps">
            <div class="title"><?php the_field('shema_raboty_-_zagolovok');?></div>
            <?php if( have_rows('shema_raboty') ): ?>
                <div class="steps_list">
                    <?php while( have_rows('shema_raboty') ): the_row();
                        ?>
                        <div class="item">
                            <div class="txt"><?php echo get_sub_field('element_spiska');?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="need_serv">
    <div class="container">
        <div class="section_title"><?php the_field('need_zagolovok'); ?></div>
        <?php if( have_rows('need_spisok') ): ?>
            <div class="need_serv">
                <?php
                $i=0;
                while( have_rows('need_spisok') ): the_row();
                    ?>
                    <div class="item">
                        <div class="item_content">
                            <div class="counter"><?php echo $i+1;?></div>
                            <div class="desc"><?php the_sub_field('element_spiska'); ?></div>
                        </div>
                    </div>
                <?php
                $i++;
                endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="question_form bg_grey" id="question_form">
    <div class="container">
        <div class="d_flex">
            <div class="left_col">
                <div class="title">Есть вопросы? Задавайте!</div>
                <p>Хотите получить <span class="text_uppercase">бесплатную консультацию</span> и совет специалиста?</p>
                <p>Заполните форму, и мы свяжемся с Вами в ближайшее время</p>
                <div class="text_right"><img src="<?php echo get_template_directory_uri();?>/img/union6.png"/></div>
            </div>
            <div class="right_col">
                <div class="title">Заполните форму, и мы свяжемся с Вами в ближайшее время</div>
                <?php echo do_shortcode('[contact-form-7 id="5" title="Контактная форма 2"]');?>
            </div>
        </div>
    </div>
</section>
<section class="contacts" id="contacts">
    <div class="container">
        <div class="d_flex">
            <div class="left_col">
                <div class="section_title">Контакты</div>
                <ul class="c_list">
                    <li><a href="tel:<?php the_field('telefon_1'); ?>"><?php the_field('telefon_1'); ?></a></li>
                    <li><a href="tel:<?php the_field('telefon_2'); ?>"><?php the_field('telefon_2'); ?></a></li>
                    <li><a href="tel:<?php the_field('telefon_3'); ?>">0<?php the_field('telefon_3'); ?></a></li>
                    <li class="loc"><?php the_field('adres'); ?></li>
                    <li><a class="email2" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></li>
                    <li><a class="work" href="#">Время работы</a></li>
                </ul>
            </div>
            <div class="right_col">
                <div class="map"><img src="<?php echo get_template_directory_uri();?>/img/image87.png"/></div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
