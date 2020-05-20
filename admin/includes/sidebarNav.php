<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<div class="sb-sidenav-menu-heading">Main</div>
					<a class="nav-link" href="index.php"
					><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard</a
					>
					<a class="nav-link" href="categories.php"
					><div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>
					Categories</a
					>
					<div class="sb-sidenav-menu-heading">Interface</div>
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
					><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Posts
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
						></a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="post.php">View All Post</a><a class="nav-link" href="post.php?source=add_post">Create Post</a></nav>
						</div>
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
						><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
						Users
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
							></a>
							<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
									<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
									>Authentication
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
										></a>
										<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
											<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
										</div>
										<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
										>Error
										<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
											></a>
											<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
												<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
											</div>
										</nav>
									</div>
									<a class="nav-link" href="charts.html"
									><div class="sb-nav-link-icon"><i class="far fa-comment"></i></div>
									Comments</a
									><a class="nav-link" href="tables.html"
									><div class="sb-nav-link-icon"><i class="far fa-user"></i></div>
									Profile</a
									>
								</div>
							</div>
							<div class="sb-sidenav-footer">
								<div class="small">Logged in as:</div>
								CMS
							</div>
						</nav>
					</div>