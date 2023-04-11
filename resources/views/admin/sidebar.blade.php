<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../Azzara/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">{{ Auth::user()->name }}</span>									
								</span>
							</a>
							<div class="clearfix"></div>							
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="index.html">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="badge badge-count"></span>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
						
							<li class="nav-item">
							<a href="widgets.html">
								<i class="fas fa-users"></i>
								<p>Pengunjung</p>
								<span class="badge badge-count badge-success">4</span>
							</a>
						</li>
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Data Akun</p>
								<span class="caret"></span>
							</a>
							
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">																		
									<li>
										<a href="#"> <span class="sub-item">Member</span> </a>
									</li>

									<li>
										<a href="#"> <span class="sub-item">Mentor</span> </a>
									</li>							
								</ul>
							</div>	
							
							<div>
							<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i> <p>Data Master</p>
								<span class="caret"></span>
							</a>							
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">																		
									<li>
										<a href="#"> <span class="sub-item">Agama</span> </a>
									</li>

									<li>
										<a href="#"> <span class="sub-item">Aaaa</span> </a>
									</li>
									</div>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>