<?php require APPROOT . '/views/inc/header.php'; ?>
<?php include APPROOT . '/views/inc/memdash.php'; ?>

<div class="col-9">

<h3>Your Orders</h3>
<hr/>
<?php if (isset($_GET['event_id'])) : ?>
    
    <p>Are you sure you want to order <?php $data['event']->event_name; ?> ?</p>
    <button type="submit">Yes</button>
    <pre>
    <?php print_r($data); ?>
    </pre>

<?php endif; ?>

</div>
<div class="col-0 col-md-1 col-lg-2 aside-right">

</div>
</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>