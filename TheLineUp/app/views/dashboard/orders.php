<?php require APPROOT . '/views/inc/header.php'; ?>
<?php include APPROOT . '/views/inc/memdash.php'; ?>

<div class="col-9">

    <h3>Your Orders</h3>
    <hr/>
    <?php if (isset($_GET['event_id'])): ?>
        <p>Are you sure you want to book your place for <?php echo $data['event']->event_name; ?>? If so, select 'Order' below.</p>
        <form method="post" action="/dashboards/orders">
            <div class="row">
                <div class="form-group col-12">
                    <button type="submit" value="submit">Order</button>
                    <input type="hidden" name="type" value="order" />
                    <input type="hidden" name="event_id" value="<?php echo $data['event']->event_id; ?>" />
                </div>
            </div>
        </form>
    <?php else: ?>

        <?php if (sizeOf($data['orders']) == 0): ?>

            <p>You currently have no orders.</p>

        <?php else: ?>
            
            <?php foreach($data['orders'] as $order): ?>

                <div class="row">
                    <div class="col-3">
                        <p><?php echo $order->start_date; ?></p>
                    </div>
                    <div class="col-6">
                        <p><?php echo $order->event_name; ?></p>
                    </div>
                    <div class="col-3">
                        <a class="dashboard-link" href="<?php echo URLROOT . '/pages/event?id=' . $order->event_id; ?>">View Event</a>
                    </div>
                    <hr />
                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    <?php endif; ?>

</div>
<div class="col-0 col-md-1 col-lg-2 aside-right">

</div>
</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>