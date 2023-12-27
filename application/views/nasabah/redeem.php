<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Redeem Points</title>
</head>
<body>

    <h2>Redeem Points</h2>

    <form action="<?php echo base_url('nasabah/redeemPoints'); ?>" method="post">
        <label>Points to Redeem:</label>
        <input type="text" name="points_to_redeem" required>

        <button type="submit">Redeem</button>
    </form>

    <!-- Tampilkan pesan hasil redeeming -->
    <?php if (isset($redeem_message)): ?>
        <p><?php echo $redeem_message; ?></p>
    <?php endif; ?>

</body>
</html>