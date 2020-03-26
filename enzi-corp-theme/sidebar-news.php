<aside>

    <section class="catalog">

        
        <!-- アーカイブ START -->
        <article>
            <h2>アーカイブ</h2>

            <select class="article_archive" name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
                <option value=""><?php echo esc_attr(__( 'Select Month' )); ?></option>
                <?php wp_get_archives('format=option'); ?>
            </select>

        </article>
        <!-- アーカイブ END -->

        <!-- カテゴリ START -->
        <article>
            <h2>カテゴリ</h2>

            <?php
            $ID  = '';
            $tax = 'category';
            $arr = ootpl_taxonomy_parents_cat_list( $parent=0, $tax, $ID );
            if ( $arr && count( $arr ) > 0 ) {
                $html = array();
                foreach ( $arr as $row ) {
                    $name    = isset( $row->name )    ? esc_html( $row->name ) : '';
                    $term_id = isset( $row->term_id ) ? (int) $row->term_id : '';
                    $slug    = isset( $row->slug )    ? esc_html( $row->slug ) : '';
                    $count   = isset( $row->count )   ? (int) $row->count : 0;

                    $html[] = '<li><a href="' . get_term_link( $term_id, $tax ) . '"><span>' . $name . '</span></a></li>';
                }
                if ( count( $html ) > 0 ) {
            ?>

            <ul class="article_cgy">
                <?php echo implode( "\n", $html ); ?>
            </ul>

            <?php
                }
            }
            ?>

        </article>
        <!-- カテゴリ END -->


    </section>

</aside>
