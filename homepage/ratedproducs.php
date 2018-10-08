<div id="ratedProducsts">
	<div id="ratedProducsHeader">
		<div id="ratedProducstsLeftLine" class="ratedProducstsLine"></div>
		<div id="ratedProducsHeaderText">
			<h1>IZDVOJENE NEKRETNINE</h1>
		</div>
		<div id="ratedProducstsRightLine" class="ratedProducstsLine"></div>
		<div id="ratedProducstsAbout">
			<p>
				Pogledajte neke od nekretnina koje smo izdvojili za Vas i Vaše potrebe!
 			</p>
		</div>
	</div>

	<div id="ratedProducsBody">
		<div id="ratedProducsBodyEstates" class="ratedProductEstates">
			
			<div id="ratedProducsBodyEstatesLeft" class="ratedProductsP">
				<?php $sixOfThem->getEstate(1); ?>
				<div id="ratedProducsBodyEstatesLeftFirst" class="ratedProductsProduct">
					<img src="admin/slikeNaslovne/<?php echo $sixOfThem->estate_array['image'][0]; ?>">
					<div class="shadowOfProduct">
						<div class="shadowOfProductNameOf">
							<p title="Pogledajte detalje nekretnine">
								<a href="nekretnina.php?key=<?php echo $sixOfThem->estate_array['link'][0]; ?>">
									<?php echo $sixOfThem->estate_array['name'][0]; ?>
								</a>
							</p>
							<i class="fa fa-chevron-circle-right" title="Pogledajte detalje nekretnine"></i>
						</div>
					</div>
				</div>
				<?php $sixOfThem->getEstate(2); ?>
				<div id="ratedProducsBodyEstatesLeftSecond" class="ratedProductsProduct">
					<img src="admin/slikeNaslovne/<?php echo $sixOfThem->estate_array['image'][1]; ?>">
					<div class="shadowOfProduct">
						<div class="shadowOfProductNameOf">
							<p title="Pogledajte detalje nekretnine">
								<a href="nekretnina.php?key=<?php echo $sixOfThem->estate_array['link'][1]; ?>">
									<?php echo $sixOfThem->estate_array['name'][1]; ?>
								</a>
							</p>
							<i class="fa fa-chevron-circle-right" title="Pogledajte detalje nekretnine"></i>
						</div>
					</div>
				</div>
			</div>
			
			<div id="ratedProducsBodyEstatesTop" class="ratedProductsP">
				<?php $sixOfThem->getEstate(3); ?>
				<div id="ratedProducsBodyEstatesTopFirst" class="ratedProductsProduct">
					<img src="admin/slikeNaslovne/<?php echo $sixOfThem->estate_array['image'][2]; ?>">
					<div class="shadowOfProduct">
						<div class="shadowOfProductNameOf">
							<p title="Pogledajte detalje nekretnine">
								<a href="nekretnina.php?key=<?php echo $sixOfThem->estate_array['link'][2]; ?>">
									<?php echo $sixOfThem->estate_array['name'][2]; ?>
								</a>
							</p>
							<i class="fa fa-chevron-circle-right" title="Pogledajte detalje nekretnine"></i>
						</div>
					</div>
				</div>
				<?php $sixOfThem->getEstate(4); ?>
				<div id="ratedProducsBodyEstatesTopSecond" class="ratedProductsProduct">
					<img src="admin/slikeNaslovne/<?php echo $sixOfThem->estate_array['image'][3]; ?>">
					<div class="shadowOfProduct">
						<div class="shadowOfProductNameOf">
							<p title="Pogledajte detalje nekretnine">
								<a href="nekretnina.php?key=<?php echo $sixOfThem->estate_array['link'][3]; ?>">
									<?php echo $sixOfThem->estate_array['name'][3]; ?>
								</a>
							</p>
							<i class="fa fa-chevron-circle-right" title="Pogledajte detalje nekretnine"></i>
						</div>
					</div>
				</div>
			</div>
			
			<div id="ratedProducsBodyEstatesBottom" class="ratedProductsP">
				<?php $sixOfThem->getEstate(5); ?>
				<div id="ratedProducsBodyEstatesBottomFirst" class="ratedProductsProduct">
					<img src="admin/slikeNaslovne/<?php echo $sixOfThem->estate_array['image'][4]; ?>">
					<div class="shadowOfProduct">
						<div class="shadowOfProductNameOf">
							<p title="Pogledajte detalje nekretnine">
								<a href="nekretnina.php?key=<?php echo $sixOfThem->estate_array['link'][4]; ?>">
									<?php echo $sixOfThem->estate_array['name'][4]; ?>
								</a>
							</p>
							<i class="fa fa-chevron-circle-right" title="Pogledajte detalje nekretnine"></i>
						</div>
					</div>
				</div>
				<?php $sixOfThem->getEstate(6); ?>
				<div id="ratedProducsBodyEstatesBottomSecond" class="ratedProductsProduct">
					<img src="admin/slikeNaslovne/<?php echo $sixOfThem->estate_array['image'][5]; ?>">
					<div class="shadowOfProduct">
						<div class="shadowOfProductNameOf">
							<p title="Pogledajte detalje nekretnine">
								<a href="nekretnina.php?key=<?php echo $sixOfThem->estate_array['link'][5]; ?>">
									<?php echo $sixOfThem->estate_array['name'][5]; ?>
								</a>
							</p>
							<i class="fa fa-chevron-circle-right" title="Pogledajte detalje nekretnine"></i>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>