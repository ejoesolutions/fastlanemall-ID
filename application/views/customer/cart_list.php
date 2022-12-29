<div class="row">
  <div class="col-md-12">
    <div class="order-summary clearfix">
      <div class="section-title">
        <h3 class="title">MY CART</h3>
      </div>
      <div class="table-responsive">
        <table class="shopping-cart-table table">
          <thead>
            <tr>
              <th>Product</th>
              <th class="text-center">Price</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Total</th>
              <th class="text-right"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data=[];
            $this->db->order_by('product_id','asc');
            $this->query = $this->db->get('vu_products_list');
            if ($this->query->num_rows() > 0) {
              foreach ($this->query->result_array() as $row) {
                $data[] = $row;
              }
            }

            foreach ($data as $key) {
              foreach ($this->cart->contents() as $key2){
                if($key['product_id']==$key2['id'] && ($key['product_status']==0 || $key['stock']==0))
                {
                  $this->cart->remove($key2['rowid']);
                }
              }
            }

            $i = 1;
            $total_all=0.0;
            foreach ($this->cart->contents() as $items){
              echo form_hidden($i.'[rowid]', $items['rowid']);
              ?>
              <tr>
                <td class="details">
                  <a href="#"><?php echo $items['name']; ?></a>
                  <ul>
                    <li><span>Code : <?php echo $items['item_code']; ?></span></li>
                    <li><span>Weight : <?php echo $items['weight']; ?> g</span></li>
                    <li><span>Shop : <?php echo $items['shop_name']; ?></span></li>
                  </ul>
                </td>
                <td class="price text-center">
                  <strong><?= $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($items['price'],2, '.', $currency['separate']) : substr(number_format($items['price'],2, '.', $currency['separate']), 0 ,-3)); ?></strong>
                </td>
                <td class="qty text-center">
                  <?php
                  echo form_open('cart/update_cart');
                  foreach ($data as $key ) {
                    if($key['product_id']==$items['id']) { ?>
                      <input type="number" name="qty" id="qty" class="text-center" min="1"  value="<?php echo $items['qty']; ?>" max="<?php echo $key['stock'] ?>"><?php
                    }
                  }
                  echo form_hidden('itemID', $items['id']);
                  echo form_hidden('row_id', $items['rowid']);
                  ?><button class="btn btn-warning" type="submit" id="btn-update"><span class="fa fa-refresh"></span></button><?php
                  echo form_close();
                  ?>
                </td>
                <td class="total text-center">
                  <strong class="primary-color">
                    <?= $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($items['subtotal'],2, '.', $currency['separate']) : substr(number_format($items['subtotal'],2, '.', $currency['separate']), 0 ,-3)); ?>
                  </strong>
                </td>
                <td class="text-right"><?php echo anchor('member/clear_item_cart/'.$items['rowid'], '<span class="fa fa-trash"></span>', array('class'=>'btn btn-danger')); ?></td>
              </tr>

              <?php
              $i++;
              $total_all = $total_all + $items['subtotal'];
              echo form_hidden('item_id[]', $items['id']);
              echo form_hidden('item_name[]', $items['name']);
              echo form_hidden('item_price[]', $items['price']);
              echo form_hidden('item_qty[]', $items['qty']);
              echo form_hidden('item_subtotal[]', $items['subtotal']);
              echo form_hidden('item_referrel[]', $items['referrel']);
          } ?>
          </tbody>
          <tfoot>
            <tr>
              <th class="empty" colspan="2"></th>
              <th>TOTAL</th>
              <th colspan="2" class="total text-center"><?= $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($total_all,2, '.', $currency['separate']) : substr(number_format($total_all,2, '.', $currency['separate']), 0 ,-3)); ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="pull-right" style="margin-top:10px">
        <?php if(!empty($this->cart->contents())): ?>
          <a href="<?php echo base_url('orders/checkout') ?>"><button class="btn btn-green">Checkout</button></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


<script>
  function upd_val(){
    var input = document.getElementById("input_qty").value;
    var stock = "<?php echo $p_detail['stock']?>";
    var price = "<?php echo $p_detail['price']?>";
    var subtotal=parseFloat(input)*parseFloat(price);

    // document.querySelector('')
  }
</script>
