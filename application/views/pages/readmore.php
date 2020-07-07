</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row mb-2">
				<div class="col-md-12">
					<div class="card">
						<?php 
						foreach ($readmore as $row) : 
							?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="news-title">
											<h2><?php echo $row['title']; ?></h2>
										</div>
										<div class="news-cats">
											<ul class="list-unstyled list-inline mb-1">
												<li class="list-inline-item">
													<i class="fa fa-folder-o text-danger"></i>
													<a href="#"><small><?= $row['create_by']; ?></small> </a>
												</li>
												<li class="list-inline-item">
													<i class="fa fa-folder-o text-danger"></i>
													<a href="#"><small><?= $create_date = date("d-M-Y", strtotime($row['create_date']))  ?></small></a>
												</li>




											</ul>
										</div>
										<hr>
										<div class="news-image">
											<img src="<?= base_url('assets/img/news/').$row['gambar'] ?>"></p>
										</div>
										<div class="news-content">
											<?= $row['content'] ?>
										</div>
										<hr>
										<div class="news-footer">
											<div class="news-likes">
												<button type="button" class="btn btn-outline-secondary"><i class="fa fa-thumbs-o-up text-success"></i> <span class="badge ">Likes 4</span></button>
												<button type="button" class="btn btn-outline-secondary"><i class="fa fa-thumbs-o-down text-danger"></i><span class="badge">Disklikes 4</span></button>
											</div>
										</div>
										<hr>
										<div class="news-tags">
											<h5>Tags</h5>
											<button type="button" class="btn btn-sm btn-secondary">
												Education <span class="badge badge-light">4</span>
											</button>
											<button type="button" class="btn btn-sm btn-secondary">
												Entertainment <span class="badge badge-light">4</span>
											</button>
											<button type="button" class="btn btn-sm btn-secondary">
												Automobile <span class="badge badge-light">4</span>
											</button>
											<button type="button" class="btn btn-sm btn-secondary">
												Insurance <span class="badge badge-light">4</span>
											</button>
											<button type="button" class="btn btn-sm btn-secondary">
												Energy <span class="badge badge-light">4</span>
											</button>
											<button type="button" class="btn btn-sm btn-secondary">
												Health <span class="badge badge-light">4</span>
											</button>
										</div>
										<hr>
										<div class="news-author">
											<div class="row">
												<div class="col-md-auto">
													<a href="#" title="Biswajit Saha"><img src="<?= base_url('assets/img/profile/').$row['gambar2'] ?>" alt="Author image" class="rounded-circle" style="width:100px"></a>
												</div>
												<div class="col">
													<div class="auth-title">
														<h4 class="author h4"><a href="/author/biswajit/"><?= $row['name'] ?></a></h4>
														<div class="bio">
															Developer at GBJ solution. I love to travel, make new friends. I prefer tea over coffee.
														</div>
														<ul class="list-unstyled list-inline">
															<li class="list-inline-item"><a href="https://twitter.com/gbjsolution" target="_blank"><i class="fa fa-twitter"></i></a></li>
															<li class="list-inline-item"><a href="https://www.facebook.com/gbjsolution" target="_blank"><i class="fa fa-facebook"></i></a></li>
															<li class="list-inline-item"><a href="http://gbjsolution.com" target="_blank"><i class="fa fa-globe"></i></a></li>
															<li class="list-inline-item"><i class="fa fa-map-marker"></i> India</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>