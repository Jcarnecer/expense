<?php 
$classification = $this->Crud_model->fetch('classification');
?>
		<div class="container">
                    <h3>Remaining Allowance</h3><br>
            <div class="row">
                <div class="col-6">
                    <?php foreach($classification as $row): 
                        $classification = strtolower($row->classification); 
                        $allowance = $row->allowance_per_user;
                        ?>
                    <h5><?= $row->classification.': '. $user->$classification ?></h5>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>