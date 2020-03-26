
<li>
    <dl>
        <dd>
            <?php
            if ( ootpl_is_new_post( get_the_time( 'Y-m-d' ) ) ) {
                echo '<span class="span_blue">NEW</span>';
            }
            ?>
            
            <?php
            $ID  = get_the_ID();
            $tax = 'category';
            $arr = ootpl_taxonomy_parents_cat_list( $parent=0, $tax, $ID );
            if ( $arr && count( $arr ) > 0 ) {
                $html = array();
                foreach ( $arr as $row ) {
                    $name    = isset( $row->name )    ? esc_html( $row->name ) : '';
                    $term_id = isset( $row->term_id ) ? (int) $row->term_id : '';
                    $slug    = isset( $row->slug )    ? esc_html( $row->slug ) : '';
                    $count   = isset( $row->count )   ? (int) $row->count : 0;

                    $html[] = '<span>' . $name . '</span>';
                }
                if ( count( $html ) > 0 ) {
                    echo implode( "", $html );
                }
            }
            ?>
            
        </dd>
        <dd><?php echo get_the_time( get_option( 'date_format' ) ); ?></dd>
        <dt>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </dt>
    </dl>
</li>