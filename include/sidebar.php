	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<span><img src="vendors/images/logo.png" alt=""></span>
				
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-home"></span><span class="mtext">الرئيسية</span>
						</a>
						<ul class="submenu">
							<li><a href="blank.php">الصفحة الرئيسية</a></li>
							<?php if($UserType==2) { ?><li><a href="index.php">تقارير عامة</a></li> <?php } ?>
						</ul>
					</li>
						<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-desktop"></span><span class="mtext"> الأدلة </span>
						</a>
						<ul class="submenu">
						<?php if($UserType==2) { ?>	<li><a href="table_users.php">المستخدمين</a></li><?php } ?>
						
						
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-pencil"></span><span class="mtext">العمليات</span>
						</a>
						<ul class="submenu">
							<li><a href="table_disease.php">تعريف الأمراض</a></li>
							
						</ul>
					</li>
				
			
				
						
					
				
					
				
					
				
				
					
				</ul>
			</div>
		</div>
	</div>