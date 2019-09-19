<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="img/usertest.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Jayro Salazar
									<span class="user-level">Colaborador</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav nav-primary">
									<li class="">
										<a href="#">
											<span class="link-collapse">Mi perfil</span>
										</a>
									</li>
									<li class="">
										<a href="#">
											<span class="link-collapse">Configuración</span>
										</a>
									</li>
									<li class="">
										<a href="#">
											<span class="link-collapse">Cerrar sesión</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li @click="menu=0" class="nav-item">
							<a href="">
								<i class="fas fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li @click="menu=1" class="nav-item">
							<a href="">
								<i class="fas fa-rocket"></i>
								<p>Proyectos</p>
							</a>
						</li>
						<li @click="menu=2" class="nav-item">
							<a href="">
								<i class="fas fa-history"></i>
								<p>Linea del tiempo</p>
							</a>
						</li>
						<li @click="menu=3" class="nav-item">
							<a href="">
								<i class="fas fa-book"></i>
								<p>Reportes</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>