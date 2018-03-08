<?php
include_once 'view/header.php';
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Welcome</h4>
        </div>
        <div class="panel-body">
            <p><?php echo ucfirst($user)?></p>
        </div>        
    </div>  
</div>
<?php
include_once 'view/footer.php';
?>