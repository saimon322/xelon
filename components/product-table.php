<div class="product-table-start">
	<div class="container">
		<div class="all-prodcut-tables d-flex">
			<table class="table-margin">
				<tbody>
				<tr class="empty-tr"></tr>
				<?php if( have_rows('table_names') ): ?>
				<?php while( have_rows('table_names') ): the_row();
						$row_names = get_sub_field('row_names');
				?>
				<tr height="60">
					<td class="simple-row"><?php echo $row_names; ?></td>
				</tr>
				<?php endwhile; ?>
				<?php endif; ?>
			</tbody>
		</table>
		<div class="table-scroll-wrap">
          <table class="green-table green-c table-margin">
            <tbody>
            <?php
            $col_name_1 = get_field('col_name_1');
            $col_name_2 = get_field('col_name_2');
            ?>
            <tr>
              <th><?php echo $col_name_1; ?></th>
              <th><?php echo $col_name_2; ?></th>
            </tr>
            <?php if( have_rows('virtual_table') ): ?>
              <?php while( have_rows('virtual_table') ): the_row();
                $v_table_item_1 = get_sub_field('v_table_item_1');
                $v_table_item_2 = get_sub_field('v_table_item_2');
                $label_1 = get_sub_field('label_1');
                $label_2 = get_sub_field('label_2');
                ?>
                <tr class="g-t-row">
                  <td>
                    <?php if($label_1) {?>
                      <span class="check-label check-green"></span>
                    <?php } else {
                      echo $v_table_item_1;
                    }?>
                  </td>
                  <td>
                    <?php if($label_2) {?>
                      <span class="check-label check-green"></span>
                    <?php } else {
                      echo $v_table_item_2;
                    }?>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php endif; ?>
            <tr class="g-t-row">
              <?php
              $virtual_datacenter_link = get_field('virtual_datacenter_link');
              $cloud_server_link = get_field('cloud_server_link');

              ?>
              <td>
                <a href="<?php echo $virtual_datacenter_link; ?>" class="visit-btn visit-green" ><?php the_field('button_col_1'); ?></a>
              </td>
              <td>
                <a href="<?php echo $cloud_server_link; ?>" class="visit-btn visit-green" ><?php the_field('button_col_2'); ?></a>
              </td>
            </tr>
            </tbody>
          </table>
          <table class="blueberry-table blueberry-c table-margin">
            <tbody>
            <?php
            $col_name_3 = get_field('col_name_3');
            $col_name_4 = get_field('col_name_4');
            $col_name_5 = get_field('col_name_5');
            ?>
            <tr>
              <th><?php echo $col_name_3; ?></th>
              <th><?php echo $col_name_4; ?></th>
              <th><?php echo $col_name_5; ?></th>
            </tr>
            <?php if( have_rows('dedicated_table') ): ?>
              <?php while( have_rows('dedicated_table') ): the_row();
                $v_table_item_3 = get_sub_field('v_table_item_3');
                $v_table_item_4 = get_sub_field('v_table_item_4');
                $v_table_item_5 = get_sub_field('v_table_item_5');
                $label_3 = get_sub_field('label_3');
                $label_4 = get_sub_field('label_4');
                $label_5 = get_sub_field('label_5');
                ?>
                <tr class="g-t-row">
                  <td>
                    <?php if($label_3) {?>
                      <span class="check-label check-blueberry"></span>
                    <?php } else {
                      echo $v_table_item_3;
                    }?>
                  </td>
                  <td>
                    <?php if($label_4) {?>
                      <span class="check-label check-blueberry"></span>
                    <?php } else {
                      echo $v_table_item_4;
                    }?>
                  </td>
                  <td>
                    <?php if($label_5) {?>
                      <span class="check-label check-blueberry"></span>
                    <?php } else {
                      echo $v_table_item_5;
                    }?>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php endif; ?>
            <tr class="g-t-row">
              <?php
              $dedicated_server_link = get_field('dedicated_server_link');
              $dedicated_infrastructure_link = get_field('dedicated_infrastructure_link');
              $colocation_link = get_field('colocation_link');
              ?>
              <td>
                <a href="<?php echo $dedicated_server_link; ?>" class="visit-btn visit-blueberry" ><?php the_field('button_col_3'); ?></a>
              </td>
              <td>
                <a href="<?php echo $dedicated_infrastructure_link; ?>" class="visit-btn visit-blueberry" ><?php the_field('button_col_4'); ?></a>
              </td>
              <td>
                <a href="<?php echo $colocation_link; ?>" class="visit-btn visit-blueberry" ><?php the_field('button_col_5'); ?></a>
              </td>
            </tr>
            </tbody>
          </table>
          <table class="red-table rose-c">
            <tbody>
            <?php
            $col_name_6 = get_field('col_name_6');
            ?>
            <tr>
              <th><?php echo $col_name_6; ?></th>
            </tr>
            <?php if( have_rows('managed_table') ): ?>
              <?php while( have_rows('managed_table') ): the_row();
                $v_table_item_6 = get_sub_field('v_table_item_6');
                $label_6 = get_sub_field('label_6');
                ?>
                <tr class="g-t-row">
                  <td>
                    <?php if($label_6) {?>
                      <span class="check-label check-rose"></span>
                    <?php } else {
                      echo $v_table_item_6;
                    }?>

                  </td>
                </tr>
              <?php endwhile; ?>
            <?php endif; ?>
            <tr class="g-t-row">
              <?php
              $managed_server_link = get_field('managed_server_link');
              ?>
              <td>
                <a href="<?php echo $managed_server_link; ?>" class="visit-btn visit-rose" ><?php the_field('button_col_6'); ?></a>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
	</div>
</div>
</div>