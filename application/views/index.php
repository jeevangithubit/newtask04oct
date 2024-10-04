<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
</head>
<body>
	<div class="container">
		<div class="row">
			<?php foreach ($data as $val){ ?>
				
			
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="<?php echo $val['image'];?>" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo $val['name'];?></h5>
			    <h5 class="card-title"><?php echo $val['price'];?></h5>
			    <p class="card-text"><?php echo $val['contant'];?></p>
			    <form action="<?php echo site_url('web/add_to_cart');?>" method="post">
			    	<input type="hidden" name="product_id" value="<?php echo $val['id'];?>">
			    <button type="submit" class="btn btn-primary">Add Card</button>
			    	
			    </form>
			  </div>
			</div>
          <?php } ?>
		</div>
		<a href="<?php echo site_url('web/cardView');?>"><i class="fa fa-shopping-cart"><?php echo $count;?></i></a>
	</div>
</body>
</html>